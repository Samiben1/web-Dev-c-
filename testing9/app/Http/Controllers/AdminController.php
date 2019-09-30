<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request, User $user)
    {

        if (Auth::user()->user_type == '0') {

            $restaurantArr = User::where('user_type', 1)->whereNull('is_approve')->get();

            return view('admin')->with('restaurantArr', $restaurantArr);
        }

        return redirect('/');
    }

    public function approve(Request $request, User $user, $id)
    {
        if (Auth::user()->user_type == '0') {
            DB::table('users')->where('id', $id)->update(['is_approve' => 1]);

            return redirect('/admin')->with('success', 'Restaurant approved successfully');
        }
        return redirect('/');
    }
}
