@extends('layouts.app')
@section('title',' - Category')
@section('pathbar')
    <a  class="btn btn-info bx bx-arrow-back" href="{{ route('show_admin') }}"> DashBoard</a>
@endsection
@section('content')
            <div class="container">
                @if(Session::has('message'))
                    <div class="alert alert-success text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{Session::get('message')}}
                    </div>
                @endif
                <div class="row" style="width: 100%">
                    <h1 class="text-center col-md-10"> <i class="bx bx-collection"> </i> Categories</h1>
                    <a href="{{route('create_category')}}"><h2 class="btn btn-success"><i class="bx bx-add-to-queue"></i> Create Category </h2></a>
                </div>
                    <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered data-table" style="vertical-align: middle;text-align: center;">
                            <thead>
                            <tr>
                            <th>Category Name</th>
                            <th>Category Image</th>
                            <td rowspan="2">Created At</td>
                            <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                            <tr>
                            <th class="align-middle">{{$category->name}}</th>
                            <td class="w-25"><img src="{{asset('images/'.$category->image)}}" class="img-fluid img-thumbnail"></td>
                            <td class="align-middle">{{$category->created_at}}</td>
                            <td class="align-middle">
                                <a href="{{route('edit_category',$category->id)}}" class="btn btn-primary btn-mini">Edit</a>
                                <a href="{{route('delete_category',$category->id)}}" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
                    <div style="padding-left: 50%;padding-top: 50px">{{$categories->links()}}</div>
@endsection
