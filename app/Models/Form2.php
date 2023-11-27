<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form2 extends Model
{

    protected $table = 'form2';

    protected $fillable = [
        'user_id',
        'app_id',
        'description',
        'data_col_plan',
        'exp_result',
        'yes_no1',
        'if_involve',
        'yes_no2',
        'partic_kept_uniformed',
        'poten_contr',
        'yes_no3',
        'research_before',
        'rname',
        'sname'

    ];

    use HasFactory;
}
