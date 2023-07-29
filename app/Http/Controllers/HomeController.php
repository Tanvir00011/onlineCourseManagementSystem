<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Enroll;
use App\Models\Course;
use App\Models\CourseMaterial;
use App\Models\CourseReview;
use App\Models\EnrollCourseMaterialCompletion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    private $course, $courses, $category, $categories;
    public function index()
    {
        $this->courses = Course::where('status', 1)->get();
        return view('website.home.index', ['courses' => $this->courses]);
    }

    public function about()
    {
        return view('website.about.index');
    }

    public function courseCategory($id)
    {
        $this->category = Category::find($id);

        return view('website.course-category.index', ['category' => $this->category]);
    }

    public function allCourse()
    {
        $this->courses = Course::where('status', 1)->get();
        return view('website.course.index', ['courses' => $this->courses]);
    }

    public function contact()
    {
        return view('website.contact.index');
    }

    public function auth() //student login screen
    {
        return view('website.auth.index');
    }
    public function courseDetail($id, $materialId = null)
    {
        $this->course = Course::find($id);
        $student_id =  Session::get('student_id');
        $enroll = Enroll::where(['course_id' => $id, 'student_id' => $student_id])->first();
        if (isset($enroll) && $enroll->enroll_status == 'approved') { //if enrolled show all the courses // else show only video which is free
            // $course_materials = CourseMaterial::where(['course_id' => $id])->get();
            $selected_material = null;
            $enroll_id = $enroll->id;
            $course_materials =  DB::table('course_materials')
                ->leftJoin('enroll_course_material_completions', function ($join) use ($enroll_id) {
                    $join->on('course_materials.id', '=', 'enroll_course_material_completions.course_material_id')
                        ->where('enroll_id', '=', $enroll_id);
                })
                ->where(['course_id' => $id])
                ->select('course_materials.*', 'is_complete')->get();
            $course_item_completed = EnrollCourseMaterialCompletion::where('enroll_id', '=', $enroll_id)->where('is_complete', '=', 1)->count();
            if ($materialId) {
                $selected_material = CourseMaterial::where(['id' => $materialId])->first();
            } else if (count($course_materials) > 0) {
                $selected_material = $course_materials[0];
            }
            $course_item_completed =  isset($course_item_completed) ? $course_item_completed:0;
            return view('website.course.detail', [
                'course' => $this->course,
                'enroll_id' =>  $enroll_id,
                'course_materials' => $course_materials,
                'selected_material' => $selected_material,
                'course_item_completed'=>$course_item_completed,
                'total_course_items'=>count($course_materials),
                'course_completed_percentage'=>intval(($course_item_completed/count($course_materials))*100),
            ]);
        } else {
            $course_materials = CourseMaterial::where(['course_id' => $id, 'is_free_preview' => true])->get();
            return view('website.course.detail_public', [
                'course' => $this->course,
                'is_enrolled' => isset($enroll) ? 1 : 0,
                'enroll_status' =>  isset($enroll) ? $enroll->enroll_status : '',
                'course_materials' => $course_materials,
            ]);
        }
    }

    function handleCourseMaterialIsComplete(Request $request)
    {
        $msg = EnrollCourseMaterialCompletion::materialCompletionUpdate($request->id, $request->enroll_id, $request->checked);
        return $msg;
    }

    function handleWriteReview(Request $request)
    {
        $student_id = session('student_id');
        $msg = CourseReview::writeReview($student_id, $request->course_id, $request->review_text);
        return $msg;
    }
}
