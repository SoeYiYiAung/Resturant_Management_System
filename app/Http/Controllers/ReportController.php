<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $selectedYear = date('Y');
        // $selectedMonth = date('M');
        $selectedMonth = date('n');

        $orders = Order::whereYear('date', $selectedYear)
             ->whereMonth('date', $selectedMonth)
             ->get();
             
        $total=0;
        foreach($orders as $order)
        {
            $total+=$order->bill;
        }

        return view('reports.index', compact('orders','total','selectedYear','selectedMonth'));

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

        $selectedYear = $request->year;
        $selectedMonth = $request->month;

        $orders = Order::whereYear('date', $selectedYear)
             ->whereMonth('date', $selectedMonth)
             ->get();

        $total=0;
        foreach($orders as $order)
        {
            $total+=$order->bill;
        }

        return view('reports.index', compact('orders','total','selectedYear','selectedMonth'));
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
        $order_id = $id;
        $order_details = DB::table('order_details')
                    ->join('available_food', 'order_details.food_id', '=', 'available_food.id')
                    ->where('order_details.order_id', $order_id)
                    ->select('order_details.*', 'available_food.name')
                    ->get();

        return view('reports.show', compact('order_details'));
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
    public function destroy($id)
    {
        //
    }
}
