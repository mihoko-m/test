@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
        <a href="/user">{{Auth::user()->name}}</a>
        <h1>Blog Name</h1>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <p><small>{{ $post->user->name }}</small></p>
                    <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                    <p class='body'>{{ $post->body }}</p>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return Check()">delete</button> 
                    </form>
                </div>
            @endforeach
        </div>
        <div>
        @foreach($questions as $question)
            <div>
              <a href="https://teratail.com/questions/{{ $question['id'] }}">
                {{ $question['title'] }}
              </a>
             </div>
        @endforeach
        </div>
        <a href="/posts/create">create</a>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <script>
            function Check(){
                if(confirm("削除しますが本当によろしいですか？")){
                    return true;
                } else {
                    return false;
                }
            }
        </script>
    </body>
</html>
@endsection
