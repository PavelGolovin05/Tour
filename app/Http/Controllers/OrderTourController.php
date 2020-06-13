<?php

namespace App\Http\Controllers;

use App\OrderTour;
use App\Tours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderTourController extends Controller
{
    public function showMyOrdersAction()
    {
        $user_id = Auth::user()->id;

        $tours = Tours::join('hotels', 'hotels.id','tours.hotel_id')
            ->join('cities','cities.id','hotels.city_id')
            ->join('countries','countries.id','cities.country_id')
            ->join('order_tour', 'order_tour.tour_id', 'tours.id')
            ->where('order_tour.user_id', $user_id)
            ->select('countries.name as country', 'cities.name as city', 'hotels.photo_link','hotels.id' ,'hotels.name as hotel', 'hotels.stars', 'tours.cost', 'tours.count_peoples')
            ->paginate(4);

        return view('myOrders', compact('tours'));
    }

    public function addOrderTourAction(Request $request)
    {
        $city = $request->get('city');
        $tour = $request->get('tour');
        $user_id = Auth::user()->id;

        $checkExists = OrderTour::where('user_id', $user_id)
            ->where('tour_id', $tour)
            ->first();

        if ($checkExists != null) {
            return redirect()->back()->with('message', 'Этот тур уже заказан!');
        } else {
            $order = new OrderTour([
                'user_id' => $user_id,
                'tour_id' => $tour,
                'city_departure' => $city,
            ]);

            $order->save();

            return redirect()->back()->with('message', 'Тур успешно заказан!');
        }
    }

    public function removeOrderTourAction(Request $request)
    {
        $tour = $request->get('tour');
        $user_id = Auth::user()->id;



        $order = OrderTour::where('tour_id', $tour)
            ->where('user_id', $user_id)->first();
        
        $order->delete();

        return redirect()->back()->with('message', 'Тур успешно удален!');
    }
}
