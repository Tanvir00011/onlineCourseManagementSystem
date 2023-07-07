<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class CourseMaterial extends Model
{
    use HasFactory;

    private static $courseMaterial,$file,$fileUrl,$directory,$extension,$fileName,$message;

    public static function getFileUrl($request, $file_name, $file_location)
    {
        self::$file = $request->file($file_name);
        self::$extension = self::$file->getClientOriginalExtension();
        self::$fileName = time().'.'.self::$extension;
        self::$directory = "upload/${file_location}/";
        self::$file->move(self::$directory,self::$fileName);
        self::$fileUrl = self::$directory.self::$fileName;
        return self::$fileUrl;
    }

    public static function NewCourseMaterial($request, $course_id)
    {
        self:: $courseMaterial = New CourseMaterial();
        self::$courseMaterial->teacher_id = Session::get('teacher_id');
        self::$courseMaterial->course_id = $course_id;
        self:: $courseMaterial->title = $request->title;
        if($request->is_free_preview){
            self:: $courseMaterial->is_free_preview =true;
        }
        self:: $courseMaterial->thumbnail_image = self::getFileUrl($request,'thumbnail_image','course-thumbnail_image');
        self:: $courseMaterial->video = self::getFileUrl($request,'video','course-video');
        self:: $courseMaterial->save();
    }


    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public static function UpdateCourseStatus($id)
    {
        self::$courseMaterial = Course::find($id);
        if(self::$courseMaterial->status ==1)
        {
            self::$courseMaterial->status = 0;
            self::$message = "Course Status info unpublished Successfully";
        }
        else
        {
            self::$courseMaterial->status = 1;
            self::$message = "Course Status info published Successfully";
        }
        self::$courseMaterial->save();
        return self::$message;
    }
}
