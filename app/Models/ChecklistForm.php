<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChecklistForm extends Model
{
    use HasFactory;

    protected $table = 'checklist_form';

    protected $fillable = [
        'user_id',
        'questions',
        'question_1',
        'question_2',
        'question_3',
        'question_4',
        'question_5',
        'question_6',
        'question_7',
        'question_8',
        'question_9',
        'question_10',
        'question_11'
    ];
}
