<?php

namespace App\Http\Controllers;

use App\Level2Category;
use App\Level3Category;
use Illuminate\Http\Request;

class Level3CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $level3Cats = Level3Category::all();
        $editCat = Level3Category::first();
        $level2Cats = Level2Category::all();
        return view('admin.level3categories.index', compact('level3Cats', 'editCat', 'level2Cats'));
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
        Level3Category::create($input);
        return redirect('admin\level3categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Level3Category  $level3Category
     * @return \Illuminate\Http\Response
     */
    public function show(Level3Category $level3Category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Level3Category  $level3Category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $level3Cats = Level3Category::all();
        $editCat = Level3Category::findOrFail($id);
        $level2Cats = Level2Category::all();
        return view('admin.level3categories.index', compact('level3Cats', 'editCat', 'level2Cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Level3Category  $level3Category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $level3 = Level3Category::findOrFail($id);
        $input = $request->all();
        $level3->update($input);

        return redirect('admin\level3categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Level3Category  $level3Category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
