<?php

namespace App\Http\Controllers;

use App\Cities;
use App\Countries;
use App\HotelPhotos;
use App\HotelRooms;
use App\HotelServices;
use App\Tours;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ToursController extends Controller
{
    public function allToursAction()
    {
        $countries = Countries::where('id','>',1)->get();

        $tours = Tours::join('hotels', 'hotels.id','tours.hotel_id')
            ->join('cities','cities.id','hotels.city_id')
            ->join('countries','countries.id','cities.country_id')
            ->select('countries.name as country', 'cities.name as city', 'hotels.photo_link','tours.id' ,'hotels.name as hotel', 'hotels.stars', 'tours.cost', 'tours.count_peoples')
            ->paginate(4);
        return view('tours.allTours', compact('countries', 'tours'));
    }

    public function chosenTourAction(Request $request)
    {
        $remove = (boolean) $request->get('remove');
        $id = $request->get('id');

        $tour = Tours::join('hotels', 'hotels.id','tours.hotel_id')
            ->join('cities','cities.id','hotels.city_id')
            ->join('countries','countries.id','cities.country_id')
            ->join('types_food','types_food.id','hotels.type_food_id')
            ->join('type_transfers', 'type_transfers.id', 'tours.type_transfer_id')
            ->where('tours.id', $id)
            ->select('countries.name as country', 'cities.name as city', 'type_transfers.name as transfer',
                'hotels.photo_link','hotels.id as hotel_id' ,'hotels.name as hotel', 'hotels.description',
                 'tours.id', 'tours.cost', 'tours.count_peoples', 'tours.start_tour', 'tours.end_tour',
                'tours.insurance', 'tours.food', 'tours.visa', 'tours.hotel_delivery', 'tours.residence')
            ->first();

        $cities = Cities::join('countries', 'countries.id', 'cities.country_id')
            ->select('cities.id', 'cities.name')
            ->where('countries.id', 1)->get();

        return view('tours.chosenTour', compact('tour', 'rooms', 'services', 'cities', 'remove'));
    }

    public function findToursAction(Request $request)
    {
        $name = $request->get('hotel');
        $country = $request->get('country');
        $count_peoples = $request->get('count_peoples');
        $date = $request->get('date');
        $countries = Countries::where('id','>',1)->get();

        if(strlen($name) != 0) {
            $tours = Tours::join('hotels', 'hotels.id','tours.hotel_id')
                ->join('cities','cities.id','hotels.city_id')
                ->join('countries','countries.id','cities.country_id')
                ->where('hotels.name', 'LIKE', "%$name%")
                ->select('countries.name as country', 'cities.name as city', 'hotels.photo_link','hotels.id' ,'hotels.name as hotel', 'hotels.stars', 'tours.cost', 'tours.count_peoples')
                ->paginate(4);

            if($tours->total() == 0 || $tours == null) {
                return redirect()->back()->with('message', 'Нету отелей с таким названием!');
            }
            else {
                return view('tours.allTours', compact('tours','countries'));
            }
        }

        if($date == null && $country == 0 && $count_peoples == 0 ){
            return redirect()->back()->with('message', 'Вы ничего не выбрали!');
        }


        if($date != null && $country == 0 && $count_peoples == 0 ){

            $tours = Tours::join('hotels', 'hotels.id','tours.hotel_id')
                ->join('cities','cities.id','hotels.city_id')
                ->join('countries','countries.id','cities.country_id')
                ->where('tours.start_tour', '<', $date)
                ->where('tours.end_tour', '>', $date)
                ->select('countries.name as country', 'cities.name as city',
                    'hotels.photo_link','hotels.id' ,'hotels.name as hotel', 'hotels.stars',
                    'tours.cost', 'tours.count_peoples')->paginate(4);
        }

        if($date == null && $country > 0 && $count_peoples == 0){
            $tours = Tours::join('hotels', 'hotels.id','tours.hotel_id')
                ->join('cities','cities.id','hotels.city_id')
                ->join('countries','countries.id','cities.country_id')
                ->where('countries.id', $country)
                ->select('countries.name as country', 'cities.name as city',
                    'hotels.photo_link','hotels.id' ,'hotels.name as hotel', 'hotels.stars',
                    'tours.cost', 'tours.count_peoples')->paginate(4);
        }

        if($date != null && $country > 0 && $count_peoples == 0){
            $tours = Tours::join('hotels', 'hotels.id','tours.hotel_id')
                ->join('cities','cities.id','hotels.city_id')
                ->join('countries','countries.id','cities.country_id')
                ->where('tours.start_tour', '<', $date)
                ->where('tours.end_tour', '>', $date)
                ->where('countries.id', $country)
                ->select('countries.name as country', 'cities.name as city',
                    'hotels.photo_link','hotels.id' ,'hotels.name as hotel', 'hotels.stars',
                    'tours.cost', 'tours.count_peoples')->paginate(4);
        }

        if($date == null && $country == 0 && $count_peoples > 0){
            $tours = Tours::join('hotels', 'hotels.id','tours.hotel_id')
                ->join('cities','cities.id','hotels.city_id')
                ->join('countries','countries.id','cities.country_id')
                ->where('tours.count_peoples', $count_peoples)
                ->select('countries.name as country', 'cities.name as city',
                    'hotels.photo_link','hotels.id' ,'hotels.name as hotel', 'hotels.stars',
                    'tours.cost', 'tours.count_peoples')->paginate(4);
        }

        if($date != null && $country == 0 && $count_peoples > 0){
            $tours = Tours::join('hotels', 'hotels.id','tours.hotel_id')
                ->join('cities','cities.id','hotels.city_id')
                ->join('countries','countries.id','cities.country_id')
                ->where('tours.start_tour', '<', $date)
                ->where('tours.end_tour', '>', $date)
                ->where('tours.count_peoples', $count_peoples)
                ->select('countries.name as country', 'cities.name as city',
                    'hotels.photo_link','hotels.id' ,'hotels.name as hotel', 'hotels.stars',
                    'tours.cost', 'tours.count_peoples')->paginate(4);
        }

        if($date == null && $country > 0 && $count_peoples > 0){
            $tours = Tours::join('hotels', 'hotels.id','tours.hotel_id')
                ->join('cities','cities.id','hotels.city_id')
                ->join('countries','countries.id','cities.country_id')
                ->where('tours.count_peoples', $count_peoples)
                ->where('countries.id', $country)
                ->select('countries.name as country', 'cities.name as city',
                    'hotels.photo_link','hotels.id' ,'hotels.name as hotel', 'hotels.stars',
                    'tours.cost', 'tours.count_peoples')->paginate(4);

        }

        if($date != null && $country > 0 && $count_peoples > 0){
            $tours = Tours::join('hotels', 'hotels.id','tours.hotel_id')
                ->join('cities','cities.id','hotels.city_id')
                ->join('countries','countries.id','cities.country_id')
                ->where('tours.start_tour', '<', $date)
                ->where('tours.end_tour', '>', $date)
                ->where('tours.count_peoples', $count_peoples)
                ->where('countries.id', $country)
                ->select('countries.name as country', 'cities.name as city',
                    'hotels.photo_link','hotels.id' ,'hotels.name as hotel', 'hotels.stars',
                    'tours.cost', 'tours.count_peoples')->paginate(4);
        }
        if ($tours->total() == 0) {
            return redirect()->back()->with('message', 'Нету туров по заданным параметрам!');
        }

        return view('tours.allTours', compact('tours','countries','categories'));
    }
}
