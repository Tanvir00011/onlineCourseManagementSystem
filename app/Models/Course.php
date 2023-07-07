<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Course extends Model
{
    use HasFactory;

    private static $training,$image,$imageUrl,$directory,$extension,$imageName,$message;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$extension = self::$image->getClientOriginalExtension();
        self::$imageName = time().'.'.self::$extension;
        self::$directory = 'upload/training-images/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function NewTraining($request)
    {
        self:: $training = New Course();
        self::$training->category_id = $request->category_id;
        self::$training->teacher_id = Session::get('teacher_id');
        self:: $training->title = $request->title;
        self:: $training->description = $request->description;
        self:: $training->starting_date = $request->starting_date;
        self:: $training->price = $request->price;
        self:: $training->image = self::getImageUrl($request);
        self:: $training->save();
    }

    public static function updateTraining($request,$id)
    {
        self:: $training = Course::find($id);

        if ($request->file('image'))
        {
            if (file_exists(self:: $training->image))
            {
                unlink(self:: $training->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self:: $training->image;
        }

        self::$training->category_id = $request->category_id;
        self::$training->teacher_id = Session::get('teacher_id');
        self:: $training->title = $request->title;
        self:: $training->description = $request->description;
        self:: $training->starting_date = $request->starting_date;
        self:: $training->price = $request->price;
        self:: $training->image = self::$imageUrl;
        self:: $training->save();
    }

    public static function deleteTraining($id)
    {
        self:: $training = Course::find($id);
        if (file_exists(self:: $training->image))
        {
            unlink(self:: $training->image);
        }
        self:: $training->delete();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public static function UpdateTrainingStatus($id)
    {
        self::$training = Course::find($id);
        if(self::$training->status ==1)
        {
            self::$training->status = 0;
            self::$message = "Course Status info unpublished Successfully";
        }
        else
        {
            self::$training->status = 1;
            self::$message = "Course Status info published Successfully";
        }
        self::$training->save();
        return self::$message;
    }
}
