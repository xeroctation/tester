@extends('layouts.app')

@section('content')
<div class="bg"></div>
    <div class="library-bg">
        <div class="library">
            <div class="upload-form flex complain-form">

                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="song_filename" value="{{$song->filename}}">
                        Write the complaint reason please:
                        <input type="text" name="complain_text">
                        <input type="submit" value="Send Complaint">
                    </form>

</div>
</div>
</div>
@endsection
