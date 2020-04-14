<?php
$products=DB::table('products')->inRandomOrder()->where('quantity','<>','0')->limit(5)->get();
?>
@section('sidebar')
    <h2 class="text-center"><i class=" bx bx-package" > Products</i> </h2>
    <div class="row border-left" >
        @foreach($products as $product)
            <div class="col-md-8 " style="margin: 0 auto;">
                <br>
                <div class="card mb-1" style="border-radius: 20px">
                    <div class="position-relative card-img overlay" >
                        <span class="btn btn-danger" style="position: absolute;"><i class="bx bxs-collection"> </i> {{$cat=DB::table('categories')->find($product->category_id)->name}}</span>
                        <img src="{{asset('images/'.$product->category_id.'/'.$product->image)}}" alt="{{$product->name}}" height="100%" width="100%" style="opacity: .7;border-radius: 10px">
                    </div>
                    <div class="card-body">
                        <p class=" card-title"> <b>{{$product->name}}</b></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{route('product_user',$product->category_id)}}" class="btn btn-primary"> <i class="bx bx-detail"></i> More </a>
                            <a href="{{route('add_to_cart',['id'=>$product->id,'count'=>'1'])}}" class="btn btn-secondary"> <i class="bx bx-cart"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

