@extends('teacher.master')

@section('body')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Add Course Material</h4>
                <h4 class="text-center text-success">{{session('message')}}</h4>
                <form action="{{route('course.material.create',['id'=>$id])}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row mb-4">
                        <label  class="col-sm-3 col-form-label">Title <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="title" class="form-control " required>
                        </div>
                    </div>


                    <div class="form-group row mb-4">
                        <label class="col-sm-3 col-form-label">Video <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="file" name="video" class="form-control-file" required accept="video/*"/>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-sm-3 col-form-label">Thumbnail Image <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="file" name="thumbnail_image" class="form-control-file" accept="image/*" required/>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" name="is_free_preview">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Can free preview!</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">

                            <div>
                                <button type="submit" class="btn btn-primary w-md">Add</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
