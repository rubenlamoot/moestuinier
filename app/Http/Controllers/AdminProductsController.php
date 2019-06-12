<?php

namespace App\Http\Controllers;

use App\Harvest;
use App\Level2Category;
use App\Product;
use App\Sow;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

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
        $products = Product::paginate(15);

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
    public function store(Request $request)
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
//        $sow['jan'] = (in_array('jan', $sows) ? 1 : 0);
//        $sow['feb'] = (in_array('feb', $sows) ? 1 : 0);
//        $sow['mar'] = (in_array('mar', $sows) ? 1 : 0);
//        $sow['apr'] = (in_array('apr', $sows) ? 1 : 0);
//        $sow['mai'] = (in_array('mai', $sows) ? 1 : 0);
//        $sow['jun'] = (in_array('jun', $sows) ? 1 : 0);
//        $sow['jul'] = (in_array('jul', $sows) ? 1 : 0);
//        $sow['aug'] = (in_array('aug', $sows) ? 1 : 0);
//        $sow['sep'] = (in_array('sep', $sows) ? 1 : 0);
//        $sow['okt'] = (in_array('okt', $sows) ? 1 : 0);
//        $sow['nov'] = (in_array('nov', $sows) ? 1 : 0);
//        $sow['dec'] = (in_array('dec', $sows) ? 1 : 0);

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
//        $harvest['jan'] = (in_array('jan', $harvests) ? 1 : 0);
//        $harvest['feb'] = (in_array('feb', $harvests) ? 1 : 0);
//        $harvest['mar'] = (in_array('mar', $harvests) ? 1 : 0);
//        $harvest['apr'] = (in_array('apr', $harvests) ? 1 : 0);
//        $harvest['mai'] = (in_array('mai', $harvests) ? 1 : 0);
//        $harvest['jun'] = (in_array('jun', $harvests) ? 1 : 0);
//        $harvest['jul'] = (in_array('jul', $harvests) ? 1 : 0);
//        $harvest['aug'] = (in_array('aug', $harvests) ? 1 : 0);
//        $harvest['sep'] = (in_array('sep', $harvests) ? 1 : 0);
//        $harvest['okt'] = (in_array('okt', $harvests) ? 1 : 0);
//        $harvest['nov'] = (in_array('nov', $harvests) ? 1 : 0);
//        $harvest['dec'] = (in_array('dec', $harvests) ? 1 : 0);

        if($file = $request->file('photo')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images/products', $name);
            $input['photo'] = $name;
        }

        $input['sow_id'] = $sow->id;
        $input['harvest_id'] = $harvest->id;
        $product = Product::create($input);
        $product->types()->sync($types);

        /*DB::table('sows')
            ->insert(['product_id' => $product->id,
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
                    'dec' => (in_array('dec', $sows) ? 1 : 0)]
            );

        DB::table('harvests')
            ->insert(['product_id' => $product->id,
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
                    'dec' => (in_array('dec', $harvests) ? 1 : 0)]
            );*/

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
        $sow = DB::table('sows')->where('product_id', '=', $product->id)->first();
        $harvest = DB::table('harvests')->where('product_id', '=', $product->id)->first();
        $types = Type::all();
        $product_types = $product->types;
        $types_array = [];

        foreach ($product_types as $product_type){
            array_push($types_array, $product_type->id);
        }
        return view('admin.products.edit', compact('product', 'level2Cats', 'types_array', 'types', 'sow', 'harvest'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $product = Product::findOrFail($id);
        $types = $request->types;
        $sows = $request->sows;
        $harvests = $request->harvests;
        $input = $request->all();

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

        $new = Arr::has($request, 'new');
        $input['new'] = $new;

        $product->types()->sync($types);
        $product->update($input);

        DB::table('sows')->where('product_id', '=', $product->id)
        ->update(['jan' => (in_array('jan', $sows) ? 1 : 0),
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
            'dec' => (in_array('dec', $sows) ? 1 : 0)]
        );

        DB::table('harvests')->where('product_id', '=', $product->id)
            ->update(['jan' => (in_array('jan', $harvests) ? 1 : 0),
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
                'dec' => (in_array('dec', $harvests) ? 1 : 0)]
        );

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

    }
}
