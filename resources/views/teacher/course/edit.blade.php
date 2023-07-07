@extends('teacher.master')

@section('body')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title mb-4 text-center">Update Course Form</h1>

                    <form action="{{route('course.update', ['id' => $course->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row mb-4">
                            <label for="teacher_id" class="col-sm-3 col-form-label">Course Category</label>
                            <div class="col-sm-9">
                                <select class="form-control" required name="category_id">
                                    <option value="" disabled selected> -- Select Course Category -- </option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{ $category->id == $course->id ? 'selected' : '' }}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="title" class="col-sm-3 col-form-label">Course Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="title" class="form-control" id="title" value="{{$course->title}}" placeholder="Course Title"/>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="description" class="col-sm-3 col-form-label">Course Description</label>
                            <div class="col-sm-9">
                                <textarea name="description" class="form-control summernote" id="description">
                                     {{$course->description}}
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="starting_date" class="col-sm-3 col-form-label">Starting Date</label>
                            <div class="col-sm-9">
                                <input type="date" name="starting_date" class="form-control" id="starting_date" value="{{$course->starting_date}}">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="price" class="col-sm-3 col-form-label">Course Price</label>
                            <div class="col-sm-9">
                                <input type="number" name="price" class="form-control" id="price" value="{{$course->price}}" placeholder="Enter Course Price">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="image" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control" id="image" value="{{$course->image}}" accept="image/*">
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Update Course Module</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

