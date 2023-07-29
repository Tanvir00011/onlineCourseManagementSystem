<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseReview extends Model
{
    use HasFactory;

    public static function writeReview($studentId, $courseId, $review_text)
    {
        $reviewExist =  CourseReview::where(['student_id' => $studentId, 'course_id' => $courseId])->first();
        if (!$reviewExist) {
            $reviewExist = new CourseReview();
        }
        $reviewExist->review_text  = $review_text;
        $reviewExist->student_id = $studentId;
        $reviewExist->course_id = $courseId;
        $reviewExist->is_show = false;
        $reviewExist->save();
        return 'success';
    }
}
