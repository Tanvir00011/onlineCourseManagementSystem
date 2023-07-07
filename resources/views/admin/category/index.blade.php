@extends('admin.master')
@section('title')
    Category Add
@endsection
@section('body')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Add Category Form</h4>
                <h4 class="text-center text-success">{{session('message')}}</h4>
                <form action="{{route('category.create')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mb-4">
                        <label  class="col-sm-3 col-form-label">Category name <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" required>
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
                                <button type="submit" class="btn btn-primary w-md">Create New Category</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

