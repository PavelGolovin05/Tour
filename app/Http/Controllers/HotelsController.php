<?php

namespace App\Http\Controllers;

use App\Cities;
use App\Countries;
use App\HotelPhotos;
use App\HotelRooms;
use App\Hotels;
use App\HotelServices;
use App\Tours;
use App\TypesFood;
;
use Illuminate\Http\Request;

class HotelsController extends Controller
{
    public function allHotelsAction()
    {
        $countries = Countries::where('id','>',1)->get();
        $foods = TypesFood::all();
        $hotels = Hotels::join('cities','cities.id','hotels.city_id')
            ->join('countries','countries.id','cities.country_id')
            ->select('countries.name as country', 'cities.name as city',
                'hotels.photo_link','hotels.id' ,'hotels.name as hotel', 'hotels.stars')
            ->paginate(4);
        return view('hotels.allHotels', compact('countries', 'hotels', 'foods'));
    }

    public function chosenHotelAction($id)
    {
        $hotel = Hotels::join('cities','cities.id','hotels.city_id')
            ->join('countries','countries.id','cities.country_id')
            ->join('types_food','types_food.id','hotels.type_food_id')
            ->where('hotels.id', $id)
            ->select('countries.name as country', 'cities.name as city', 'types_food.name as food',
                'hotels.photo_link','hotels.id' ,'hotels.name as hotel', 'hotels.description', 'hotels.stars')
            ->first();

        $rooms = HotelRooms::join('types_room','types_room.id','hotel_rooms.type_rooms_id')
            ->join('hotels','hotels.id', 'hotel_rooms.hotel_id')
            ->select('types_room.name','hotel_rooms.count')
            ->where('hotels.id', $id)->get();

        $services = HotelServices::join('types_service','types_service.id','hotel_services.type_service_id')
            ->join('hotels','hotels.id', 'hotel_services.hotel_id')
            ->select('types_service.name')
            ->where('hotels.id', $id)->get();

        $cities = Cities::join('countries', 'countries.id', 'cities.country_id')
            ->select('cities.id', 'cities.name')
            ->where('countries.id', 1)->get();

        $photos = HotelPhotos::where('hotel_id', $id)
            ->select('photo_link')->get();

        return view('hotels.chosenHotel', compact('hotel', 'rooms', 'services', 'photos'));
    }

    public function findHotelsAction(Request $request)
    {
        $countries = Countries::where('id','>',1)->get();
        $foods = TypesFood::all();

        $name = $request->get('hotel');
        $country = $request->get('country');
        $stars = $request->get('stars');
        $food = $request->get('food');


        if(strlen($name) != 0) {
            $hotels = Hotels::join('cities','cities.id','hotels.city_id')
                ->join('countries','countries.id','cities.country_id')
                ->where('hotels.name', 'like', "%$name%")
                ->select('countries.name as country', 'cities.name as city',
                    'hotels.photo_link','hotels.id' ,'hotels.name as hotel', 'hotels.stars')
                ->paginate(4);
            if($hotels == null || $hotels->total() == 0) {
                return redirect()->back()->with('message', 'Нету отелей с таким названием!');
            }
            else {
                return view('hotels.allHotels', compact('countries', 'hotels', 'foods'));
            }
        }

        if($stars == 0 && $country == 0 && $food == 0 ){
            return redirect()->back()->with('message', 'Вы ничего не выбрали!');
        }


        if($stars > 0 && $country == 0 && $food == 0 ){
            $hotels = Hotels::join('cities','cities.id','hotels.city_id')
                ->join('countries','countries.id','cities.country_id')
                ->where('hotels.stars', $stars)
                ->select('countries.name as country', 'cities.name as city',
                    'hotels.photo_link','hotels.id' ,'hotels.name as hotel', 'hotels.stars')
                ->paginate(4);
        }

        if($stars == 0 && $country > 0 && $food == 0){
            $hotels = Hotels::join('cities','cities.id','hotels.city_id')
                ->join('countries','countries.id','cities.country_id')
                ->where('countries.id', $country)
                ->select('countries.name as country', 'cities.name as city',
                    'hotels.photo_link','hotels.id' ,'hotels.name as hotel', 'hotels.stars')
                ->paginate(4);
        }

        if($stars > 0 && $country > 0 && $food == 0){
            $hotels = Hotels::join('cities','cities.id','hotels.city_id')
                ->join('countries','countries.id','cities.country_id')
                ->where('hotels.stars', $stars)
                ->where('countries.id', $country)
                ->select('countries.name as country', 'cities.name as city',
                    'hotels.photo_link','hotels.id' ,'hotels.name as hotel', 'hotels.stars')
                ->paginate(4);
        }

        if($stars == 0 && $country == 0 && $food > 0){
            $hotels = Hotels::join('cities','cities.id','hotels.city_id')
                ->join('countries','countries.id','cities.country_id')
                ->where('hotels.type_food_id', $food)
                ->select('countries.name as country', 'cities.name as city',
                    'hotels.photo_link','hotels.id' ,'hotels.name as hotel', 'hotels.stars')
                ->paginate(4);
        }

        if($stars > 0 && $country == 0 && $food > 0){
            $hotels = Hotels::join('cities','cities.id','hotels.city_id')
                ->join('countries','countries.id','cities.country_id')
                ->where('hotels.stars', $stars)
                ->where('hotels.type_food_id', $food)
                ->select('countries.name as country', 'cities.name as city',
                    'hotels.photo_link','hotels.id' ,'hotels.name as hotel', 'hotels.stars')
                ->paginate(4);
        }

        if($stars == 0 && $country > 0 && $food > 0){
            $hotels = Hotels::join('cities','cities.id','hotels.city_id')
                ->join('countries','countries.id','cities.country_id')
                ->where('countries.id', $country)
                ->where('hotels.type_food_id', $food)
                ->select('countries.name as country', 'cities.name as city',
                    'hotels.photo_link','hotels.id' ,'hotels.name as hotel', 'hotels.stars')
                ->paginate(4);

        }

        if($stars > 0 && $country > 0 && $food > 0){
            $hotels = Hotels::join('cities','cities.id','hotels.city_id')
                ->join('countries','countries.id','cities.country_id')
                ->where('countries.id', $country)
                ->where('hotels.stars', $stars)
                ->where('hotels.type_food_id', $food)
                ->select('countries.name as country', 'cities.name as city',
                    'hotels.photo_link','hotels.id' ,'hotels.name as hotel', 'hotels.stars')
                ->paginate(4);
        }

        if ($hotels == null) {
            return redirect()->back()->with('message', 'Нету отелей по заданным параметрам!');
        }

        return view('hotels.allHotels', compact('countries', 'hotels', 'foods'));
    }
}
