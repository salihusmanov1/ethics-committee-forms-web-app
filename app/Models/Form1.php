<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form1 extends Model
{
    

    protected $table = 'form1';

    protected $fillable = [
        'user_id',
        'app_id',
        'title_of_study',
        'type_of_study',
        'researchers',
        'other_researchers',
        'advisors',
        'expected_time_frame',
        'org_inst',
        'question_8',
        'question_9',
        'status',
        'reporting_changes',
        'extension_pr_study',
        'question_11',
        'question_12',
        'question_13',
        'question_14',
        'question_15',
        'question_16',
        'question_17',
        'question_17_1',
        'question_17_2',
        'question_18',
        'question_19',
        'question_20',
        'question_21',
        'rname',
        'rdate',
        'sname',
        'sdate'

    ];

    use HasFactory;
}
