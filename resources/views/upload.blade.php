@extends('layouts.app')

@section('content')
<div class="bg"></div>
    <div class="library-bg">
        <div class="library">

   <div class="upload-form flex">
       <h1>Upload new song</h1>
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            Artist:
            <input type="text" name="artist">
            <br>
            Name:
            <input type="text" name="name">
            <br>
            Category: 
            <select id="category" name="category">
                <option value="rock">Rock</option>
                <option value="pop">Pop</option>
                <option value="rap">Rap</option>
                <option value="indie">Indie</option>
                <option value="edm">EDM</option>
            </select>
            <br>
            <input type="hidden" name="id" value="{{$song->id}}">
            <input type="hidden" name="action" value="song_upload">
            <div class="upload-temp-form flex">
                <input type="file" name="song" accept=".mp3">
                <input type="submit" value="Song Upload">
            </div>
        </form>
   </div>

</div>
</div>
@endsection
