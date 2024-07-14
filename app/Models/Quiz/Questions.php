<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Questions extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'questions';
    protected $fillable = ['question', 'type', 'batch'];

    public function options()
    {
        return $this->hasMany(Options::class, 'question_id', 'id');
    }
}
