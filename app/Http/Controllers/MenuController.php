<?php

namespace App\Http\Controllers;

use App\Country;
use App\Level1Category;
use App\Level2Category;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //
    public function menu_level1(){
        $level1Cats = Level1Category::all();

        return view('includes.menu', compact('level1Cats'));
    }

    public function showProducts(Request $request, $id){

        $items_page = ($request['pageSelect'] ? $request['pageSelect'] : 8);

        $products = Product::where('level2_category_id', $id)->paginate($items_page);
        $level2Cat = Level2Category::findOrFail($id);

        return view('category', compact('products', 'level2Cat'));
    }

    public function product($id){
        $product = Product::findOrFail($id);
        $related_products = Product::where('level2_category_id', '=', $product->level2_category_id)->whereNotIn('id', [$product->id])->get()->toArray();

        return view('product', compact('product', 'related_products'));
    }

    public function cart(){
        return view('cart');
    }

    public function cart_add(Request $request, $id){

        $product = Product::findOrFail($id);

        if($request['type'] == 'zakje 50 zaadjes' || $request['type'] == 'zak 1 kg'){
            $price = number_format(($product->price * 2) - (($product->price * 2) *25 / 100), 2);
        }else{
            $price = $product->price;
        }
        Cart::add($product->id, $product->name, $request['pieces'], $price, 0, ['type' => $request['type'], 'photo' => $product->photo]);
//        dd(Cart::content());

        return view('cart');
    }

    public function cart_update(Request $request, $id){

        Cart::update($id, ['qty' => $request['add_pieces']]);
        return view('cart');
    }

    public function cart_delete($id){

        Cart::remove($id);
        return view('cart');
    }

    public function shipmentCost(Request $request){

        $ship_cost = Country::where('id', $request['country'])->first();

        return view('cart', compact('ship_cost'));

    }
}
