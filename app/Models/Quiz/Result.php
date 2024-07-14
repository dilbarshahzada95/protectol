<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Result extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'result';
    protected $fillable = ['uuid', 'question_id', 'answer', 'score', 'is_update'];
}
