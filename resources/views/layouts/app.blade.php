<!DOCTYPE html>
<html lang="en">

<head>
    <title>Katheay Dai | One & Only Furniture Ecommerce Platform</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Katheay Dai shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/bootstrap4/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/slick-1.8.0/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/responsive.css') }}">

    <!-- Toastr css -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://js.stripe.com/v3/"></script>
</head>

<body>

    @php
        use App\Models\Admin\Category;
        use App\Models\Wishlist;
        use App\Models\SiteSetting;
        $category = Category::all();
        $setting = SiteSetting::first();
    @endphp

    <div class="super_container">

        <!-- Header -->

        <header class="header">

            <!-- Top Bar -->

            <div class="top_bar">
                <div class="container">
                    <div class="row">
                        <div class="col d-flex flex-row">
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img src="{{ asset('frontend/images/phone.png') }}" alt="">
                                </div>{{ $setting->phone_one }}
                            </div>
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img src="{{ asset('frontend/images/mail.png') }}" alt="">
                                </div><a href="mailto:info@boomdevs.com">{{ $setting->email }}</a>
                            </div>
                            <div class="top_bar_content ml-auto">
                                @auth
                                    <div class="top_bar_menu">
                                        <ul class="standard_dropdown top_bar_dropdown">
                                            <li>
                                                <a href="" data-toggle="modal" data-target="#exampleModal">My Order
                                                    Tracking</a>
                                            </li>
                                        </ul>
                                    </div>
                                @endauth

                                <div class="top_bar_user">
                                    <div class="user_icon"><img src="{{ asset('frontend/images/user.svg') }}"
                                            alt="">
                                    </div>
                                    @auth
                                        <div>
                                            <ul class="standard_dropdown top_bar_dropdown">
                                                <li>
                                                    <a href="{{ url('/dashboard') }}">User Profile<i
                                                            class="fas fa-chevron-down"></i></a>
                                                    <ul>
                                                        <li><a href="{{ route('user.wishlist') }}">Wishlist</a></li>
                                                        <li><a href="{{ route('show.cart') }}">Cart</a></li>
                                                        <li><a href="{{ route('user.checkout') }}">Checkout</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    @else
                                        <div><a href="{{ route('login') }}">Sign in/Register</a></div>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Header Main -->

            <div class="header_main">
                <div class="container">
                    <div class="row">

                        <!-- Logo -->
                        <div class="col-lg-2 col-sm-3 col-3 order-1">
                            <div class="logo_container">
                                <div class="logo"><a href="{{ url('/') }}"><img
                                            src="{{ asset('frontend/images/logo.png') }}" width="120px"
                                            height="120px" alt=""></a></div>
                            </div>
                        </div>

                        <!-- Search -->
                        <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                            <div class="header_search">
                                <div class="header_search_content">
                                    <div class="header_search_form_container">
                                        <form method="POST" action="{{ route('search.form') }}"
                                            class="header_search_form clearfix">
                                            @csrf
                                            <input type="search" required="required" class="header_search_input"
                                                name="search" placeholder="Search for products...">
                                            <div class="custom_dropdown">
                                                <div class="custom_dropdown_list">
                                                    <span class="custom_dropdown_placeholder clc">All Categories</span>
                                                    <i class="fas fa-chevron-down"></i>
                                                    <ul class="custom_list clc">
                                                        <li><a class="clc" href="#">All Categories</a></li>
                                                        @foreach ($category as $row)
                                                            <li><a class="clc"
                                                                    href="#">{{ $row->category_name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <button type="submit" class="header_search_button trans_300"
                                                value="Submit"><img src="{{ asset('frontend/images/search.png') }}"
                                                    alt=""></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Wishlist -->
                        <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                            <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                                @auth
                                    @php
                                        $wishlist = Wishlist::where('user_id', Auth::id())->get();
                                    @endphp
                                    <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                        <div class="wishlist_icon"><img src="{{ asset('frontend/images/heart.png') }}"
                                                alt=""></div>
                                        <div class="wishlist_content">
                                            <div class="wishlist_text"><a
                                                    href="{{ route('user.wishlist') }}">Wishlist</a>
                                            </div>
                                            <div class="wishlist_count">{{ count($wishlist) }}</div>
                                        </div>
                                    </div>
                                @else

                                @endauth


                                <!-- Cart -->
                                <div class="cart">
                                    <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                        <div class="cart_icon">
                                            <img src="{{ asset('frontend/images/cart.png') }}" alt="">
                                            <div class="cart_count"><span>{{ Cart::count() }}</span></div>
                                        </div>
                                        <div class="cart_content">
                                            <div class="cart_text"><a href="{{ route('show.cart') }}">Cart</a>
                                            </div>
                                            <div class="cart_price">{{ Cart::subtotal() }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            @yield('content')

            <!-- Footer -->

            <footer class="footer">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 footer_col">
                            <div class="footer_column footer_contact">
                                <div class="logo_container">
                                    <div class="logo"><a href="{{ url('/') }}"><img
                                                src="{{ asset('frontend/images/logo.png') }}" alt=""></a></div>
                                </div>
                                <div class="footer_title">{{ $setting->company_info }}</div>
                                <div class="footer_phone">{{ $setting->phone_two }}</div>
                                <div class="footer_contact_text">
                                    <p>{{ $setting->company_address }}</p>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-2 offset-lg-2">
                            <div class="footer_column">
                                <div class="footer_title">Find it Fast</div>
                                <ul class="footer_list">
                                    <li><a href="#">Bed Room Fruniture</a></li>
                                    <li><a href="#">All Furniture</a></li>
                                    <li><a href="#">Shop</a></li>
                                    <li><a href="#">Home</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="footer_column">
                                <div class="footer_title">Pages</div>
                                <ul class="footer_list footer_list_2">
                                    <li><a href="#">Returns / Exchange</a></li>
                                    <li><a href="#">FAQs</a></li>
                                    <li><a href="#">Product Support</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="footer_column">
                                <div class="footer_title">Customer Care</div>
                                <ul class="footer_list">
                                    <li><a href="#">My Account</a></li>
                                    <li><a href="#">Order Tracking</a></li>
                                    <li><a href="#">Wish List</a></li>
                                    <li><a href="#">Customer Services</a></li>

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </footer>

            <!-- Copyright -->

    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('order.tracking') }}">
                        @csrf
                        <div class="model-body">
                            <label for="">Status Code</label>
                            <input type="text" name="code" required="" class="form-control"
                                placeholder="Your Order Status Code">
                        </div>
                        <button class="btn btn-danger mt-3" type="submit">Track Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('frontend/styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/greensock/TweenMax.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/greensock/TimelineMax.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/greensock/animation.gsap.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{ asset('frontend/plugins/slick-1.8.0/slick.js') }}"></script>
    <script src="{{ asset('frontend/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/js/product_custom.js') }}"></script>
    <script src="{{ asset('frontend/js/cart_custom.js') }}"></script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/61fe6b60b9e4e21181bd9a6d/1fr4t6sjm';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js') }}"></script>

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;
            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;
            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;
            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
            }
        @endif
    </script>

    <script>
        $(document).on("click", "#return", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                    title: "Are you Want to Return?",
                    text: "Once Return, This will return your money!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("Cancel!");
                    }
                });
        });
    </script>

    <script>
        $(document).on("click", "#cart_remove", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                    title: "Are you Want to Remove?",
                    text: "Once Remove, This will no longer in your cart page!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("Cancel!");
                    }
                });
        });
    </script>

</body>

</html>
