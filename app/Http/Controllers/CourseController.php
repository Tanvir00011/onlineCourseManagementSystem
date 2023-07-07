<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Session;

class CourseController extends Controller
{
    private $categories, $course,$courses;

    public function index()

    {
        $this->categories = Category::all();
        return view('teacher.course.index',['categories' => $this->categories]);
    }

    public function create(Request $request)
    {
        Course::NewTraining($request);
        return back()->with('message','Course Info Created Successfully');
    }

    public function manage()
    {   $this->courses = Course::where('teacher_id',Session::get('teacher_id'))->get();
        return view('teacher.course.manage',['courses'=>$this->courses]);
    }
    public function detail($id)
    {
        $this->course = Course::find($id);
        return view('teacher.course.detail',['course'=>$this->course]);
    }
    public function edit($id)
    {
        $this->categories = Category::all();
        $this->course = Course::find($id);
        return view('teacher.course.edit', ['course' => $this->course, 'categories' => $this->categories]);
    }
    public function update(Request $request, $id)
    {
        if ($request->file('image'))
        {
            $this->validate($request, [
                'image' => 'image'
            ]);
        }
        Course::updateTraining($request, $id);
        return redirect('/course/manage')->with('message', 'Course Module Updated Successfully');
    }

    public function delete($id)
    {
        Course::deleteTraining($id);
        return back()->with('message', 'Course Module Deleted Successfully');
    }
}
