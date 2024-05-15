<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRestaurantRequest;
use App\Models\Restaurant;
use Illuminate\Contracts\View\View;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    // this sends to the dashboard where a restaurant owner can review their information,
    // access the menu, and see their stats
    public function index()
    {
        // takes from db only restaurants with user_id matching current logged in user
        // first() returns only the first element of the collection
        // this would have to be changed to get() to manage multiple items
        $restaurant = Restaurant::where('user_id', Auth::id())->first();
        return view('dashboard', compact('restaurant'));
    }

    // form to insert restaurant information
    public function create()
    {
        // if the user already has a restaurant in the db, then they are redirected to their dashboard
        if(Restaurant::all()->contains('user_id', Auth::id())){
            return redirect()->action([RestaurantController::class, 'index']);
        }else{
            return view('auth/registerRestaurant');
        }
    }

    public function store(StoreRestaurantRequest $request)
    {
        // $restaurant = Restaurant::create([
        //     'name_res' => $request->name_res,
        //     'address_res' => $request->address_res,
        //     'img_res' => $request->img_res,
        // ]);

        $request->validated();

        $newRestaurant = new Restaurant();
        $newRestaurant->fill($request->all());
        $newRestaurant->user_id = Auth::id();
        $img_path = Storage::disk('public')->put('restaurant_images', $request->img_res);
        $newRestaurant->img_res = $img_path;
        $newRestaurant->save();

        return redirect('dashboard');
    }

}
