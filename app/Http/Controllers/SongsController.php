<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SongsModel;

class SongsController extends Controller
{
    public function show(Request $request){

        $category_id = $request->input('category_id') ?? '0';


        if($category_id > 0){
            $songs_array = SongsModel::where('status', '=', "1")
                                        ->where(function($query) use ($category_id){
                                            $query->where('category_id', '=', $category_id);
                                        })->get();
        }
        else {
            // $songs_array = SongsModel::where('status', '=', "1")->get();
        }

        return view('songs', ['songs_array' => $songs_array]);

    }
}
