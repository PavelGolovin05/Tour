<?php

namespace App\Http\Controllers;

use App\Cities;
use App\Countries;
use App\HotelPhotos;
use App\Hotels;
use App\Tours;
use App\TypesFood;
use App\TypeTransfers;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function indexAction()
    {
        $hotels = Hotels::all();

        $countries = Countries::where('id', '>', 1)->get();

        return view('admin.index', compact('hotels', 'countries'));
    }

    public function toursAction(Request $request)
    {
        $country = Countries::where('id', $request->get('country'))->first();
        $hotels = Hotels::join('cities', 'cities.id', 'hotels.city_id')
            ->where('cities.country_id', $country->id)->select('hotels.id', 'hotels.name')->get();
        $transfers = TypeTransfers::all();
        return view('admin.tours', compact('hotels', 'transfers'));
    }

    public function addTourAction(Request $request)
    {
        $tour = new Tours([
            'hotel_id' => $request->get('hotel'),
            'count_peoples' => $request->get('count_peoples'),
            'cost' => $request->get('cost'),
            'start_tour' => $request->get('start_tour'),
            'end_tour' => $request->get('end_tour'),
            'visa' => $request->get('visa'),
            'insurance' => $request->get('insurance'),
            'hotel_delivery' => $request->get('hotel_delivery'),
            'food' => $request->get('food'),
            'residence' => $request->get('food'),
            'type_transfer_id' => $request->get('transfer'),
        ]);

        $tour->save();

        return redirect()->back()->with('message', 'Тур добавлен!');
    }

    public function hotelsAction(Request $request)
    {
        $foods = TypesFood::all();
        $country = Countries::where('id', $request->get('country'))->first();
        $cities = Cities::where('country_id', $request->get('country'))->get();

        return view('admin.hotels', compact( 'foods', 'cities', 'country'));
    }

    public function addHotelAction(Request $request)
    {
        $hotel = new Hotels([
            'city_id' => $request->get('city'),
            'type_food_id' => $request->get('food'),
            'description' => $request->get('description'),
            'photo_link' => $request->get('photo_link'),
            'stars' => $request->get('stars'),
            'name' => $request->get('name'),
        ]);

        $hotel->save();

        return redirect()->back()->with('message', 'Отель добавлен!');
    }
    public function hotelPhotosAction(Request $request)
    {
        $hotel = Hotels::where('id', $request->get('hotel'))->first();

        return view('admin.photos', compact('hotel'));
    }

    public function addPhotoAction(Request $request)
    {
        $photo = new HotelPhotos([
            'hotel_id' => $request->get('hotel'),
            'photo_link' => $request->get('photo_link'),
        ]);

        $photo->save();

        return redirect()->back()->with('message', 'Фото добавлено!');
    }
}
