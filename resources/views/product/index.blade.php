@section('pathbar')
    <a  class="btn btn-info bx bx-arrow-back" href="{{ route('show_admin') }}"> DashBoard</a>
@endsection
@extends('layouts.app')
@section('title',' - Product')
@section('content')
            <div class="container">
                @if(Session::has('message'))
                    <div class="alert alert-success text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{Session::get('message')}}
                    </div>
                @endif
                    <div class="row" style="width: 100%">
                        <h1 class="text-center col-md-10"> <i class="bx bx-collection"> </i> Category Of {{$name_category->name}} </h1>
                        <a href="{{route('create_product')}}"><h2 class="btn btn-success"><i class="bx bx-add-to-queue"></i> Add Product </h2></a>
                    </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered data-table" style="vertical-align: middle;text-align: center;">
                            <thead>
                            <tr>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Product Image</th>
                            <td>Created At</td>
                            <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                            <tr>
                            <th class="align-middle">{{$product->name}}</th>
                                <th class="align-middle">{{$product->price}}</th>
                                <th class="align-middle">{{$product->quantity}}</th>
                            <td class="w-25"><img src="{{asset('images/'.$product->category_id.'/'.$product->image)}}" class="img-fluid img-thumbnail"></td>
                            <td class="align-middle">{{$product->created_at}}</td>
                            <td class="align-middle">
                                <a href="{{route('edit_product',$product->id)}}" class="btn btn-primary btn-mini">Edit</a>
                                <a href="{{route('delete_product',$product->id)}}" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
                    <div style="padding-left: 50%;padding-top: 50px">{{$products->links()}}</div>
@endsection
