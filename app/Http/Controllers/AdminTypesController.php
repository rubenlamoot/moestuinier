<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypesRequest;
use App\Type;
use Illuminate\Http\Request;

class AdminTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $types = Type::all();
        $editType = Type::first();
        return view('admin.types.index', compact('types', 'editType'));
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
    public function store(TypesRequest $request)
    {
        //
        $input = $request->all();
        Type::create($input);
        return redirect('admin\types');
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
        $types = Type::all();
        $editType = Type::findOrFail($id);
        return view('admin.types.index', compact('types', 'editType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypesRequest $request, $id)
    {
        //
        $type = Type::findOrFail($id);
        $input = $request->all();
        $type->update($input);

        return redirect('admin\types');
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
        $type = Type::findOrFail($id);
        $type->delete();

        return redirect('admin\types');
    }
}
