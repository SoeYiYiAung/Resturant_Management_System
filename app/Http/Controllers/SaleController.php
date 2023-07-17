<?php

namespace App\Http\Controllers;

use App\Models\AvailableFood;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $foodIDs = AvailableFood::select('id', 'name')
                                ->where('category_id', 1)
                                ->get();

        $foodNamesWithStock = [];
        $maxResult=[];

        $maxQty = 0;
        $foodNameWithMaxQty = '';

        foreach ($foodIDs as $foodID) {
            $totalQty = DB::table('order_details')
                ->where('food_id', $foodID->id)
                ->sum('qty');

            $foodNamesWithStock[$foodID->name] = $totalQty;

            if ($totalQty > $maxQty) {
                $maxQty = $totalQty;
                $foodNameWithMaxQty = $foodID->name;
            }
        }
        
        $maxResult = [
            'food_name' => $foodNameWithMaxQty,
            'max_qty' => $maxQty,
        ];
        // dd($foodNamesWithStock);

        $drinkIDs = AvailableFood::select('id', 'name')
                                ->where('category_id', 2)
                                ->get();

        $drinkNamesWithStock = [];
        $maxResultDrink=[];

        $maxQty = 0;
        $foodNameWithMaxQty = '';

        foreach ($drinkIDs as $drinkID) {
            $totalQty = DB::table('order_details')
                ->where('food_id', $drinkID->id)
                ->sum('qty');

            $drinkNamesWithStock[$drinkID->name] = $totalQty;

            if ($totalQty > $maxQty) {
                $maxQty = $totalQty;
                $drinkNameWithMaxQty = $drinkID->name;
            }
        }
        
        $maxResultDrink = [
            'food_name' => $drinkNameWithMaxQty,
            'max_qty' => $maxQty,
        ];
        // dd($foodNamesWithStock);

        $selectedYear =  date('Y'); // Get the selected year from the request, or use the current year as default

        $data = DB::table('orders')
                    ->select(DB::raw('MONTH(date) as month'), DB::raw('SUM(total_balance) as total'))
                    ->groupBy('month')
                    ->get();

        $formattedData = $data->map(function ($item) {
            $monthName = Carbon::create()->month($item->month)->format('F');
            return [
                'month' => $monthName,
                'total' => $item->total
            ];
        });


        return view('sales.index', compact('foodNamesWithStock','maxResult','drinkNamesWithStock','maxResultDrink','formattedData','selectedYear'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('sales.report');

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
        $foodIDs = AvailableFood::select('id', 'name')
                                ->where('category_id', 1)
                                ->get();

        $foodNamesWithStock = [];
        $maxResult=[];

        $maxQty = 0;
        $foodNameWithMaxQty = '';

        foreach ($foodIDs as $foodID) {
            $totalQty = DB::table('order_details')
                ->where('food_id', $foodID->id)
                ->sum('qty');

            $foodNamesWithStock[$foodID->name] = $totalQty;

            if ($totalQty > $maxQty) {
                $maxQty = $totalQty;
                $foodNameWithMaxQty = $foodID->name;
            }
        }
        
        $maxResult = [
            'food_name' => $foodNameWithMaxQty,
            'max_qty' => $maxQty,
        ];
        // dd($foodNamesWithStock);

        $drinkIDs = AvailableFood::select('id', 'name')
                                ->where('category_id', 2)
                                ->get();

        $drinkNamesWithStock = [];
        $maxResultDrink=[];

        $maxQty = 0;
        $foodNameWithMaxQty = '';

        foreach ($drinkIDs as $drinkID) {
            $totalQty = DB::table('order_details')
                ->where('food_id', $drinkID->id)
                ->sum('qty');

            $drinkNamesWithStock[$drinkID->name] = $totalQty;

            if ($totalQty > $maxQty) {
                $maxQty = $totalQty;
                $drinkNameWithMaxQty = $drinkID->name;
            }
        }
        
        $maxResultDrink = [
            'food_name' => $drinkNameWithMaxQty,
            'max_qty' => $maxQty,
        ];
        // dd($foodNamesWithStock);

        $selectedYear = $request->input('year', date('Y'));

        $data = DB::table('orders')
                ->select(DB::raw('MONTH(date) as month'), DB::raw('SUM(total_balance) as total'))
                ->whereYear('date', $selectedYear)
                ->groupBy('month')
                ->get();

        $formattedData = $data->map(function ($item) {
            $monthName = Carbon::create()->month($item->month)->format('F');
            return [
                'month' => $monthName,
                'total' => $item->total
            ];
        });


        return view('sales.index', compact('foodNamesWithStock','maxResult','drinkNamesWithStock','maxResultDrink','formattedData','selectedYear'));

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
