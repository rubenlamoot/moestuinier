<?php

namespace App\Http\Controllers;

use App\Level1Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //
    public function menu_level1(){
        $level1Cats = Level1Category::all();

        return view('includes.menu', compact('level1Cats'));
    }
}
