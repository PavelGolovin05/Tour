@extends('layouts.app')
@section('head')
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
                    <li class="nav-item"><a href="/hotels/allHotels" class="nav-link">Отели</a></li>
                    <li class="nav-item"><a href="/myOrders" class="nav-link">Мои заказы</a></li>
                    <li class="nav-item"><a href="/statistic" class="nav-link">Статистика</a></li>
                    @auth()
                        @if(Auth::user()->is_admin == 1)
                            <li class="nav-item active"><a href="/admin/index" class="nav-link">Работа с данными</a></li>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <section class="ftco-section">
        <br>
        <br>
        <br>
        <div class="container">
            @if (session()->has('message'))
                <div class="alert alert-info">
                    {{ session('message') }}
                </div>
            @endif
            <div class="row">
                <form action="{{ url('admin/addTour') }}">
                    <table>
                        <tr>
                            <td>
                                <div class="col-lg align-items-end">
                                    <div class="form-group">
                                        <label for="#">Отель</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <select name="hotel" class="form-control">
                                                    @foreach($hotels as $hotel)
                                                        <option value="{{$hotel->id}}">{{$hotel->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg align-items-end">
                                    <div class="form-group">
                                        <label for="#">Количество людей</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <select name="count_peoples" class="form-control">
                                                    @for($i = 2; $i < 6; $i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg align-items-end">
                                    <div class="form-group">
                                        <label for="#">Стомость</label>
                                        <div class="form-field">
                                            <input  required type="number" class="form-control" name="cost">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg align-items-end">
                                    <div class="form-group">
                                        <label for="#">Дата начала тура</label>
                                        <div class="form-field">
                                            <input type="date"  name="start_tour" style="width:367px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg align-items-end">
                                    <div class="form-group">
                                        <label for="#">Дата окончания тура</label>
                                        <div class="form-field">
                                            <input type="date"  name="end_tour" style="width:367px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg align-self-end">
                                    <div class="form-group">
                                        <div class="form-field">
                                            <input type="submit" value="Добавить" class="form-control btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td width="300px">
                                <div class="col-lg align-items-end">
                                    <div class="form-group">
                                        <label for="#">Трансфер</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <select name="transfer" class="form-control">
                                                    @foreach($transfers as $transfer)
                                                        <option value="{{$transfer->id}}">{{$transfer->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg align-items-end">
                                    <div class="form-group">
                                        <label for="#">Страховка</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <select name="insurance" class="form-control">
                                                    <option value="0">Нету</option>
                                                    <option value="1">Есть</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg align-items-end">
                                    <div class="form-group">
                                        <label for="#">Виза</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <select name="visa" class="form-control">
                                                    <option value="0">Нету</option>
                                                    <option value="1">Есть</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td width="300px">
                                <div class="col-lg align-items-end">
                                    <div class="form-group">
                                        <label for="#">Доставка в отель</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <select name="hotel_delivery" class="form-control">
                                                    <option value="0">Нету</option>
                                                    <option value="1">Есть</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg align-items-end">
                                    <div class="form-group">
                                        <label for="#">Питание</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <select name="food" class="form-control">
                                                    <option value="0">Не включено</option>
                                                    <option value="1">Включено</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div><div class="col-lg align-items-end">
                                    <div class="form-group">
                                        <label for="#">Проживание в отеле</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <select name="residence" class="form-control">
                                                    <option value="0">Не включено</option>
                                                    <option value="1">Включено</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
                <br>
                <br>
                <br>
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

