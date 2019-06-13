<?php

namespace App\Http\Controllers;

use App\Level1Category;
use App\Level2Category;
use App\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //
    public function menu_level1(){
        $level1Cats = Level1Category::all();

        return view('includes.menu', compact('level1Cats'));
    }

    public function showProducts($id, $items_page){

        $products = Product::where('level2_category_id', $id)->paginate($items_page);
        $level2Cat = Level2Category::findOrFail($id);

        return view('category', compact('products', 'level2Cat'));
    }

    public function product($id){
        $product = Product::findOrFail($id);

        return view('product', compact('product'));
    }
}
