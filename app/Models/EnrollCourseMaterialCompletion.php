<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollCourseMaterialCompletion extends Model
{
    use HasFactory;

    public static function materialCompletionUpdate($materialId, $enrollId, $value)
    {
        $studentCourseMaterailCompletion =  EnrollCourseMaterialCompletion::where(['enroll_id' => $enrollId, 'course_material_id' => $materialId])->first();
        if (!$studentCourseMaterailCompletion) {
            $studentCourseMaterailCompletion = new EnrollCourseMaterialCompletion();
        }
        $studentCourseMaterailCompletion->enroll_id  = $enrollId;
        $studentCourseMaterailCompletion->course_material_id = $materialId;
        $studentCourseMaterailCompletion->is_complete = $value=='true' ? true : false;
        $studentCourseMaterailCompletion->save();
        return 'success';
    }
}
