@extends('layouts.app')
@section('title',' - Category')
@section('pathbar')
    <a  class="btn btn-info bx bx-arrow-back" href="{{route('show_admin')}}"> Dashboard</a>
@endsection
@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{Session::get('message')}}
            </div>
        @endif
            <h2 class="text-center"><i class="bx bx-add-to-queue"></i> Create Category </h2>
            <form method="post" action="{{route('store_category')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name Of Category" required>
        </div>

        <div class="form-group">
            <label >Description</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
        </div>

        <div class=" custom-file">
            <input type="file" name="image" class="custom-file-input" id="photo" required>
            <label class="custom-file-label ">Choose file ...</label>
        </div>

        <div class="form-group">
            <div class="col-md-12 text-center" style="margin-top: 20px">
                <button type="submit" class="btn btn-primary form-control col-sm-2">Create Category</button>
                <button type="reset" class="btn btn-secondary form-control col-sm-2" style="margin-left: 30px">Clear</button>

            </div>
        </div>
    </form>
    </div>
@endsection
