@extends('layouts.app')
@section('head')
    <title>Traveland - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <link rel="stylesheet" href="/css/aos.css">
    <link rel="stylesheet" href="/css/ionicons.min.css">
    <link rel="stylesheet" href="/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/css/jquery.timepicker.css">
    <link rel="stylesheet" href="/css/flaticon.css">
    <link rel="stylesheet" href="/css/icomoon.css">
    <link rel="stylesheet" href="/css/style.css">
@endsection
@section('content')
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar"  style="margin-top: 100px;">
        <div class="container">
            <a class="navbar-brand" href="/"><span>ДНР Путешествия</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="/" class="nav-link">Главная</a></li>
                    <li class="nav-item"><a href="/tours/allTours" class="nav-link">Путёвки</a></li>
                    <li class="nav-item active"><a href="/hotels/allHotels" class="nav-link">Отели</a></li>
                    <li class="nav-item"><a href="/myOrders" class="nav-link">Мои заказы</a></li>
                    <li class="nav-item"><a href="/statistic" class="nav-link">Статистика</a></li>
                    @auth()
                        @if(Auth::user()->is_admin == 1)
                            <li class="nav-item"><a href="/admin/index" class="nav-link">Работа с данными</a></li>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-md-last ftco-animate">
                    <h2 class="mb-3">{{$hotel->country}}, {{$hotel->city}}</h2>
                    <h2>{{$hotel->hotel}}
                        <div class="text">
                            <div class="star d-flex clearfix">
                                <div class="mr-auto float-left">
                                    @for($i = 0; $i < $hotel->stars; $i++)
                                        <span class="ion-ios-star" style="color: #ffe817"></span>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </h2>
                    <p>{{$hotel->description}}</p>
                    @foreach($photos as $photo)
                    <p>
                        <img src="{{$photo->photo_link}}" alt="" class="img-fluid">
                    </p>
                        @endforeach
                </div>

                <div class="col-lg-4 sidebar ftco-animate">

                    <div class="sidebar-box ftco-animate">
                        <div class="categories">
                            <h4>Информация об отеле</h4>
                            <h3>Услги:</h3>
                            @foreach($services as $service)
                                <li>{{$service->name}}</li>
                            @endforeach
                            <h3>Номера:</h3>
                            @foreach($rooms as $room)
                                <li>{{$room->name}} : {{$room->count}}</li>
                            @endforeach
                            <h3>Питание: {{$hotel->food}}</h3>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <footer class="ftco-footer ftco-footer-2 ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>Калюга Данил Владимирович</p>
                </div>
            </div>
        </div>
    </footer>
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.easing.1.3.js"></script>
    <script src="/js/jquery.waypoints.min.js"></script>
    <script src="/js/jquery.stellar.min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/jquery.magnific-popup.min.js"></script>
    <script src="/js/aos.js"></script>
    <script src="/js/jquery.animateNumber.min.js"></script>
    <script src="/js/bootstrap-datepicker.js"></script>
    <script src="/js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="/js/google-map.js"></script>
    <script src="/js/main.js"></script>
@endsection
