@extends('teacher.master')

@section('body')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Add Course Form</h4>
                <h4 class="text-center text-success">{{ session('message') }}</h4>
                <form action="{{ route('course.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mb-4">
                        <label class="col-sm-3 col-form-label">Course Category <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select class="form-control" required name="category_id">
                                <option value="" disabled selected>--Select Course Category--</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-sm-3 col-form-label">Course Title <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="title" class="form-control " required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-sm-3 col-form-label">Short Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control summernote" name="description" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-sm-3 col-form-label">Starting Date <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="date" name="starting_date" class="form-control" required>
                        </div>
                    </div>
                    {{-- <div class="form-group row mb-4">
                        <label class="col-sm-3 col-form-label">Course Price</label>
                        <div class="col-sm-9">
                            <input type="number" name="price" class="form-control">
                        </div>
                    </div> --}}
                    <div class="form-group row mb-4">
                        <label class="col-sm-3 col-form-label">Image <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="file" name="image" class="form-control-file" required/>
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">

                            <div>
                                <button type="submit" class="btn btn-primary w-md">Create New Course</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
