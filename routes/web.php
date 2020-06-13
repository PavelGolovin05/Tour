<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::group(['prefix'=>'tours'], function (){
    Route::get('/allTours', 'ToursController@allToursAction');
    Route::get('/tour', 'ToursController@chosenTourAction');
    Route::get('/findTours', 'ToursController@findToursAction');
});

Route::group(['prefix'=>'hotels'], function (){
    Route::get('/allHotels', 'HotelsController@allHotelsAction');
    Route::get('/hotel/{id}', 'HotelsController@chosenHotelAction');
    Route::get('/findHotels', 'HotelsController@findHotelsAction');
});

Route::group(['prefix'=>'admin'], function (){
    Route::get('/index', 'AdminController@indexAction');
    Route::get('/tours', 'AdminController@toursAction');
    Route::get('/addTour', 'AdminController@addTourAction');
    Route::get('/hotels', 'AdminController@hotelsAction');
    Route::get('/addHotel', 'AdminController@addHotelAction');
    Route::get('/hotelPhotos', 'AdminController@hotelPhotosAction');
    Route::get('/addPhoto', 'AdminController@addphotoAction');
});

Route::get('/myOrders', 'OrderTourController@showMyOrdersAction')->middleware('auth');
Route::get('/orderTour', 'OrderTourController@addOrderTourAction');
Route::get('/removeTour', 'OrderTourController@removeOrderTourAction');

Route::get('/statistic', 'StatisticController@defaultStatisticAction');
Route::get('/starsStatistic', 'StatisticController@starsStatisticAction');
Route::get('/foodStatistic', 'StatisticController@foodStatisticAction');
