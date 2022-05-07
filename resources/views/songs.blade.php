@extends('layouts.app')

@section('content')
<div class="bg"></div>
    <div class="library-bg">
        <div class="library">
@foreach ($songs_array as $song)
        
        <div class="song flex">
            <p>{{$song->artist}} - {{$song->name}}</p>
            <div class="song-cnt flex">
                <audio controls>
                    <source src="mp3/{{$song->filename}}.mp3" type="audio/mp3" >
                </audio>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection