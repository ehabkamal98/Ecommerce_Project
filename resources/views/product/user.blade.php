@extends('layouts.app')
@section('title',' - '.$category->name)
@section('pathbar')
    <li class="breadcrumb-item" aria-current="page"><a href="{{asset('home')}}"> <i class="bx bx-home"> Home</i></a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="{{asset('home')}}"><i class="bx bx-collection"> Category</i></a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
@endsection
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{Session::get('message')}}
        </div>
    @endif
                    <div class="card bg-dark text-white" style="opacity: .5;margin-bottom: 20px">
                        <img class="card-img" src="{{asset('images/'.$category->image)}}" alt="{{$category->name}}" style="">
                        <div class="card-img-overlay">
                            <h3 class="card-title text-dark"><i class="bx bx-collection"></i> {{$category->name}}</h3>
                        </div>
                    </div>
                    <div style="padding-left: 50%">{{$products->links()}}</div>

                    <div class="card-deck">
                        @foreach($products as $product)
                           @if($product->quantity>0)
                        <div class="card col-md-4" style="padding: 20px">
                            <img class="card-img-top"  style="max-height: 350px; max-width: 350px;margin: auto" src="{{asset('images/'.$product->category_id.'/'.$product->image)}}" alt="{{$product->name}}">
                            <div class="card-body">
                                <h5 class="card-title">{{$product->name}}</h5>
                                <p class="card-text">{{$product->description}}</p>
                            </div>
                            <div class="card-footer text-center bg-white">
                                <span class="badge badge-danger bx bx-pound float-lg-left"> {{$product->price}} EGP</span>
                                <span class="badge badge-danger bx bx-detail float-lg-right"> <span class="cnt" >{{$product->quantity}}</span> piece(s) </span>
                                <div class="qty mt-5 text-center">
                                    <span class="minus bg-dark">-</span>
                                    <input type="number" class="count" name="qty" value="1">
                                    <span class="plus bg-dark">+</span>
                                    <span> * Not Working in this version</span>
                                </div>
                            </div>
                            <a type="button" href="{{route('add_to_cart',['id'=>$product->id,'count'=>'1'])}}" class="btn btn-primary text-center" > Add To Cart</a>
                        </div>
                            @endif
                        @endforeach
                    </div>
                    <div style="padding-left: 50%;padding-top: 50px">{{$products->links()}}</div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){

        $('.count').prop('disabled', true);
        $(document).on('click','.plus',function(){
                $('.count').val(parseInt($('.count').val()) + 1 );
        });
        $(document).on('click','.minus',function(){
            $('.count').val(parseInt($('.count').val()) - 1 );
            if ($('.count').val() == 0) {
                $('.count').val(1);
            }
        });
    });
</script>
