<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Enroll;
use App\Models\Training;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    private $training,$trainings,$category, $categories;
    public function index()
    {
        $this->trainings = Training::where('status',1)->get();
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
        $this->trainings= Training::all();
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
        $this->training = Training::find($id);
        $enrollStatus = Enroll::where(['training_id' => $id,'student_id'=> Session::get('student_id')])->first();
        return view('website.training.detail',[
            'training'=>$this->training,
            'enrollStatus' => isset($enrollStatus) ? 1 : 0,
        ]);
    }
}
