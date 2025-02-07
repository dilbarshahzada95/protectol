<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Options extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'options';

    protected $fillable = ['option', 'question_id'];
}
