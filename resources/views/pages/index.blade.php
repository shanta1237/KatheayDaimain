@extends('layouts.app')

@section('content')
    <!-- Characteristics -->
    @include('layouts.menubar')
    @include('layouts.slider')
    @php
    use App\Models\Admin\Category;
    use App\Models\Admin\Subcategory;
    use App\Models\Admin\Brand;
    use App\Models\Product;

    $featured = Product::where('status', 1)
        ->orderBy('id', 'desc')
        ->limit(16)
        ->get();
    $hot_deal = Product::where('status', 1)
        ->where('hot_deal', 1)
        ->orderBy('id', 'asc')
        ->limit(5)
        ->get();
    @endphp

    <!-- Deals of the week -->

    <div class="deals_featured">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

                    <!-- Deals -->

                    <div class="deals">
                        <div class="deals_title">Deals of the Week</div>
                        <div class="deals_slider_container">

                            <!-- Deals Slider -->
                            <div class="owl-carousel owl-theme deals_slider">
                                @foreach ($hot_deal as $row)
                                    <!-- Deals Item -->
                                    <div class="owl-item deals_item">
                                        <div class="deals_image"><img src="{{ asset($row->image_one) }}" width="310px"
                                                height="310px">
                                        </div>
                                        <div class="deals_content">
                                            <div class="deals_info_line d-flex flex-row justify-content-start">
                                                <div class="deals_item_category"><a
                                                        href="#">{{ $row->brand->brand_name }}</a></div>
                                                @if ($row->discount_price == null)
                                                @else
                                                    <div class="deals_item_price_a ml-auto">${{ $row->selling_price }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="deals_info_line d-flex flex-row justify-content-start">
                                                <div class="deals_item_name"><a href="{{ url('product/details/' . $row->id . '/' . $row->product_name) }}">{{ $row->product_name }}</a></div>
                                                @if ($row->discount_price == null)
                                                    <div class="deals_item_price ml-auto">${{ $row->selling_price }}</div>
                                                @else
                                                @endif
                                                @if ($row->discount_price != null)
                                                    <div class="deals_item_price ml-auto">${{ $row->discount_price }}
                                                    </div>
                                                @else
                                                @endif

                                            </div>
                                            <div class="available">
                                                <div class="available_line d-flex flex-row justify-content-start">
                                                    <div class="available_title">Available:
                                                        <span>{{ $row->product_quantity }}</span>
                                                    </div>
                                                </div>
                                                <div class="available_bar"><span style="width:17%"></span></div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>

                        <div class="deals_slider_nav_container">
                            <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i>
                            </div>
                            <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Featured -->
                    <div class="featured">
                        <div class="tabbed_container">
                            <div class="tabs">
                                <ul class="clearfix">
                                    <li class="active">Featured</li>
                                </ul>
                                <div class="tabs_line"><span></span></div>
                            </div>

                            <!-- Product Panel -->
                            <div class="product_panel panel active">
                                <div class="featured_slider slider">
                                    @foreach ($featured as $row)
                                        <!-- Slider Item -->
                                        <div class="featured_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset($row->image_one) }}" width="115px" height="115px">
                                                </div>
                                                <div class="product_content">
                                                    @if ($row->discount_price == null)
                                                        <div class="product_price discount">${{ $row->selling_price }}
                                                        </div>
                                                    @else
                                                        <div class="product_price discount">
                                                            ${{ $row->discount_price }}<span>${{ $row->selling_price }}</span>
                                                        </div>
                                                    @endif

                                                    <div class="product_name">
                                                        <div><a
                                                                href="{{ url('product/details/' . $row->id . '/' . $row->product_name) }}">{{ $row->product_name }}</a>
                                                        </div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <button class="product_cart_button addcart"
                                                            data-id="{{ $row->id }}">Add to Cart</button>
                                                    </div>
                                                </div>

                                                <button class="addwishlist" data-id="{{ $row->id }}">
                                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                </button>

                                                <ul class="product_marks">
                                                    @if ($row->discount_price == null)
                                                        <li class="product_mark product_new">New</li>
                                                    @else
                                                        @php
                                                            $amount = $row->selling_price - $row->discount_price;
                                                            $discount = ($amount / $row->selling_price) * 100;
                                                        @endphp
                                                        <li class="product_mark product_discount">
                                                            {{ intval($discount) }}%
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="featured_slider_dots_cover"></div>
                            </div>

                            <!-- Product Panel -->

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!--Category One -->
    @php
    $cats = Category::skip(3)->first();
    $product = Product::where('status', 1)
        ->limit(10)
        ->orderBy('id', 'DESC')
        ->get();

    @endphp

    <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">{{ $cats->category_name }}</div>
                            <ul class="clearfix">
                                <li class="active"></li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12" style="z-index:1;">

                                <!-- Product Panel -->
                                <div class="product_panel panel active">
                                    <div class="arrivals_slider slider">
                                        @foreach ($product as $row)
                                            <!-- Slider Item -->
                                            <div class="arrivals_slider_item">
                                                <div class="border_active"></div>
                                                <div
                                                    class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                    <div
                                                        class="product_image d-flex flex-column align-items-center justify-content-center">
                                                        <img src="{{ asset($row->image_one) }}" width="115px"
                                                            height="115px">
                                                    </div>
                                                    <div class="product_content">
                                                        @if ($row->discount_price == null)
                                                            <div class="product_price discount">
                                                                ${{ $row->selling_price }}
                                                            </div>
                                                        @else
                                                            <div class="product_price discount">
                                                                ${{ $row->discount_price }}<span>${{ $row->selling_price }}</span>
                                                            </div>
                                                        @endif

                                                        <div class="product_name">
                                                            <div><a
                                                                    href="{{ url('product/details/' . $row->id . '/' . $row->product_name) }}">{{ $row->product_name }}</a>
                                                            </div>
                                                        </div>
                                                        <div class="product_extras">

                                                            <button class="product_cart_button addcart"
                                                                data-id="{{ $row->id }}">Add to Cart</button>
                                                        </div>
                                                    </div>

                                                    <button class="addwishlist" data-id="{{ $row->id }}">
                                                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                    </button>

                                                    <ul class="product_marks">
                                                        @if ($row->discount_price == null)
                                                            <li class="product_mark product_new">New</li>
                                                        @else
                                                            @php
                                                                $amount = $row->selling_price - $row->discount_price;
                                                                $discount = ($amount / $row->selling_price) * 100;
                                                            @endphp
                                                            <li class="product_mark product_discount">
                                                                {{ intval($discount) }}%
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- slider --}}
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('frontend/images/view_1.jpg') }}" alt="First slide" height="400">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('frontend/images/view_1.jpg') }}" alt="Second slide" height="400">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('frontend/images/view_1.jpg') }}" alt="Third slide" height="400">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            {{-- Sliders --}}
            <!-- Hot Category Two -->
            @php
                $cats = Category::skip(3)->first();
                $product = Product::where('status', 1)
                    ->limit(10)
                    ->orderBy('id', 'asc')
                    ->get();
                
            @endphp

            <div class="new_arrivals">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="tabbed_container">
                                <div class="tabs clearfix tabs-right">
                                    <div class="new_arrivals_title">{{ $cats->category_name }}</div>
                                    <ul class="clearfix">
                                        <li class="active"></li>
                                    </ul>
                                    <div class="tabs_line"><span></span></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12" style="z-index:1;">

                                        <!-- Product Panel -->
                                        <div class="product_panel panel active">
                                            <div class="arrivals_slider slider">
                                                @foreach ($product as $row)
                                                    <!-- Slider Item -->
                                                    <div class="arrivals_slider_item">
                                                        <div class="border_active"></div>
                                                        <div
                                                            class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                            <div
                                                                class="product_image d-flex flex-column align-items-center justify-content-center">
                                                                <img src="{{ asset($row->image_one) }}" width="115px"
                                                                    height="115px">
                                                            </div>
                                                            <div class="product_content">
                                                                @if ($row->discount_price == null)
                                                                    <div class="product_price discount">
                                                                        ${{ $row->selling_price }}
                                                                    </div>
                                                                @else
                                                                    <div class="product_price discount">
                                                                        ${{ $row->discount_price }}<span>${{ $row->selling_price }}</span>
                                                                    </div>
                                                                @endif

                                                                <div class="product_name">
                                                                    <div><a
                                                                            href="{{ url('product/details/' . $row->id . '/' . $row->product_name) }}">{{ $row->product_name }}</a>
                                                                    </div>
                                                                </div>
                                                                <div class="product_extras">

                                                                    <button class="product_cart_button addcart"
                                                                        data-id="{{ $row->id }}">Add to Cart</button>
                                                                </div>
                                                            </div>

                                                            <button class="addwishlist" data-id="{{ $row->id }}">
                                                                <div class="product_fav"><i class="fas fa-heart"></i>
                                                                </div>
                                                            </button>

                                                            <ul class="product_marks">
                                                                @if ($row->discount_price == null)
                                                                    <li class="product_mark product_new">New</li>
                                                                @else
                                                                    @php
                                                                        $amount = $row->selling_price - $row->discount_price;
                                                                        $discount = ($amount / $row->selling_price) * 100;
                                                                    @endphp
                                                                    <li class="product_mark product_discount">
                                                                        {{ intval($discount) }}%
                                                                    </li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @php
                        $buyget = Product::where('status', 1)
                            ->where('buyone_getone', 1)
                            ->limit(6)
                            ->orderBy('id', 'asc')
                            ->get();
                        
                    @endphp

                    <div class="trends">

                        <div class="trends_overlay"></div>
                        <div class="container">
                            <div class="row">

                                <!-- Trends Content -->
                                <div class="col-lg-3">
                                    <div class="trends_container">
                                        <h2 class="trends_title">Katheay Dai Furniture</h2>
                                        <div class="trends_text">
                                            <p>Best Quality Furniture</p>
                                        </div>
                                        <div class="trends_slider_nav">
                                            <div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i>
                                            </div>
                                            <div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Trends Slider -->
                                <div class="col-lg-9">
                                    <div class="trends_slider_container">

                                        <!-- Trends Slider -->

                                        <div class="owl-carousel owl-theme trends_slider">
                                            @foreach ($buyget as $row)
                                                <!-- Trends Slider Item -->
                                                <div class="owl-item">
                                                    <div class="trends_item is_new">
                                                        <div
                                                            class="trends_image d-flex flex-column align-items-center justify-content-center">
                                                            <img src="{{ asset($row->image_one) }}" alt="">
                                                        </div>
                                                        <div class="trends_content">
                                                            <div class="trends_category"><a
                                                                    href="#">{{ $row->brand->brand_name }}</a></div>
                                                            <div class="trends_info clearfix">
                                                                <div class="trends_name"><a
                                                                        href="{{ url('product/details/' . $row->id . '/' . $row->product_name) }}">{{ $row->product_name }}</a>
                                                                </div>
                                                                @if ($row->discount_price == null)
                                                                    <div class="product_price discount">
                                                                        ${{ $row->selling_price }}
                                                                    </div>
                                                                @else
                                                                    <div class="product_price discount">
                                                                        ${{ $row->discount_price }}<span>${{ $row->selling_price }}</span>
                                                                    </div>
                                                                @endif
                                                                <button class="btn btn-danger btn-sm addcart"
                                                                    data-id="{{ $row->id }}">Add to Cart</button>
                                                            </div>
                                                        </div>
                                                        <ul class="trends_marks">
                                                            <li class="trends_mark trends_new">buy</li>
                                                        </ul>
                                                        <button class="addwishlist" data-id="{{ $row->id }}">
                                                            <div class="trends_fav"><i class="fas fa-heart"></i>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('.addcart').on('click', function() {

                var id = $(this).data('id');
                if (id) {
                    $.ajax({
                        url: " {{ url('/add/to/cart/') }}/" + id,
                        type: "GET",
                        datType: "json",
                        success: function(data) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                onOpen: (toast) => {
                                    toast.addEventListener(
                                        'mouseenter', Swal
                                        .stopTimer)
                                    toast.addEventListener(
                                        'mouseleave', Swal
                                        .resumeTimer)
                                }
                            })
                            if ($.isEmptyObject(data.error)) {
                                Toast.fire({
                                    icon: 'success',
                                    title: data.success
                                })
                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: data.error
                                })
                            }

                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });

    </script> --}}


    <script type="text/javascript">
        $(document).ready(function() {
            $('.addcart').on('click', function() {
                var id = $(this).data('id');
                if (id) {
                    $.ajax({
                        url: " {{ url('/add/to/cart/') }}/" + id,
                        type: "GET",
                        datType: "json",
                        success: function(data) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                onOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal
                                        .stopTimer)
                                    toast.addEventListener('mouseleave', Swal
                                        .resumeTimer)
                                }
                            })
                            if ($.isEmptyObject(data.error)) {
                                Toast.fire({
                                    icon: 'success',
                                    title: data.success
                                })
                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: data.error
                                })
                            }

                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('.addwishlist').on('click', function() {
                var id = $(this).data('id');
                if (id) {
                    $.ajax({
                        url: " {{ url('add/wishlist/') }}/" + id,
                        type: "GET",
                        datType: "json",
                        success: function(data) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                onOpen: (toast) => {
                                    toast.addEventListener(
                                        'mouseenter',
                                        Swal
                                        .stopTimer)
                                    toast.addEventListener(
                                        'mouseleave',
                                        Swal
                                        .resumeTimer)
                                }
                            })
                            if ($.isEmptyObject(data.error)) {
                                Toast.fire({
                                    icon: 'success',
                                    title: data.success
                                })
                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: data.error
                                })
                            }

                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection
