<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entroll extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'entroll';

    protected $fillable = [
        'uuid',
        'status'
    ];
}
