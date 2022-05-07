@extends('layouts.app')

@section('content')
    <div class="bg"></div>
    <div class="library-bg">
        <div class="library">
            <h3>Music Library</h3>
        
                <div class="categories flex">
                    @foreach($categories_array as $category)
            
                        <div class="category-container flex">
                            <a href="/songs?category_id={{$category->id}}" class="category">
                                <img class="category-img" src="/img/category-{{$category->id}}.jpg" alt="" width="250px" height="250px">
                                <p class="category-text">{{$category->name}}</p>
                            </a>
                        </div>
            
                    @endforeach
                </div>
        
                <div class="search-form">
                    <form action="" method="post">
                        @csrf
                        <input class="input-find" type="text" name="find_text" style="width: 50px" placeholder="Search here">
                        <input type="hidden" name="action" value="find">
                        <input type="submit" value="Find">
                    </form>
                </div>
        
                @auth
                    <a href="/upload">
                        <button class="btn btn-primary">Upload song</button>
                    </a>
                @else
                    <p style="color: red;">Please log on in order to upload songs</p>
                @endauth
        
                <div class="list">
                    @foreach ($songs_array as $song)
        
                        <div class="song flex">
                            <p>{{$song->artist}} - {{$song->name}}</p>
                            {{-- controlsList="nodownload" --}}
                            <div class="song-cnt flex">
                                <audio controls>
                                    <source src="mp3/{{$song->filename}}.mp3" type="audio/mp3" >
                                </audio>
                                {{-- <a href="{{ route('songs_array.download', $song->id) }}">download</a> --}}
                                @auth
                                    <a href="/complains/{{$song->id}}">
                                        <button class="btn btn-danger">Complain</button>
                                    </a>
                                @endauth
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
@endsection
