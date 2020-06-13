<?php

namespace App\Http\Controllers;

use App\Countries;
use App\OrderTour;
use App\TypesFood;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function defaultStatisticAction()
    {
        $countries = Countries::where('id', '>', 1)->get();
        $text = '';
        $counts = '';
        foreach ($countries as $country){
            $text .= '"'.$country->name .'",';

            $value = OrderTour::join('tours','tours.id','order_tour.tour_id')
                ->join('hotels', 'hotels.id', 'tours.hotel_id')
                ->join('cities', 'cities.id', 'hotels.city_id')
                ->join('countries', 'countries.id', 'cities.country_id')
                ->where('countries.id',$country->id)->count('order_tour.id');

            $counts .= $value .',';
        };

        return view('statistic',compact('text','counts'));;
    }

    public function starsStatisticAction()
    {
        $stars = [1, 2, 3, 4, 5];
        $text = '';
        $counts = '';
        foreach ($stars as $star){
            $text .= '"'.$star.'",';

            $value = OrderTour::join('tours','tours.id','order_tour.tour_id')
                ->join('hotels', 'hotels.id', 'tours.hotel_id')
                ->where('hotels.stars',$star)->count('order_tour.id');

            $counts .= $value .',';
        };

        return view('statistic',compact('text','counts'));;
    }

    public function foodStatisticAction()
    {
        $foods = TypesFood::all();
        $text = '';
        $counts = '';
        foreach ($foods as $food){
            $text .= '"'.$food->name.'",';

            $value = OrderTour::join('tours','tours.id','order_tour.tour_id')
                ->join('hotels', 'hotels.id', 'tours.hotel_id')
                ->where('hotels.type_food_id',$food->id)->count('order_tour.id');

            $counts .= $value .',';
        };

        return view('statistic',compact('text','counts'));;
    }
}
