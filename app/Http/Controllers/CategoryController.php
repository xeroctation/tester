<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\SongsModel;
use App\SongsModel as AppSongsModel;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function show(Request $request){
        $action = $request->input('action') ?? 'show';
        $find_text = $request->input('find_text') ?? '';

        if($action == 'song_upload'){
            $song_file = $request->file('song');

            $destination_path = public_path().'/mp3';

            $song_ext = $song_file->extension();
            $song_name = $song_file->getFilename();

            $song_filename = $song_name.'.'.$song_ext;
            // $song_name = pathinfo($song_file, PATHINFO_FILENAME);

            $song_file->move($destination_path, $song_filename);
        }


        if ($action == 'find'){

                $songs_array = SongsModel::where('status', '=', "1")
                                            ->where(function($query) use ($find_text){
                                                $query->where('artist', 'like', "%$find_text%")
                                                      ->orWhere('name', 'like', "%$find_text%");
                                            })->get();

        }
        else // Shopw all 
        {
            $songs_array = SongsModel::where('status', '=', "1")->get();
        }


        $categories_array = CategoryModel::get();

        return view('categories',['categories_array' => $categories_array], ['songs_array' => $songs_array]);
    }

    // public function download(Request $request){

    //     $song = SongsModel::where('id', $id)->firstOrFail();
    //     $pathToFile = storage_path('mp3/' . $song->filename.'.mp3');
    //     return response()->download($pathToFile);
    // }

    public function upload(Request $request){
        $request->validate([
            'file' => 'max:50000'
        ]);
        $action = $request->input('action') ?? 'show';

        $artist = $request->input('artist') ?? '';
        $name = $request->input('name') ?? '';
        $category = $request->category;
        if($action == 'song_upload'){
            $song_file = $request->file('song');
            
            $destination_path = public_path().'/mp3';
            
            $song_ext = $song_file->extension();
            // $song_name = $song_file->getFilename();
            $song_name = $song_file->getClientOriginalName();
            
            $song_filename = $song_name.'.'.$song_ext;
            // dd($song_name);
            $song_file->move($destination_path, $song_filename);

            $song = new SongsModel;
            $song->artist = $artist;
            $song->name = $name;
            $song->filename = $song_name;
            switch ($category) {
                case 'rock':
                    $song->category_id = 1;
                    break;
                case 'pop':
                    $song->category_id = 2;
                    break;
                case 'rap':
                    $song->category_id = 3;
                    break;
                case 'indie':
                    $song->category_id = 4;
                    break;
                case 'edm':
                    $song->category_id = 5;
                    break;
            }
            $song->save();
        }
        
        $song = SongsModel::get();
        
        // if (Auth::check()) {
            return view('upload', ['song' => $song[0]]);
        // }
        // else{
        //     echo('please log in');
        // }
    }

}
