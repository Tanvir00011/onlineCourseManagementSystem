@extends('admin.master')

@section('body')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Add Teacher layout</h4>
                <h4 class="text-center text-success">{{session('message')}}</h4>
                <form action="{{route('teacher.create')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mb-4">
                        <label  class="col-sm-3 col-form-label">Full name <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label  class="col-sm-3 col-form-label">Email Address <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label  class="col-sm-3 col-form-label">Password <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-sm-3 col-form-label">Mobile Number <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="number" name="mobile" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-sm-3 col-form-label">Image <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="file" name="image" class="form-control-file" required/>
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">

                            <div>
                                <button type="submit" class="btn btn-primary w-md">Create New Teacher</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
