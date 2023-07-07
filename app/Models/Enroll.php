<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    use HasFactory;

    private static $enroll, $message;

    public static function newEnroll($courseId,$studentId)
    {
        self::$enroll = new Enroll();
        self::$enroll->course_id = $courseId;
        self::$enroll->student_id  = $studentId;
        self::$enroll->enroll_date = date('Y-m-d');
        self::$enroll->payment_amount = 0;
        self::$enroll->save();
    }

    public static function UpdateEnrollStatus($id)
    {
        self::$enroll = Enroll::find($id);
        if(self::$enroll->enroll_status =='pending'||self::$enroll->enroll_status =='rejected')
        {
            self::$enroll->enroll_status = 'approved';
            self::$message = "Enrollment successful!";
        }
        else
        {
            self::$enroll->enroll_status = 'rejected';
            self::$message = "Enrollment request rejected";
        }
        self::$enroll->save();
        return self::$message;
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

}
