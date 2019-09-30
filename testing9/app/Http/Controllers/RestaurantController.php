<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Dish;
use File;
use DB;
use App\Cart;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RestaurantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if (Auth::user()->user_type == '1') {
            $user_id = Auth::user()->id;
            DB::enableQueryLog();
            $sum['total'] = DB::table('tbl_cart')
                ->join('tbl_dish', 'tbl_dish.id', '=', 'tbl_cart.dish_id')
                ->join('users', 'users.id', '=', 'tbl_cart.user_id')
                ->where('tbl_cart.restaurant_id', '=', $user_id)
                ->where('tbl_cart.is_ordered', 1)
                ->sum('tbl_dish.d_prise');

            $end = date('Y-m-d',strtotime('-90 day'));

            $sum['last12'] = DB::table('tbl_cart')
                ->join('tbl_dish', 'tbl_dish.id', '=', 'tbl_cart.dish_id')
                ->join('users', 'users.id', '=', 'tbl_cart.user_id')
                ->where('tbl_cart.restaurant_id', '=', $user_id)
                ->where('tbl_cart.is_ordered', 1)
                ->where('tbl_cart.date','>=',$end)
                ->sum('tbl_dish.d_prise');

            for($i=0; $i<=11 ; $i++){
                $start = Carbon::now()->subWeek($i)->toDateString();
                $end = Carbon::now()->subWeek($i + 1)->toDateString();

            $sumArr[$i] =  DB::table('tbl_cart')
                ->join('tbl_dish', 'tbl_dish.id', '=', 'tbl_cart.dish_id')
                ->join('users', 'users.id', '=', 'tbl_cart.user_id')
                ->where('tbl_cart.restaurant_id', '=', $user_id)
                ->where('tbl_cart.is_ordered', 1)
                ->whereBetween('tbl_cart.date',[$end,$start])
                ->sum('tbl_dish.d_prise');
            }
//
//          3  return $sum;

            return view('restaurant')->with('sum', $sum)->with('sumArr',$sumArr);
        }
        return redirect('/');
    }

    public function dishes(Request $request, Dish $dish)
    {
        if (Auth::user()->user_type == '1') {

            $user_id = Auth::user()->id;

            $dishArr = Dish::where('restaurant_id', $user_id)->paginate(10);

            return view('dishes')->with('dishArr', $dishArr);
        }
        return redirect('/');
    }

    public function dishadd(Request $request, Dish $dish)
    {
//        return $request;
        $id = $request->id;
        $dishArr['d_name'] = $request->d_name;
        $dishArr['d_prise'] = $request->d_prise;
        if ($id == null) {
            $dishArr['d_photo'] = null;
        }

        if ($request->hasFile('d_photo')) {
            if ($id != null) {
                File::delete($dish->where('id', $id)->first()->d_photo);
            }
            $deshtinationPath = 'uploads';
            $image = $request->file('d_photo');
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $image->move($deshtinationPath, $input['imagename']);
            $dbPath = $deshtinationPath . '/' . $input['imagename'];
            $dishArr['d_photo'] = $dbPath;
        }
        
        if ($id != null) {
            Dish::Where('id', $id)->update($dishArr);
            return redirect('/dishes')->with('success', 'Dish updated successfully');
        } else {
            $dishArr['restaurant_id'] = $request->restaurant_id;

            $d_name = Dish::where('d_name', $dishArr['d_name'])->where('restaurant_id', $dishArr['restaurant_id'])->first();

            if ($d_name === null) {
                Dish::create([
                    'd_name' => $dishArr['d_name'],
                    'restaurant_id' => $dishArr['restaurant_id'],
                    'd_prise' => $dishArr['d_prise'],
                    'd_photo' => $dishArr['d_photo'],
                ]);
                return redirect('/dishes')->with('success', 'Dish inserted successfully');
            } else {
                return redirect('/dishes')->with('success', 'Dish already exists');
            }
        }
    }

    public function dishupdate(Request $request, Dish $dish, $id = 0)
    {
        if (Auth::user()->user_type == '1' ) {
        $dishArr = $dish->where('id', $id)->first();

        return response()->json([
            'type' => 'success',
            'data' => $dishArr,
        ]);

        return $request;
        }
        return redirect('/');
    }

    public function dishdel(Request $request, Dish $dish)
    {
        $id = $request->id;

        $photo = $dish->where('id', $id)->first()->d_photo;

        if ($photo != null) {
            File::delete($photo);
        }

        Dish::where('id', $id)->delete();

        return redirect('/dishes')->with('success', 'Dish deleted successfully');
    }

    public function orders()
    {
        if (Auth::user()->user_type == '1') {
            $user_id = Auth::user()->id;
            $orderArr =
                DB::table('tbl_cart')
                    ->select('users.name', 'users.address', 'tbl_dish.d_name', 'tbl_dish.d_prise', 'tbl_cart.date')
                    ->join('tbl_dish', 'tbl_dish.id', '=', 'tbl_cart.dish_id')
                    ->join('users', 'users.id', '=', 'tbl_cart.user_id')
                    ->where('tbl_cart.restaurant_id', '=', $user_id)
                    ->where('is_ordered', 1)
                    ->get();

            return view('orders')->with('orderArr', $orderArr);
        }
        return redirect('/');
    }

}
