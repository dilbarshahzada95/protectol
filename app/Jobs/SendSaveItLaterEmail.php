<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\SaveItLaterEmail;

class SendSaveItLaterEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $email;
    protected $username;
    protected $url;

    public function __construct($email, $username, $url)
    {
        $this->email = $email;
        $this->username = $username;
        $this->url = $url;
    }


    public function handle()
    {
        Mail::to($this->email)->send(new SaveItLaterEmail($this->username, $this->url));
    }
}
