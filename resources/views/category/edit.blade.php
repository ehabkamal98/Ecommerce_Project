@extends('layouts.app')
@section('title',' - Edit Category')
@section('pathbar')
    <a  class="btn btn-info bx bx-arrow-back" href="{{ URL::previous() }}"> Go Back</a>
    @endsection
@section('content')
    <div class="container">
        <form method="post" action="{{route('update_category',$edit_category->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$edit_category->name}}" placeholder="Name Of Category" required>
            </div>

            <div class="form-group">
                <label >Description</label>
                <textarea class="form-control" name="description" id="description" value="{{$edit_category->description}}" rows="3"></textarea>
            </div>

            <div class=" custom-file">
                <input type="file" name="image" class="custom-file-input" id="photo">
                <label class="custom-file-label ">@if($edit_category->image) Old Photo Exist @endif</label>
            </div>

            <div class="form-group">
                <div class="col-md-12 text-center" style="margin-top: 20px">
                    <button type="submit" class="btn btn-primary form-control col-sm-2">Update Category</button>
                </div>
            </div>
        </form>
    </div>

@endsection
