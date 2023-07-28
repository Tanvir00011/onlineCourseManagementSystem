<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourseMaterialCompletion extends Model
{
    use HasFactory;

    public static function materialCompletionUpdate($materialId, $studentId, $value)
    {
            $studentCourseMaterailCompletion =  StudentCourseMaterialCompletion::where(['student_id' => $studentId, 'course_material_id' => $materialId])->first();
            if (!$studentCourseMaterailCompletion) {
                $studentCourseMaterailCompletion = new StudentCourseMaterialCompletion();
            }
            $studentCourseMaterailCompletion->student_id  = $studentId;
            $studentCourseMaterailCompletion->course_material_id = $materialId;
            $studentCourseMaterailCompletion->is_complete = $value?1:0;
            $studentCourseMaterailCompletion->save();
        return 'success';



    }
}
