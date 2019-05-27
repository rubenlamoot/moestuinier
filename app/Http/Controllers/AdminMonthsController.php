<?php

namespace App\Http\Controllers;

use App\Month;
use Illuminate\Http\Request;

class AdminMonthsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $months = Month::all();
        return view('admin.months.index', compact('months'));

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
        $month = Month::findOrFail($id);
        return view('admin.months.edit', compact('month'));
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
        $month = Month::findOrFail($id);
        $input = $request->all();

        if($file = $request->file('month_pic')){
            $old_photo = $month->month_pic;
            if($old_photo){
                $old_file = asset($old_photo);
                if (file_exists($old_file)) {
                    @unlink($old_file);
                }
                $name = time() . $file->getClientOriginalName();
                $file->move('images/home', $name);

            }else{
                $name = time() . $file->getClientOriginalName();
                $file->move('images/home', $name);
            }
        }
        $month->update($input);

        return redirect('admin/months');
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
    }

    public function home(){
        $months = Month::all();
        return response()->JSON(['results' => $months]);
    }
}
