<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();

        return response()->json([
            "success" => true,
            "results" => $categories,
        ]);
    }

    // public function filter(Request $request){
    //     $filtered = DB::table('restaurants')
    //                     ->select('restaurants.*')
    //                     ->join('category_restaurant', 'restaurants.id', '=', 'category_restaurant.restaurant_id')
    //                     ->whereIn('category_restaurant.category_id', $request->queryId)
    //                     ->distinct()
    //                     ->get();

    //     return response()->json([
    //         "success" => true,
    //         "results" => $filtered,
    //     ]);
    // }

    public function filter(Request $request) {
        $filtered = Restaurant::with('categories')
                              ->whereHas('categories', function($query) use ($request) {
                                  $query->whereIn('categories.id', $request->queryId);
                              })
                              ->distinct()
                              ->get();
    
        return response()->json([
            "success" => true,
            "results" => $filtered,
        ]);
    }

    public function menu($id) {

        $plates = Restaurant::with('plates')
                            ->whereHas('plates', function($query) use ($id) {
                                $query->where('plates.restaurant_id', $id);
                            })
                            ->get();

        return response()->json([
            "success" => true,
            "results" => "$plates",
        ]);
    }
}