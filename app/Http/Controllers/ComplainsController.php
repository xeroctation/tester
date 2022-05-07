<?php

namespace App\Http\Controllers;
use App\Models\SongsModel;
use App\Models\ComplainsModel;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ComplainsController extends Controller
{
    public function send(Request $request){

        $song_filename = $request->input('song_filename') ?? '';
        $complain_text = $request->input('complain_text') ?? '';
        $user_id = Auth::user()->id;

        $complain = new ComplainsModel;
        $complain->song_filename = $song_filename;
        $complain->complain_text = $complain_text;
        $complain->user_id = $user_id;
        $complain->save();

        $song = SongsModel::get();

        return view('complain', ['song' => $song[0]], ['complain' => $complain[0]]);
    }
}
