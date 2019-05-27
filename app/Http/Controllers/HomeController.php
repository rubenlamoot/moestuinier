<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        if(Auth::check()){
//            if(Auth::user()->isAdmin()){
//                return view('admin.index');
//            }else{
//                if(Auth::user()->isActive()){
//                    return view('/index');
//                }
//            }
//        }
//        return view('/index');

        if(Auth::check()){
            if(Auth::user()->isAdmin()){
                return view('admin.index');
            }
            if(Auth::user()->isActive()){
                return view('/index');
            }

        }
        return view('/index');
    }
}
