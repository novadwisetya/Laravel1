<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Images;
use Session;
use Validator;
use Redirect;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::all();   
        return view('articles.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'title' => 'required|min:5',
            'content' => 'required|min:5'
        ]);

        Article::create($request->all());
        $file = $request->file('image');
        $destinationPath = 'uploads';
        $generateName = md5(uniqid(mt_rand(), true).microtime(true));
        $fileName = $destinationPath . '_' .  $generateName . '.' . $file->getClientOriginalExtension();
        $file->move($destinationPath,$fileName); 

        $image = new Images;
        $image -> fileImage = $fileName;
        $image -> title = $request->title;
        $image -> save();
        
        Session::flash("notice", "Article success created");
        return Redirect::to('articles/'. $request->article_id); 
        
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);

        $comments = Article::find($id)
        ->comments->sortBy('Comment.created_at');
        return view('articles.show')
        ->with('article', $article)
        ->with('comments', $comments);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit')->with('article', $article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Article::find($id)->update($request->all());
        Session::flash("notice", "Article success updated");
        return redirect()->route("articles.show", $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::destroy($id);
        Session::flash("notice", "Article success deleted");
        return redirect()->route("articles.index");
    }
    
}
