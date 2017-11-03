<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Datatables;
use DB;

class PostController extends Controller
{
    public function datatable()
    {
        return view('data.datatable');
    }

    public function getPosts()
    {
        $users = Article::all();

        return Datatables::of($users)->addColumn('action', 'data.action')
        ->editColumn('content', function($users) {
                    return str_limit($users->content, 70);
                })->make(true);

    }
}
