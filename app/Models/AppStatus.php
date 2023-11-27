<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppStatus extends Model
{
    protected $table = 'app_status';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $fillable = [
        'user_id',
        'form_id',
        'checklist_form_id',
        'status',
        'user_email',
        'admin_comment'
    ];

    use HasFactory;
}
