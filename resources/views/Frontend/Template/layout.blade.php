<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta Tags -->
        <meta charset="UTF-8">
        <title>{{ $metas->title }} - @yield('title')</title>
        <meta name="description" content="{{ $metas->description }}">
        <meta name="keywords" content="{{ $metas->keywords }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('uploads/' . $metas->favicon ) }}">
        <!-- Stylesheets -->
        <link rel="stylesheet" href="{{ asset('Frontend/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('Frontend/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('Frontend/css/jquery-ui.min.css') }}">
        <link rel="stylesheet" href="{{ asset('Frontend/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('Frontend/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('Frontend/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('Frontend/css/meanmenu.css') }}">
        <link rel="stylesheet" href="{{ asset('Frontend/css/global.css') }}">
        <link rel="stylesheet" href="{{ asset('Frontend/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('Frontend/css/responsive.css') }}">
        <!-- Theme Color File -->
        <link rel="stylesheet" href="{{ asset('Frontend/css/colors/'.$color->color.'.css') }}">
    </head>
    <body>
        <!--Loader Start-->
        <div id="loader">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
        <!--Loader End-->
        <!--Header Section Start-->
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 col-12">
                        <div class="infos">
                            <ul>
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    <span>{{ $infos->email }}</span>
                                </li>
                                <li>
                                    <i class="fa fa-phone"></i>
                                    <span>{{ $infos->phone }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5 col-12">
                        <div class="social-icons">
                            <ul>
                                <li>
                                    <div class="social-nav">
                                        <ul>
                                            <li><a href="{{ $socials->facebook }}" target="blank"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="{{ $socials->instagram }}" target="blank"><i class="fa fa-instagram"></i></a></li>
                                            <li><a href="{{ $socials->twitter }}" target="blank"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="{{ $socials->linkedin }}" target="blank"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="{{ $socials->youtube }}" target="blank"><i class="fa fa-youtube"></i></a></li>
                                            <li><a href="{{ $socials->vimeo }}" target="blank"><i class="fa fa-vimeo"></i></a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Header Section End-->
        <!--Navbar Start-->
        <div id="strickymenu" class="menu">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-12">
                        <div class="logo flex">
                            <a href="{{ route('/') }}" class="navbar-logo" >{{ $infos->name }}</a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-12 main-menu">
                        <div class="main-menu-item">
                            <ul class="nav-menu">
                                @foreach($items->where('appear', 'show') as $item)
                                <li>
                                    <a class="{{ Request::is($item->route) ? 'active-navbar-link' : '' }}" href="{{ route($item->route) }}">{{ $item->title }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Navbar End-->
        <!--Content-->
        @yield('content')
        <!--End Content-->
        <!--Footer-Area Start-->
        <div class="footer-area pt_40 pb_60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h3>{{ $heading->footer_contact }}</h3>
                            <div class="footer-address-item">
                                <div class="icon"><i class="fa fa-map-marker"></i></div>
                                <div class="text">
                                    <span>{{ $infos->address }} , {{ $infos->city }} , {{ $infos->state }} , {{ $infos->country }} </span>
                                </div>
                            </div>
                            <div class="footer-address-item">
                                <div class="icon"><i class="fa fa-phone"></i></div>
                                <div class="text">
                                    <span>{{ $infos->phone }}</span>
                                </div>
                            </div>
                            <div class="footer-address-item">
                                <div class="icon"><i class="fa fa-envelope-o"></i></div>
                                <div class="text">
                                    <span>{{ $infos->email }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h3>{{ $heading->footer_links }}</h3>
                            <ul>
                                @foreach($pages as $page)
                                <li><a href="{{ route('page', ['id'=>$page->id, 'title'=> str_replace(" ", "-", $page->title)]) }}">{{ $page->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="mt-30">
                            <h3 class="keep-touch">{{ $heading->footer_keep }}</h3>
                            <div class="keep-touch-social">
                                <button type="submit" class="btn btn-primary"><a target="_blank" href="{{ $socials->facebook }}"><i class="fa fa-facebook"></i></a></button>
                                <button type="submit" class="btn btn-primary"><a target="_blank" href="{{ $socials->twitter }}"><i class="fa fa-twitter"></i></a></button>
                                <button type="submit" class="btn btn-primary"><a target="_blank" href="{{ $socials->instagram }}"><i class="fa fa-instagram"></i></a></button>
                            </div>
                            <div class="keep-touch-social">
                                <button type="submit" class="btn btn-primary"><a target="_blank" href="{{ $socials->youtube }}"><i class="fa fa-youtube"></i></a></button>
                                <button type="submit" class="btn btn-primary"><a target="_blank" href="{{ $socials->vimeo }}"><i class="fa fa-vimeo"></i></a></button>
                                <button type="submit" class="btn btn-primary"><a target="_blank" href="{{ $socials->linkedin }}"><i class="fa fa-linkedin"></i></a></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item" id="newsletter">
                            <h3>{{ $heading->footer_newsletter }}</h3>
                            <p>Subscribe to our newsletter list to receive our latest offers & news.</p>
                            <form action="{{ route('add.subscriber') }}" method="POST">
                                @csrf
                                <div class="input-group subscribe-input">
                                    <input name="email" type="email" class="form-control" placeholder="Email Address" required>
                                    <span class="input-group-btn">
                                        <button class="btn" type="submit">
                                        <i class="fa fa-location-arrow"></i></button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom pt_20 pb_20">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="copy-text">
                            <p>{{ $metas->copyright }} | Created By <a href="https://codecanyon.net/user/todocode" target="_blank">TodoCode</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Footer End-->
        <!--Start Scroll-To-Top-->
        <div class="scroll-top">
            <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
        </div>
        <!--End Scroll-To-Top-->
        <!--JavaScript Scripts Start -->
        <script src="{{ asset('Frontend/js/jquery-2.2.4.min.js') }}"></script>
        <script src="{{ asset('Frontend/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('Frontend/js/popper.min.js') }}"></script>
        <script src="{{ asset('Frontend/js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('Frontend/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('Frontend/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('Frontend/js/jquery.meanmenu.js') }}"></script>
        <script src="{{ asset('Frontend/js/jquery.filterizr.min.js') }}"></script>
        <script src="{{ asset('Frontend/js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('Frontend/js/waypoints.min.js') }}"></script>
        <script src="{{ asset('Frontend/js/viewportchecker.js') }}"></script>
        <script src="{{ asset('Frontend/js/custom.js') }}"></script>
        <!--JavaScript Scripts End -->
    </body>
</html>
