<?php

namespace App\Http\Controllers;

use App\Models\AvailableFood;
use App\Models\Temp;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $foods = AvailableFood::all();
        $temp_foods = Temp::all();

        // return view('orders.index', ['foods' => $foods]);
        return view('orders.index', ['temp_foods' => $temp_foods,'foods' => $foods]);

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
        // dd($request);
        $food_id = $request->food_id;
        $food = AvailableFood::where('id', $food_id)->first();
        $qty = $request->qty;
        // dd( $food->price * $qty);
        Temp::create([
            'name' => $food->name,
            'qty' => $qty,
            'unit_price' => $food->price,
            'subtotal' => $food->price * $qty
        ]);

        $temp_foods = Temp::all();
        $foods = AvailableFood::all();

        return view('orders.index', ['temp_foods' => $temp_foods,'foods' => $foods]);
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
        // dd("hi");
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Temp $temp)
    {
        //
        $temp->delete();
        $temp_foods = Temp::all();
        $foods = AvailableFood::all();

        return view('orders.index', ['temp_foods' => $temp_foods,'foods' => $foods]);
    }

}
