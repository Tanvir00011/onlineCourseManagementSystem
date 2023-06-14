@extends('admin.master')

@section('body')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Add Category Form</h4>
                <h4 class="text-center text-success">{{session('message')}}</h4>
                <form action="{{route('category.create')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mb-4">
                        <label  class="col-sm-3 col-form-label">Category name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-sm-3 col-form-label">Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="image" class="form-control-file"/>
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

