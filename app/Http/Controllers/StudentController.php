<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use App\Models\Student;
use Illuminate\Http\Request;
use Session;
use function Symfony\Component\String\b;

class StudentController extends Controller
{
    private $student;

    public function dashboard()
    {
        $student_id = Session::get('student_id');
        $approved_course = Enroll::where('student_id', $student_id)->where('enroll_status', 'approved')->count();
        $pending_course = Enroll::where('student_id', $student_id)->where('enroll_status', 'pending')->count();
        $rejected_course = Enroll::where('student_id', $student_id)->where('enroll_status', 'rejected')->count();
        return view('website.student.dashboard')
                ->with('approved_course',$approved_course)
                ->with('pending_course',$pending_course)
                ->with('rejected_course',$rejected_course);
    }

    public function profile()
    {
        return view('website.student.profile');
    }

    public function course()
    {
        $student_id = Session::get('student_id');
        $allEnrolledCourse = Enroll::where('student_id', $student_id)->get();
        return view('website.student.course')->with('allEnrolledCourse', $allEnrolledCourse);
    }

    public function logout()
    {
        Session::forget('student_id');
        Session::forget('student_name');

        return redirect('/');
    }
    public function login(Request $request)
    {
        $this->student = Student::where('email',$request->email)->first();
        if($this->student)
        {
            if (password_verify($request->password,$this->student->password))
            {
                Session::put('student_id',$this->student->id);
                Session::put('student_name',$this->student->name);
                return redirect('/my-dashboard');
            }
            else
            {
                return  back()->with('error','sorry..password is invalid');
            }
        }
        else
        {
            return back()->with('error','Sorry..email address is invalid');
        }
    }

    public function register(Request $request)
    {
        try {
            $this->student = Student::newStudent($request);
            if (isset($this->student))
            {
                Session::put('student_id',$this->student->id);
                Session::put('student_name',$this->student->name);
                return redirect('/my-dashboard')->with('message','Account Created Successfully');
            }
        } catch (\Exception $exception)
        {
            return back()->with('error',$exception->getMessage());
        }
    }
}
