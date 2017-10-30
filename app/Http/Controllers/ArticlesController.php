<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\article_images;
use Session;
use Validator;
use Redirect;


class ArticlesController extends Controller
{
    public function __construct() 
    {
        $this->middleware('sentinel');
        $this->middleware('sentinel.role');
    }

    public function index(Request $request)
    {
        
        if($request->ajax()) 
        {
            $articles = Article::where('title', 'like', '%'.$request->keywords.'%')->orWhere('content', 'like', '%'.$request->keywords.'%');
            if($request->direction) 
            {
            $articles = $articles->orderBy('id', $request->direction);
            }
            $articles = $articles->paginate(3);
            
            $request->direction == 'asc' ? $direction = 'desc' : $direction = 'asc';
            $request->keywords == '' ? $keywords = '' : $keywords = $request->keywords;
            
            $view = (String) view('articles.list')->with('articles', $articles)->render();

            return response()->json(['view' => $view, 'direction' => $direction, 'keywords' => $keywords, 'status' => 'success']);
        } else 
            {
            $articles = Article::all();
            return view('articles.index')->with('articles', $articles);
            }
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

        $destinationPath = 'uploads';
        $generateName = md5(uniqid(mt_rand(), true).microtime(true));
        $articles  = Article::create($request->all());
        if(isset($request->image)){
            foreach($request->image as $file){
            //$file = $request->file('image'); 
            $fileName = $destinationPath . '_' .  $generateName . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath,$fileName); 

            $image = new article_images;
            $image ->  article_id = $articles->id;
            $image -> filename = $fileName;
            $image -> save();
            }
        }
        
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

        $comments = Article::find($id)->comments->sortBy('Comment.created_at');
        $images = Article::find($id)->filename;

        return view('articles.show')
        ->with('article', $article)
        ->with('comments', $comments)
        ->with('article_images', $images);


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
