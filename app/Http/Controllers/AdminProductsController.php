<?php

namespace App\Http\Controllers;

use App\Harvest;
use App\Http\Requests\ProductsRequest;
use App\Level2Category;
use App\Product;
use App\Sow;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $level2Cats = Level2Category::all();
        $types = Type::all();

        return view('admin.products.create', compact('level2Cats', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsRequest $request)
    {
        //
        $input = $request->all();
        $types = $request->types;

        $sows = $request->sows;
        $sow = Sow::firstOrCreate([
            'jan' => (in_array('jan', $sows) ? 1 : 0),
            'feb' => (in_array('feb', $sows) ? 1 : 0),
            'mar' => (in_array('mar', $sows) ? 1 : 0),
            'apr' => (in_array('apr', $sows) ? 1 : 0),
            'mai' => (in_array('mai', $sows) ? 1 : 0),
            'jun' => (in_array('jun', $sows) ? 1 : 0),
            'jul' => (in_array('jul', $sows) ? 1 : 0),
            'aug' => (in_array('aug', $sows) ? 1 : 0),
            'sep' => (in_array('sep', $sows) ? 1 : 0),
            'okt' => (in_array('okt', $sows) ? 1 : 0),
            'nov' => (in_array('nov', $sows) ? 1 : 0),
            'dec' => (in_array('dec', $sows) ? 1 : 0)
        ]);

        $harvests = $request->harvests;
        $harvest = Harvest::firstOrCreate([
            'jan' => (in_array('jan', $harvests) ? 1 : 0),
            'feb' => (in_array('feb', $harvests) ? 1 : 0),
            'mar' => (in_array('mar', $harvests) ? 1 : 0),
            'apr' => (in_array('apr', $harvests) ? 1 : 0),
            'mai' => (in_array('mai', $harvests) ? 1 : 0),
            'jun' => (in_array('jun', $harvests) ? 1 : 0),
            'jul' => (in_array('jul', $harvests) ? 1 : 0),
            'aug' => (in_array('aug', $harvests) ? 1 : 0),
            'sep' => (in_array('sep', $harvests) ? 1 : 0),
            'okt' => (in_array('okt', $harvests) ? 1 : 0),
            'nov' => (in_array('nov', $harvests) ? 1 : 0),
            'dec' => (in_array('dec', $harvests) ? 1 : 0)
        ]);

        if($file = $request->file('photo')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images/products', $name);
            $input['photo'] = $name;
        }

        $input['sow_id'] = $sow->id;
        $input['harvest_id'] = $harvest->id;
        $product = Product::create($input);
        $product->types()->sync($types);

        return redirect('admin\products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::findOrFail($id);
        $level2Cats = Level2Category::all();
        $types = Type::all();
        $product_types = $product->types;
        $types_array = [];

        foreach ($product_types as $product_type){
            array_push($types_array, $product_type->id);
        }
        return view('admin.products.edit', compact('product', 'level2Cats', 'types_array', 'types'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductsRequest $request, $id)
    {
        //
        $product = Product::findOrFail($id);
        $types = $request->types;
        $sows = $request->sows;
        $harvests = $request->harvests;
        $input = $request->all();

        $sow = Sow::firstOrCreate([
            'jan' => (in_array('jan', $sows) ? 1 : 0),
            'feb' => (in_array('feb', $sows) ? 1 : 0),
            'mar' => (in_array('mar', $sows) ? 1 : 0),
            'apr' => (in_array('apr', $sows) ? 1 : 0),
            'mai' => (in_array('mai', $sows) ? 1 : 0),
            'jun' => (in_array('jun', $sows) ? 1 : 0),
            'jul' => (in_array('jul', $sows) ? 1 : 0),
            'aug' => (in_array('aug', $sows) ? 1 : 0),
            'sep' => (in_array('sep', $sows) ? 1 : 0),
            'okt' => (in_array('okt', $sows) ? 1 : 0),
            'nov' => (in_array('nov', $sows) ? 1 : 0),
            'dec' => (in_array('dec', $sows) ? 1 : 0)
        ]);
        $input['sow_id'] = $sow->id;

        $harvest = Harvest::firstOrCreate([
            'jan' => (in_array('jan', $harvests) ? 1 : 0),
            'feb' => (in_array('feb', $harvests) ? 1 : 0),
            'mar' => (in_array('mar', $harvests) ? 1 : 0),
            'apr' => (in_array('apr', $harvests) ? 1 : 0),
            'mai' => (in_array('mai', $harvests) ? 1 : 0),
            'jun' => (in_array('jun', $harvests) ? 1 : 0),
            'jul' => (in_array('jul', $harvests) ? 1 : 0),
            'aug' => (in_array('aug', $harvests) ? 1 : 0),
            'sep' => (in_array('sep', $harvests) ? 1 : 0),
            'okt' => (in_array('okt', $harvests) ? 1 : 0),
            'nov' => (in_array('nov', $harvests) ? 1 : 0),
            'dec' => (in_array('dec', $harvests) ? 1 : 0)
        ]);
        $input['harvest_id'] = $harvest->id;

        if($file = $request->file('photo')){
            $old_photo = $product->photo;
            if($old_photo){
                $old_file = "images/products/" . $old_photo;
                if (file_exists($old_file)) {
                    @unlink($old_file);
                }
            }
            $name = time() . $file->getClientOriginalName();
            $file->move('images/products', $name);
            $input['photo'] = $name;

        }else{
            $input['photo'] = $product->photo;
        }

        $input['new'] = Arr::has($request, 'new');

        $product->types()->sync($types);
        $product->update($input);

        return redirect('admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('admin/products');
    }
}
