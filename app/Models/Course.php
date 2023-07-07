<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Course extends Model
{
    use HasFactory;

    private static $course,$image,$imageUrl,$directory,$extension,$imageName,$message;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$extension = self::$image->getClientOriginalExtension();
        self::$imageName = time().'.'.self::$extension;
        self::$directory = 'upload/course-images/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function NewCourse($request)
    {
        self:: $course = New Course();
        self::$course->category_id = $request->category_id;
        self::$course->teacher_id = Session::get('teacher_id');
        self:: $course->title = $request->title;
        self:: $course->description = $request->description;
        self:: $course->starting_date = $request->starting_date;
        self:: $course->price = 0;
        self:: $course->image = self::getImageUrl($request);
        self:: $course->save();
    }

    public static function updateCourse($request,$id)
    {
        self:: $course = Course::find($id);

        if ($request->file('image'))
        {
            if (file_exists(self:: $course->image))
            {
                unlink(self:: $course->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self:: $course->image;
        }

        self::$course->category_id = $request->category_id;
        self::$course->teacher_id = Session::get('teacher_id');
        self:: $course->title = $request->title;
        self:: $course->description = $request->description;
        self:: $course->starting_date = $request->starting_date;
        // self:: $course->price = $request->price;
        self:: $course->image = self::$imageUrl;
        self:: $course->save();
    }

    public static function deleteCourse($id)
    {
        self:: $course = Course::find($id);
        if (file_exists(self:: $course->image))
        {
            unlink(self:: $course->image);
        }
        self:: $course->delete();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public static function UpdateCourseStatus($id)
    {
        self::$course = Course::find($id);
        if(self::$course->status ==1)
        {
            self::$course->status = 0;
            self::$message = "Course Status info unpublished Successfully";
        }
        else
        {
            self::$course->status = 1;
            self::$message = "Course Status info published Successfully";
        }
        self::$course->save();
        return self::$message;
    }


}
