<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Contracts\View\View;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('dashboard', compact('restaurants'));
    }

    public function create()
    {
        return view('auth.registerRestaurant');
    }

    public function store(Request $request)
    {
        // $restaurant = Restaurant::create([
        //     'name_res' => $request->name_res,
        //     'address_res' => $request->address_res,
        //     'img_res' => $request->img_res,
        // ]);

        $newRestaurant = new Restaurant();
        $newRestaurant->fill($request->all());
        $newRestaurant->user_id = Auth::id();
        $newRestaurant->save();

        return redirect('RouteServiceProvider::HOME,');
    }

}
