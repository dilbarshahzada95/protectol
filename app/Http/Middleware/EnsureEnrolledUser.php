<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Models\Quiz\Entroll;

class EnsureEnrolledUser
{
    public function handle(Request $request, Closure $next)
    {
        $encryptedUuid = $request->route('uuid');

        if (!$encryptedUuid) {
            return response()->json(['error' => 'Invalid access. UUID missing.'], 400);
        }

        try {
            $uuid = Crypt::decrypt(urldecode($encryptedUuid));
        } catch (DecryptException $e) {
            return response()->json(['error' => 'Invalid UUID.'], 400);
        }

        $enroll = Entroll::where('uuid', $uuid)->first();

        if ($enroll && $enroll->status == 'pending') {
            return $next($request);
        }

        return response()->json(['error' => 'You are not allowed to access this page.'], 403);
    }
}
