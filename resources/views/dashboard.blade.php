<?php
$count_category=DB::table('categories')->count();
$count_product=DB::table('products')->count();
$count_finish_product=DB::table('products')->where('quantity','0')->count();
$category_id=DB::table('products')->pluck('category_id')->all();
$empty_category=DB::table('categories')->whereNotIn('id',$category_id)->select()->count();
$cats=DB::table('categories')->paginate(5);
$count_user=DB::table('users')->WhereNull('admin')->count();
$count_admin=DB::table('users')->Where('admin',1)->count();
$finish_product=DB::table('products')->where('quantity','0')->paginate(5);
?>
@extends('layouts.app')
@section('screen')
    <div class="row text-center" style="padding: 30px;width:60%">
        <div class="col-md-3 pad">
            <div class="counter">
                <h3><i class="bx bx-collection"></i></h3>
                <h2 class="timer count-title count-number" data-to="{{$count_category}}" data-speed="1500"></h2>
                <p class="count-text ">Categories</p>
            </div>
        </div>
        <div class="col-md-3 pad" >
            <div class="counter">
                <h3><i class="bx bx-box"></i> </h3>
                <h2 class="timer count-title count-number" data-to="{{$count_product}}" data-speed="1500"></h2>
                <p class="count-text ">Products</p>
            </div>
        </div>
        <div class="col-md-3 pad">
            <div class="counter">
                <h3><i class="bx bx-user"></i> </h3>
                <h2 class="timer count-title count-number" data-to="{{$count_user}}" data-speed="1500"></h2>
                <p class="count-text ">Users</p>
            </div>
        </div>
        <div class="col-md-4 pad">
            <div class="counter">
                <h3><i class="bx bx-no-entry"></i></h3>
                <h2 class="timer count-title count-number" data-to="{{$empty_category}}" data-speed="1500"></h2>
                <p class="count-text ">Empty Category</p>
            </div>
        </div>
        <div class="col-md-4 pad">
            <div class="counter">
                <h3><i class="bx bx-analyse"></i></h3>
                <h2 class="timer count-title count-number" data-to="{{$count_finish_product}}" data-speed="1500"></h2>
                <p class="count-text ">Finished Product</p>
            </div>
        </div>
    </div>

@endsection
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{Session::get('message')}}
        </div>
    @endif
    <nav>
        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link" id="nav-home-tab" href="{{route('index_category')}}" role="tab" ><div class="counter">
                    <h3><i class="bx bx-collection"></i></h3>
                    <h2 class="timer count-title count-number" data-to="{{$count_category}}" data-speed="1500"></h2>
                    <p class="count-text ">Categories</p>
                </div></a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-product" role="tab" aria-controls="nav-profile" aria-selected="false"><div class="counter">
                    <h3><i class="bx bx-box"></i> </h3>
                    <h2 class="timer count-title count-number" data-to="{{$count_product}}" data-speed="1500"></h2>
                    <p class="count-text ">Products</p>
                </div></a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-emptycategory" role="tab" aria-controls="nav-contact" aria-selected="false"><div class="counter">
                    <h3><i class="bx bx-no-entry"></i></h3>
                    <h2 class="timer count-title count-number" data-to="{{$empty_category}}" data-speed="1500"></h2>
                    <p class="count-text ">Empty Category</p>
                </div></a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-finshedproduct" role="tab" aria-controls="nav-contact" aria-selected="false"><div class="counter">
                    <h3><i class="bx bx-analyse"></i></h3>
                    <h2 class="timer count-title count-number" data-to="{{$count_finish_product}}" data-speed="1500"></h2>
                    <p class="count-text ">Finished Product</p>
                </div></a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade" id="nav-product" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="row" style="width: 100%;margin-top: 20px">
                <h1 class="text-center col-md-10">  <i class="bx bx-collection"> </i> Categories</h1>
            <a href="{{route('create_product')}}"><h2 class="btn btn-success"><i class="bx bx-add-to-queue"></i> Add Product </h2></a>
            </div>
                @foreach($cats as $cat)
                <p style="display:none">{{$count=DB::table('products')->where('category_id',$cat->id)->count()}} </p>
                @if($count>0)
                <p style="display:none">{{$count=DB::table('products')->where('category_id',$cat->id)->count()}} </p>
                    <a href="{{route('index_product',$cat->id)}}"><div class="card bg-white border-dark " style="height:500px;margin: 0 auto;color: black;margin-bottom: 30px;border-radius: 30px">
                            <img class="card-img" src="{{asset('images/'.$cat->image)}}"style="height:500px;;opacity: .5;border-radius: 30px" alt="Card image">
                            <div class="card-img-overlay">
                                <h5 class="card-title">{{$cat->name}}</h5>
                                <p class="card-text">{{$cat->description}}</p>
                                <p class="card-text btn btn-success bx bx-detail"> {{$count}}</p>
                            </div>
                        </div></a>
                @endif
            @endforeach
            <div style="padding-left: 50%;padding-top: 50px">{{$cats->links()}}</div>
        </div>
        <div class="tab-pane fade" id="nav-emptycategory" role="tabpanel" aria-labelledby="nav-contact-tab">
            <h1> <i class="bx bx-collection"> </i> Categories Empty</h1>
            @foreach($cats as $cat)
                <p style="display:none">{{$count=DB::table('products')->where('category_id',$cat->id)->count()}} </p>
                @if($count==0)
                <a href="{{route('index_product',$cat->id)}}"><div class="card bg-white border-dark " style="height:500px;margin: 0 auto;color: black;margin-bottom: 30px;border-radius: 30px">
                        <img class="card-img" src="{{asset('images/'.$cat->image)}}"style="height:500px;;opacity: .5;border-radius: 30px" alt={{$cat->name}}>
                        <div class="card-img-overlay">
                            <h5 class="card-title">{{$cat->name}}</h5>
                            <p class="card-text">{{$cat->description}}</p>
                            <p class="card-text btn btn-success bx bx-detail"> {{$count}}</p>
                        </div>
                    </div></a>
                @endif
            @endforeach
            <div style="padding-left: 50%;padding-top: 50px">{{$cats->links()}}</div>
        </div>
        <div class="tab-pane fade" id="nav-finshedproduct" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="container">
                <div class="row" style="width: 100%">
                    <h1> <i class="bx bx-file-blank"> </i> Product  Finished </h1>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered data-table" style="vertical-align: middle;text-align: center;">
                            <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Product Price</th>
                                <th>Product Quantity</th>
                                <th>Product Image</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($finish_product as $product)
                                <tr>
                                    <th class="align-middle">{{$product->name}}</th>
                                    <p style="display:none">{{$product_cat=DB::table('categories')->where('id',$product->category_id)->select('name')->get()}}</p>
                                    <th class="align-middle">{{$product_cat[0]->name}}</th>
                                    <th class="align-middle">{{$product->price}}</th>
                                    <th class="align-middle">{{$product->quantity}}</th>
                                    <td class="w-25"><img src="{{asset('images/'.$product->category_id.'/'.$product->image)}}" class="img-fluid img-thumbnail"></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="padding-left: 50%;padding-top: 50px">{{$finish_product->links()}}</div>
                    </div>
                </div>
            </div>
    </div>
    @yield('dash')
@endsection
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script>
    (function ($) {
        $.fn.countTo = function (options) {
            options = options || {};
            return $(this).each(function () {
                // set options for current element
                var settings = $.extend({}, $.fn.countTo.defaults, {
                    from:            $(this).data('from'),
                    to:              $(this).data('to'),
                    speed:           $(this).data('speed'),
                    refreshInterval: $(this).data('refresh-interval'),
                    decimals:        $(this).data('decimals')
                }, options);

                // how many times to update the value, and how much to increment the value on each update
                var loops = Math.ceil(settings.speed / settings.refreshInterval),
                    increment = (settings.to - settings.from) / loops;

                // references & variables that will change with each update
                var self = this,
                    $self = $(this),
                    loopCount = 0,
                    value = settings.from,
                    data = $self.data('countTo') || {};

                $self.data('countTo', data);

                // if an existing interval can be found, clear it first
                if (data.interval) {
                    clearInterval(data.interval);
                }
                data.interval = setInterval(updateTimer, settings.refreshInterval);

                // initialize the element with the starting value
                render(value);

                function updateTimer() {
                    value += increment;
                    loopCount++;

                    render(value);

                    if (typeof(settings.onUpdate) == 'function') {
                        settings.onUpdate.call(self, value);
                    }

                    if (loopCount >= loops) {
                        // remove the interval
                        $self.removeData('countTo');
                        clearInterval(data.interval);
                        value = settings.to;

                        if (typeof(settings.onComplete) == 'function') {
                            settings.onComplete.call(self, value);
                        }
                    }
                }

                function render(value) {
                    var formattedValue = settings.formatter.call(self, value, settings);
                    $self.html(formattedValue);
                }
            });
        };

        $.fn.countTo.defaults = {
            from: 0,               // the number the element should start at
            to: 0,                 // the number the element should end at
            speed: 1000,           // how long it should take to count between the target numbers
            refreshInterval: 100,  // how often the element should be updated
            decimals: 0,           // the number of decimal places to show
            formatter: formatter,  // handler for formatting the value before rendering
            onUpdate: null,        // callback method for every time the element is updated
            onComplete: null       // callback method for when the element finishes updating
        };

        function formatter(value, settings) {
            return value.toFixed(settings.decimals);
        }
    }(jQuery));

    jQuery(function ($) {
        // custom formatting example
        $('.count-number').data('countToOptions', {
            formatter: function (value, options) {
                return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
            }
        });

        // start all the timers
        $('.timer').each(count);

        function count(options) {
            var $this = $(this);
            options = $.extend({}, options || {}, $this.data('countToOptions') || {});
            $this.countTo(options);
        }
    });
</script>
