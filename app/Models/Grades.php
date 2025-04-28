<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    public $timestamps = false;
    
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    protected $fillable = [
        'student_id',
        'subject_id',
        'grade',
    ];
}
