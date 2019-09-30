<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Dish;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request, User $user)
    {
        $restaurantArr = User::select('users.*', DB::raw('(select d_photo from tbl_dish where restaurant_id  =  users.id order by id asc limit 1) as photo'))
            ->where('users.is_approve', 1)
            ->get();

        $cartArr = null;
        $cartArrsum = null;
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $cartArr = DB::table('tbl_cart')
                ->select('tbl_cart.*','tbl_dish.*','tbl_cart.id as cart_id')
                ->join('tbl_dish','tbl_dish.id','=','tbl_cart.dish_id')
                ->where('tbl_cart.user_id',$user_id)
                ->where('tbl_cart.is_ordered',0)
                ->get();
            $cartArrsum = DB::table('tbl_cart')
                ->select('tbl_cart.*','tbl_dish.*','tbl_cart.id as cart_id')
                ->join('tbl_dish','tbl_dish.id','=','tbl_cart.dish_id')
                ->where('tbl_cart.user_id',$user_id)
                ->where('tbl_cart.is_ordered',0)
                ->sum('tbl_dish.d_prise');
        }

        return view('food_home')->with('restaurant', $restaurantArr)->with('cartArr',$cartArr)->with('cartArrsum',$cartArrsum);
    }

    public function selectorder(Request $request, $id, Dish $dish, User $user)
    {
        $dishArr = Dish::where('restaurant_id',$id)->simplePaginate(5);

        $restaurantArr = User::select('id','name','address')->where('id',$id)->where('is_approve',1)->first();

        $cartArr = null;
        $cartArrsum = null;
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $cartArr = DB::table('tbl_cart')
                ->select('tbl_cart.*','tbl_dish.*','tbl_cart.id as cart_id')
                ->join('tbl_dish','tbl_dish.id','=','tbl_cart.dish_id')
                ->where('tbl_cart.user_id',$user_id)
                ->where('tbl_cart.is_ordered',0)
                ->get();

            $cartArrsum = DB::table('tbl_cart')
                ->select('tbl_cart.*','tbl_dish.*','tbl_cart.id as cart_id')
                ->join('tbl_dish','tbl_dish.id','=','tbl_cart.dish_id')
                ->where('tbl_cart.user_id',$user_id)
                ->where('tbl_cart.is_ordered',0)
                ->sum('tbl_dish.d_prise');
        }

        return view('menu')->with('dishArr',$dishArr)->with('restaurantArr',$restaurantArr)->with('cartArr',$cartArr)->with('cartArrsum',$cartArrsum);
    }
}
