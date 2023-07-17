<?php

namespace App\Http\Controllers;

use App\Models\AvailableFood;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

class AvailableFoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $foods = AvailableFood::where("category_id",1)->get();
        // dd($foods);
        $drinks = AvailableFood::where("category_id",2)->get();

        return view('available_food.index', ['foods' => $foods,'drinks'=>$drinks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories=Category::all();
        return view('available_food.create',['categories'=>$categories]);
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
        $data = $request->all();

        $photo=$request->file('photo');
        $cover_name=$request->file('photo')->getClientOriginalName();
        $new_photo=time().$cover_name;
        $destinationPathCover=public_path().'/photo';

        $data['photo'] = $new_photo; 

        if( $photo->move($destinationPathCover,$new_photo))
        {
            AvailableFood::create($data);
            return redirect()->route('available_food.index');
        }
        return back();
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
        // dd($food);
        $categories=Category::all();
        $food = DB::table('available_food')->where('id', $id)->first();

        return view('available_food.edit', ['categories' => $categories,'food'=>$food]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    //     $data = $request->all();
    //     $food = DB::table('available_food')->where('id', $id)->first();

    //     if ($request->hasFile('photo')) 
    //     {
    //         $photo = $request->file('photo');
    //         $cover_name = $photo->getClientOriginalName();
    //         $new_name_cover = time() . $cover_name;
    //         $destinationPathCover = public_path().'/photo';
    //         if ($photo->move($destinationPathCover, $new_name_cover)) {
    //             $old_file_cover = $food->photo;
    //             if ($old_file_cover && file_exists(public_path().'/photo/'.$old_file_cover)) {
    //                 unlink(public_path().'/photo/'.$old_file_cover);
    //             }
    //             $data['photo'] = $new_name_cover;
    //         }
            
    //         $food->update($data);
    //         // DB::table('available_food')->where('id', $id)->update($data);
    //     }
    //     else 
    //     {    
    //         $food->update($data);
    //         // DB::table('available_food')->where('id', $id)->update($data);
    //     }

    //     return redirect()->route('available_food.index');

    // }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $food = AvailableFood::find($id);

        if ($request->hasFile('photo')) {
            // Logic for file upload and updating the photo field
            $photo = $request->file('photo');
            $cover_name = $photo->getClientOriginalName();
            $new_name_cover = time() . $cover_name;
            $destinationPathCover = public_path().'/photo';
            if ($photo->move($destinationPathCover, $new_name_cover)) {
                $old_file_cover = $food->photo;
                if ($old_file_cover && file_exists(public_path().'/photo/'.$old_file_cover)) {
                    unlink(public_path().'/photo/'.$old_file_cover);
                }
                $data['photo'] = $new_name_cover;
            }
            
            $food->update($data);
        }

        $food->update($data);
        
        return redirect()->route('available_food.index');
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
        DB::table('available_food')->where('id', $id)->delete();
        return redirect()->route('available_food.index');
        
    }
}
