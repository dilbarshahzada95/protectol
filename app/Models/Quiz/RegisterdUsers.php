<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegisterdUsers extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'registerd_users';

    protected $fillable = [
        'name',
        'company_name',
        'email',
        'country',
        'phone',
        'comments',
        'uuid'
    ];
}
