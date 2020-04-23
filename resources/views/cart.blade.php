@extends('layouts.app')
@section('title',' - My Cart')
@section('pathbar')
    <li class="breadcrumb-item" aria-current="page"><a href="{{asset('home')}}"> <i class="bx bx-home"> Home</i></a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="bx bxs-cart"> Cart</i></li>
@endsection
@section('content')

    <div class="container">

        @if(is_array($sessions)||is_object($sessions))
        <h1 class="text-center"> <i class="bx bx-git-pull-request"> </i> pending products</h1>
        <div class="row">
            <div class="col-12">
                    <table class="table table-bordered data-table" style="vertical-align: middle;text-align: center;">
                        <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Quantity</th>
                            <th>Product Price</th>
                            <th>Total Price</th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        @foreach($sessions->items as $product)
                            <tbody>
                            <tr>
                                <th class="align-middle">{{$product['item']['name']}}</th>
                                <th class="align-middle">{{$product['count']}}</th>

                                <th class="align-middle">{{$product['item']['price']}}EGP</th>
                                <th class="align-middle"> {{$product['price']}} EGP</th>
                                <td class="align-middle">
                                    <a href="{{route('empty_cart')}}" class="btn btn-danger btn-mini deleteRecord">Delete All</a>
                                </td>
                            </tr>
                            </tbody>

                        @endforeach
                        <tfoot>
                        <tr>
                            <th class="align-middle" colspan="1">
                                Total Quantity
                            </th>
                            <th colspan="1">
                                {{$sessions->TotalCount}}
                            </th>
                            <th colspan="1">
                                Total Price
                            </th>
                            <th colspan="1">
                                {{$sessions->TotalPrice}} EGP
                            </th>
                            <th colspan="1">
                                <a href="{{route('save_my_cart')}}" class="btn btn-success btn-mini">Save Data</a>
                            </th>
                        </tr>
                        </tfoot>
                    </table>
            </div>
        </div>
        @endif

        @if(is_array($carts)||is_object($carts))
        <h1 class="text-center"> <i class="bx bx-git-pull-request"> </i> My Cart</h1>
        <div class="row">
                        <div class="col-12">
                            @foreach($carts as $cart)
                            <table class="table table-bordered data-table" style="vertical-align: middle;text-align: center;">
                                <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Quantity</th>
                                    <th>Product Price</th>
                                    <th>Total Price</th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                                @foreach($cart->cart_info->items as $item)
                                    <tbody>
                                    <tr>
                                        <th class="align-middle">{{$item['item']['name']}}</th>
                                        <th class="align-middle">{{$item['count']}}</th>
                                        <th class="align-middle">{{$item['item']['price']}}EGP</th>
                                        <th class="align-middle"> {{$item['price']}} EGP</th>
                                        <td class="align-middle">
                                            <a href="{{route('empty_cart')}}" class="btn btn-danger btn-mini deleteRecord">Delete All</a>
                                        </td>
                                    </tr>
                                    </tbody>

                                @endforeach
                                <tfoot>
                                <tr>
                                    <th class="align-middle" colspan="1">
                                        Total Quantity
                                    </th>
                                    <th colspan="1">
                                        {{$cart->cart_info->TotalCount}}
                                    </th>
                                    <th colspan="1">
                                        Total Price
                                    </th>
                                    <th colspan="1">
                                        {{$cart->cart_info->TotalPrice}} EGP
                                    </th>
                                    <th colspan="1">
                                        <a href="{{route('empty_cart_db')}}" class="btn btn-danger btn-mini deleteRecord">Delete All</a>
                                    </th>
                                </tr>
                                </tfoot>
                            </table>
                @endforeach
                        </div>
                    </div>
        @endif

    </div>

@endsection
