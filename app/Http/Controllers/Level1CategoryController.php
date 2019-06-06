<?php

namespace App\Http\Controllers;

use App\Level1Category;
use Illuminate\Http\Request;

class Level1CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $level1Cats = Level1Category::all();
        $editCat = Level1Category::first();
        return view('admin.level1categories.index', compact('level1Cats', 'editCat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        Level1Category::create($input);
        return redirect('admin\level1categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Level1Category  $level1Category
     * @return \Illuminate\Http\Response
     */
    public function show(Level1Category $level1Category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Level1Category  $level1Category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $level1Cats = Level1Category::all();
        $editCat = Level1Category::findOrFail($id);
        return view('admin.level1categories.index', compact('editCat', 'level1Cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Level1Category  $level1Category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $level1 = Level1Category::findOrFail($id);
        $input = $request->all();
        $level1->update($input);

        return redirect('admin\level1categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Level1Category  $level1Category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $level1 = Level1Category::findOrFail($id);
        $level1->delete();

        return redirect('admin\level1categories');
    }
}
