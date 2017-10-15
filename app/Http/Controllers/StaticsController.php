<?php

namespace App\Http\Controllers;
use Illiminate\Http\Request;
use App\Http\Requests;

class StaticsController extends Controller
{
    public function profile(){
        return view('statics/profile');
    }
}
