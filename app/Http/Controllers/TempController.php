<?php

namespace App\Http\Controllers;

use App\Models\AvailableFood;
use App\Models\Temp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TempController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $temp_foods = Temp::all();
        $total=0;
        $total_qty=0;
        foreach($temp_foods as $tempfood)
        {
            $total+=$tempfood->subtotal;
            $total_qty+=$tempfood->qty;
        }

        $currentDate = date('Y-m-d');

       $promotion_data = DB::table('promotions')
                        ->whereDate('start_date', '<=', $currentDate)
                        ->whereDate('end_date', '>=', $currentDate)
                        ->first();

        // dd($promotion_data);
        if($promotion_data==null)
        {
            $promotion=0;
        }
        else
        {
            $promotion=$promotion_data->percent;
        }
        $currentDate = Carbon::now();

        $calc_promotion=$total*($promotion/100);

        $bill=$total-$calc_promotion;

        $table_id=1;
        $order_id = DB::table('orders')->insertGetId([
            'total_qty' => $total_qty,
            'total_balance' => $total,
            'promotion' => $calc_promotion,
            'bill' => $bill,
            'date' => $currentDate
        ]);

        // dd($order_id);
        foreach($temp_foods as $tempfood)
        {
            $food_id = DB::table('available_food')
                            ->where('name', $tempfood->name)
                            ->value('id');
            $qty=$tempfood->qty;
            $unit_price=$tempfood->unit_price;

            DB::table('order_details')->insert([
                'order_id' => $order_id,
                'food_id' => $food_id,
                'qty' => $qty,
                'unit_price' => $unit_price
            ]);
        }


        return view('temp.index', ['temp_foods' => $temp_foods,'total'=>$total,'promotion'=>$calc_promotion]);
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
