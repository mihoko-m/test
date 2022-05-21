@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blog</title>
    </head>
    <body>
        <h1>Blog Name</h1>
        <form action='/posts' method="POST">
            @csrf
            <div class="category">
                <h2>Category</h2>
                <select name="post[category_id]">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                <!--
                バリデーションエラーで再度画面を表示した場合は、
                直前のリクエストから入力項目にデータを入れた状態にする。
                oldというグローバル変数を用います。
                oldの後ろにリクエストで送信したキー名を入力します。
                -->
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                <!--バリデーションエラーはerrorsに格納されており、view側に返却される。
                firstの引数にバリデーションのキーを入力することで
                該当キーのバリデーションエラーを取得できる。
                -->
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="post[body]" placeholder="今日も一日お疲れ様でした。">{{ old('post.body') }}</textarea>
                <!--
                old'post.body'でバリデーションエラーで再度画面を表示した場合は、
                直前のリクエストから入力項目にデータを入れた状態にする。
                -->
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <input type="submit" value="保存"/>
         </form>
         <div class="back">[<a href="/">back</a>]</div>  <!--戻るリンクでトップページに戻るよう指定 -->
    </body>
</html>
@endsection