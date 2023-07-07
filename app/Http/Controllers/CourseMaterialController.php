<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CourseMaterial;
use Illuminate\Http\Request;
use Session;

class CourseMaterialController extends Controller
{
    private $categories, $course,$courses;

    public function index($id)

    {
        return view('teacher.course.material.index',['id' => $id]);
    }

    public function create(Request $request, $id)
    {
        CourseMaterial::NewCourseMaterial($request, $id);
        return back()->with('message','Course Info Created Successfully');
    }

//    public function manage()
//    {   $this->courses = Course::where('teacher_id',Session::get('teacher_id'))->get();
//        return view('teacher.course.manage',['courses'=>$this->courses]);
//    }
//    public function detail($id)
//    {
//        $this->course = Course::find($id);
//        return view('teacher.course.detail',['course'=>$this->course]);
//    }
//    public function edit($id)
//    {
//        $this->categories = Category::all();
//        $this->course = Course::find($id);
//        return view('teacher.course.edit', ['course' => $this->course, 'categories' => $this->categories]);
//    }
//    public function update(Request $request, $id)
//    {
//        if ($request->file('image'))
//        {
//            $this->validate($request, [
//                'image' => 'image'
//            ]);
//        }
//        Course::updateCourse($request, $id);
//        return redirect('/course/manage')->with('message', 'Course Module Updated Successfully');
//    }
//
//    public function delete($id)
//    {
//        Course::deleteCourse($id);
//        return back()->with('message', 'Course Module Deleted Successfully');
//    }
}
