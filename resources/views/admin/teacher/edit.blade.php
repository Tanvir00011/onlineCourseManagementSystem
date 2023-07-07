@extends('admin.master')
@section('title')
    Edit Teacher
@endsection
@section('body')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Edit Teacher Form</h4>

                <form action="{{route('teacher.update',['id'=>$teacher->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mb-4">
                        <label  class="col-sm-3 col-form-label">Full name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" value="{{$teacher->name}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label  class="col-sm-3 col-form-label">Email Address</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" value="{{$teacher->email}}" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label  class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-sm-3 col-form-label">Mobile Number</label>
                        <div class="col-sm-9">
                            <input type="number" name="mobile" value="{{$teacher->mobile}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-sm-3 col-form-label">Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="image" class="form-control-file"/>
                            <img src="{{asset($teacher->image)}}" alt="" height="60" width="70"/>
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">

                            <div>
                                <button type="submit" class="btn btn-primary w-md">Update New Teacher</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
