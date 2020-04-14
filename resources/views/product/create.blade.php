@extends('layouts.app')
@section('title',' - Product')
@section('pathbar')
    <a  class="btn btn-info bx bx-arrow-back" href="{{route('show_admin')}}"> Dashboard</a>
@endsection
@section('content')
    <div style="width: 80%;margin: 0 auto;">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{Session::get('message')}}
            </div>
        @endif
        <h2 class="text-center"><i class="bx bx-add-to-queue"></i> Add New Product</h2>
        <form method="post" action="{{route('store_product')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name Of Product" required>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select type="text" class="form-control" id="category" name="category"  required>
                <option> Select Category ... </option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
            </select>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label> Price </label>
                    <input type="number" class="form-control" min=0 name="price" placeholder="Price">
                </div>
                <div class="col">
                    <label>Quantity</label>
                    <input type="number" class="form-control" min=1 name="quantity" placeholder="Quantity">
                </div>
                <div class="col custom-file">
                    <label>Photo</label>
                    <input type="file" name="image" class="custom-file-input" id="photo" required>
                    <label style="margin-top: 30px" class="custom-file-label ">Choose file ... </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label >Description</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
        </div>

        <div class="form-group">
            <div class="col-md-12 text-center" style="margin-top: 20px">
                <button type="submit" class="btn btn-primary form-control col-sm-2">Add Product <i class="bx bxs-add-to-queue"></i></button>
                <button type="reset" class="btn btn-secondary form-control col-sm-2" style="margin-left: 30px">Clear <i class="bx bx-reset"></i></button>
            </div>
        </div>
    </form>
    </div>
@endsection
