@extends('layouts.app')
@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('/css/Chart.css')}}">
<script src="{{asset('/js/Chart.js')}}"></script>
<script src="{{asset('/js/Chart.bundle.js')}}"></script>
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
                <li class="nav-item active"><a href="/statistic" class="nav-link">Статистика</a></li>
                @auth()
                    @if(Auth::user()->is_admin == 1)
                        <li class="nav-item"><a href="/admin/index" class="nav-link">Работа с данными</a></li>
                    @endif
                @endauth
            </ul>
        </div>
    </div>
</nav>
<canvas id="myChart" width="100" height="100"></canvas>

<div>
    <form action="{{ url('/statistic') }}">
        <input type="submit" value="Статистика по странам">
    </form>
    <form action="{{ url('/starsStatistic') }}">
        <input type="submit" value="Статистика по звездам отелей">
    </form>
    <form action="{{ url('/foodStatistic') }}">
        <input type="submit" value="Статистика по типам питания отелей">
    </form>
    <br>
    <br>
    <br>
</div>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {

            labels:[ {!!$text!!}],
            datasets: [{
                label: '',
                data: [ {{$counts}}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                labels: {
                    // This more specific font property overrides the global property
                    fontSize: 80,
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1,
                    }
                }]
            }
        }
    });
</script>
@endsection
