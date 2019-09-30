<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use Carbon\Carbon;
use DB;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addcart(Cart $cart, $u_id, $r_id, $item_id)
    {
        if (Auth::user()->user_type == '2') {
            $user_id = $u_id;
            $restaurant_id = $r_id;
            $item_id = $item_id;
            $today = Carbon::today()->toDateString();

            $last_order = Cart::select('restaurant_id')->where('user_id', $user_id)->where('is_ordered', 0)->orderBy('id', 'desc')->first();
            if ($last_order == null) {
                $last_order['restaurant_id'] = $restaurant_id;
            }

            if ($last_order['restaurant_id'] == $restaurant_id) {
                // adding order if restaurant is same.
                Cart::create([
                    'user_id' => $user_id,
                    'restaurant_id' => $restaurant_id,
                    'dish_id' => $item_id,
                    'is_ordered' => 0,
                    'date' => $today,
                ]);
            } else {
                // delete order if restaurant is not same.
                Cart::where('user_id', $user_id)->where('is_ordered', 0)->delete();
                // adding new order
                Cart::create([
                    'user_id' => $user_id,
                    'restaurant_id' => $restaurant_id,
                    'dish_id' => $item_id,
                    'is_ordered' => 0,
                    'date' => $today,
                ]);
            }

            return redirect('select_order/' . $restaurant_id);
        }
        return redirect('/');
    }

    public function getordered(Cart $cart, $id)
    {
        if (Auth::user()->user_type == '2') {
            // moving dishes cart to ordered..
            $cartArr['is_ordered'] = 1;
            Cart::where('user_id', $id)->update($cartArr);

            return redirect('/');
        }
        return redirect('/');
    }

    public function remove(cart $cart, $id)
    {
        if (Auth::user()->user_type == '2') {
            // remove dish from cart..
            Cart::where('id', $id)->delete();
        }

        return redirect('/');
    }
}
