<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class TrainingsMaterial extends Model
{
    use HasFactory;

    private static $trainingMaterial,$file,$fileUrl,$directory,$extension,$fileName,$message;

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

    public static function NewTrainingMaterial($request, $training_id)
    {
        self:: $trainingMaterial = New TrainingsMaterial();
        self::$trainingMaterial->teacher_id = Session::get('teacher_id');
        self::$trainingMaterial->training_id = $training_id;
        self:: $trainingMaterial->title = $request->title;
        self:: $trainingMaterial->thumbnail_image = self::getFileUrl($request,'thumbnail_image','training-thumbnail_image');
        self:: $trainingMaterial->video = self::getFileUrl($request,'video','training-video');
        self:: $trainingMaterial->save();
    }


    public function training()
    {
        return $this->belongsTo(Training::class);
    }
    public static function UpdateTrainingStatus($id)
    {
        self::$trainingMaterial = Training::find($id);
        if(self::$trainingMaterial->status ==1)
        {
            self::$trainingMaterial->status = 0;
            self::$message = "Training Status info unpublished Successfully";
        }
        else
        {
            self::$trainingMaterial->status = 1;
            self::$message = "Training Status info published Successfully";
        }
        self::$trainingMaterial->save();
        return self::$message;
    }
}
