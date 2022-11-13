<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentMark extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'student_id',
        'term',
        'maths_mark',
        'science_mark',
        'history_mark',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
