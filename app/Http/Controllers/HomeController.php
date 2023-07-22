<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Enroll;
use App\Models\Course;
use App\Models\CourseMaterial;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    private $course,$courses,$category, $categories;
    public function index()
    {
        $this->courses = Course::where('status',1)->get();
        return view('website.home.index',['courses'=>$this->courses]);
    }

    public function about()
    {
        return view('website.about.index');
    }

    public function courseCategory($id)
    {
        $this->category = Category::find($id);

        return view('website.course-category.index',['category'=>$this->category]);
    }

    public function allCourse()
    {
        $this->courses= Course::where('status',1)->get();
        return view('website.course.index',['courses'=>$this->courses]);
    }

    public function contact()
    {
        return view('website.contact.index');
    }

    public function auth()//student login screen
    {
        return view('website.auth.index');
    }
    public function courseDetail($id, $materialId=null)
    {
        $this->course = Course::find($id);
        $enroll = Enroll::where(['course_id' => $id,'student_id'=> Session::get('student_id')])->first();
        if(isset($enroll)&&$enroll->enroll_status=='approved'){//if enrolled show all the courses // else show only video which is free
            $course_materials = CourseMaterial::where(['course_id' => $id])->get();
            $selected_material = null;


            if($materialId){
            $selected_material = CourseMaterial::where(['id' => $materialId])->first();
            }else if(count($course_materials)>0){
                $selected_material = $course_materials[0];
            }
            return view('website.course.detail',[
                'course'=>$this->course,
                'is_enrolled' => isset($enroll) ? 1 : 0,
                'enroll_status' =>  isset($enroll)?$enroll->enroll_status:'',
                'course_materials' => $course_materials,
                'selected_material' => $selected_material,
            ]);
        }else{
            $course_materials = CourseMaterial::where(['course_id' => $id,'is_free_preview'=>true])->get();
            return view('website.course.detail_public',[
                'course'=>$this->course,
                'is_enrolled' => isset($enroll) ? 1 : 0,
                'enroll_status' =>  isset($enroll)?$enroll->enroll_status:'',
                'course_materials' => $course_materials,
            ]);
        }

    }
}
