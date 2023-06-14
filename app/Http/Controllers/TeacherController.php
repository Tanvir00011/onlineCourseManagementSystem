<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{   private $teachers,$teacher;
    public function index()
    {
        return view('admin.teacher.index');
    }

    public function create(Request $request)
    {
        Teacher::NewTeacher($request);
        return back()->with('message','Teacher Info Saved Successfully');
    }
    public function manage()
    {
        $this->teachers = Teacher::all();
        return view('admin.teacher.manage',['teachers'=>$this->teachers]);
    }
    public function edit($id)
    {   $this->teacher = Teacher::find($id);
        return view('admin.teacher.edit',['teacher'=>$this->teacher]);
    }

    public function update(Request $request,$id)
    {   if ($request->file('image'))
    {
        $this->validate($request,[
            'image' => 'required|image'
        ]);
    }
        Teacher::updateTeacher($request,$id);
        return redirect('teacher/manage')->with('message','Teacher Info Update Successfully');
    }
    public function delete($id)
    {
        Teacher::deleteTeacher($id);
        return back()->with('message','Teacher Info Delete Successfully');
    }



}
