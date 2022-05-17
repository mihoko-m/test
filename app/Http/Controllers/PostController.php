<?php

namespace App\Http\Controllers;

use App\Post; //Postモデルを使う
use App\Http\Requests\PostRequest; //PostRequestをuseする

class PostController extends Controller
{
/**
 * Post一覧を表示する
 * 
 * @param Post Postモデル
 * @return array Postモデルリスト
 */
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }
<<<<<<< HEAD
/**
 * 特定IDのpostを表示する
 *
 * @params Object Post // 引数の$postはid=1のPostインスタンス
 * @return Reposnse post view
 */
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
=======
    
    public function create()
    {
        return view('posts/create');
    }
    
    public function store(Post $post, PostRequest $request) // 引数をRequestからPostRequestにする
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
>>>>>>> dev_basis04
    }
}
