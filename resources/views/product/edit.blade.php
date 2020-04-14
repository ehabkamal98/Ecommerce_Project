@extends('layouts.app')
@section('title',' - Edit Product')
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
        <h2 class="text-center"> <i class="bx bx-edit"></i> Edit Product</h2>
        <form method="post" action="{{route('update_product',$edit_product->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" value="{{$edit_product->name}}" class="form-control" id="name" name="name" placeholder="Name Of Product" required>
            </div>
            <div class="form-group">
                <label>Category</label>
                <select type="text" class="form-control" id="category" name="category"  required>
                    <option> Select Category ... </option>
                    @foreach($categories as $category)
                        <option @if($category->id==$edit_product->category_id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label> Price </label>
                        <input type="number" value="{{$edit_product->price}}" min=0 class="form-control" name="price" placeholder="Price">
                    </div>
                    <div class="col">
                        <label>Quantity</label>
                        <input type="number" value="{{$edit_product->quantity}}" min="0" class="form-control" name="quantity"placeholder="Quantity">
                    </div>
                    <div class="col custom-file">
                        <label>Photo</label>
                        <input type="file" name="image" class="custom-file-input" id="photo" >
                        <label style="margin-top: 30px" class="custom-file-label ">Choose file ... </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label >Description</label>
                <textarea class="form-control" value="{{$edit_product->description}}" name="description" id="description" rows="3"></textarea>
            </div>

            <div class="form-group">
                <div class="col-md-12 text-center" style="margin-top: 20px">
                    <button type="submit" class="btn btn-primary form-control col-sm-2">Update Product <i class="bx bx-upload"> </i></button>
                </div>
            </div>
        </form>
    </div>

@endsection
