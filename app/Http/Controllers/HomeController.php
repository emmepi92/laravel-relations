<?php

namespace App\Http\Controllers;

use App\Articol;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articols = Articol::paginate(9);

        foreach($articols as $articol) {

            $articol->articol_content= $this->cutTex($articol->articol_content);
            $articol->title = ucwords($articol->title);
        }

        return view('home', compact('articols'));
    }

    private function cutTex ($text) {
        $cutText = substr($text,0, 100);
        $cutText =  $cutText . "...";
        return $cutText;
    }
}
