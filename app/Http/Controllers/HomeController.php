<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Enroll;
use App\Models\Course;
use App\Models\TrainingsMaterial;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    private $training,$trainings,$category, $categories;
    public function index()
    {
        $this->trainings = Course::where('status',1)->get();
        return view('website.home.index',['trainings'=>$this->trainings]);
    }

    public function about()
    {
        return view('website.about.index');
    }

    public function trainingCategory($id)
    {
        $this->category = Category::find($id);

        return view('website.training-category.index',['category'=>$this->category]);
    }

    public function allTraining()
    {
        $this->trainings= Course::where('status',1)->get();
        return view('website.training.index',['trainings'=>$this->trainings]);
    }

    public function contact()
    {
        return view('website.contact.index');
    }

    public function auth()
    {
        return view('website.auth.index');
    }
    public function trainingDetail($id)
    {
        $this->training = Course::find($id);
        $enrollStatus = Enroll::where(['training_id' => $id,'student_id'=> Session::get('student_id')])->first();
        if(isset($enrollStatus)){//if enrolled show all the courses // else show only video which is free
            $course_materials = TrainingsMaterial::where(['training_id' => $id])->get();
        }else{
            $course_materials = TrainingsMaterial::where(['training_id' => $id,'is_free_preview'=>true])->get();
        }
        return view('website.training.detail',[
            'training'=>$this->training,
            'enrollStatus' => isset($enrollStatus) ? 1 : 0,
            'course_materials' => $course_materials,
        ]);
    }
}
