<?php
$cats=DB::table('categories')->get();
?>
@extends('layouts.app')
@section('pathbar')
    <li class="breadcrumb-item" aria-current="page"><i class="bx bx-home"> Home</i></li>
    <li class="breadcrumb-item active" aria-current="page"> <i class="bx bx-collection"> Category</i></li>
@endsection
@section('content')
<div class="container">
    <h1> <i class="bx bx-collection"> </i> Categories</h1>
    @foreach($cats as $cat)
        <p style="display:none">{{$count=DB::table('products')->where('category_id',$cat->id)->count()}} </p>
    <a href="{{route('product_user',$cat->id)}}"><div class="card bg-white border-dark " style="height:300px;margin: 0 auto;color: black;margin-bottom: 30px;border-radius: 30px">
        <img class="card-img" src="{{asset('images/'.$cat->image)}}"style="height:300px;;opacity: .5;border-radius: 30px" alt={{$cat->name}}>
        <div class="card-img-overlay">
            <h5 class="card-title">{{$cat->name}}</h5>
            <p class="card-text">{{$cat->description}}</p>
            <p class="card-text btn btn-success bx bx-detail"> {{$count}}</p>
        </div>
        </div></a>
        @endforeach
</div>
@endsection

