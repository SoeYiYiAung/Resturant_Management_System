<?php

namespace App\Http\Controllers;

use App\Models\AvailableFood;
use App\Models\Temp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    //
    public function allDelete()
    {
        // dd("hi");
        $order_foods=Temp::all();
        foreach ($order_foods as $order_food) {
            $name = $order_food->name;
            $count = $order_food->qty;
        
            $total_count = DB::table('available_food')
                ->where('name', $name)
                ->pluck('stock')
                ->first();
        
            $update_count = $total_count - $count;
        
            DB::table('available_food')
                ->where('name', $name)
                ->update(['stock' => $update_count]);
        }   

        
        Temp::truncate();

        $temp_foods = Temp::all();
        $foods = AvailableFood::all();
        return view('orders.index', ['temp_foods' => $temp_foods,'foods' => $foods]);

    }
}
