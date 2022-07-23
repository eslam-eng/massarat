<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSubscription extends Model
{
    use HasFactory;
    protected $fillable = ['course_id','teacher_id','student_id','payment','remain','is_done','employee_code'];

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Employee::class,'teacher_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id');
    }

}
