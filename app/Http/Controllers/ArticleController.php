<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article; //Articleモデルをuseします。

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();  //articlesテーブルからデータを抽出。
        return view('article.index', ['articles' => $articles]);  //ビューを表示します。この時、変数$articlesをビューに渡しています。
    }
    
    public function create()
    {
        //新規追加用のメソッドは新規追加のフォームを表示するメソッド（create）
        return view('article.create');
    }
    
    public function store(Request $request)
    {
        //フォームから送られたデータをデータベースに挿入するメソッド（store）
        $article = new Article;
        $article->title = $request->title;
        $article->body = $request->body;
        $article->save();
        
        return view('article.store');
    }
    //修正画面用のメソッドは修正のフォームを表示するメソッド（edit）
    public function edit(Request $request, $id)
    {
        $article = Article::find($id);
        return view('article.edit', ['article' => $article]);
    }
    
    public function update(Request $request)
    {
        //フォームから送られたデータでデータベースを更新するメソッド（update）
        $article = Article::find($request->id);
        $article->title = $request->title;
        $article->body = $request->body;
        $article->save();
 
        return view('article.update');
    }
    
    public function show(request $request, $id)
    {
        //削除データを表示するメソッド（show）
        $article = Article::find($id);
        return view('article.show', ['article' => $article]);
    }
    
    public function delete(Request $request)
    {
        //データベースからデータを削除するメソッド（delete）
        Article::destroy($request->id);
        return view('article.delete');
    }
    
}
