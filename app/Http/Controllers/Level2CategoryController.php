<?php

namespace App\Http\Controllers;

use App\Level1Category;
use App\Level2Category;
use Illuminate\Http\Request;

class Level2CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $level2Cats = Level2Category::all();
        $editCat = Level2Category::first();
        $level1Cats = Level1Category::all();
        return view('admin.level2categories.index', compact('level2Cats', 'editCat', 'level1Cats'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Level2Category  $level2Category
     * @return \Illuminate\Http\Response
     */
    public function show(Level2Category $level2Category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Level2Category  $level2Category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $level2Cats = Level2Category::all();
        $editCat = Level2Category::findOrFail($id);
        $level1Cats = Level1Category::all();
        return view('admin.level2categories.index', compact('level2Cats', 'editCat', 'level1Cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Level2Category  $level2Category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $level2 = Level2Category::findOrFail($id);
        $input = $request->all();
        $level2->update($input);

        return redirect('admin\level2categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Level2Category  $level2Category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
