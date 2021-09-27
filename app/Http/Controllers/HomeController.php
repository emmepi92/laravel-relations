<?php

namespace App\Http\Controllers;

use App\Articol;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articols = Articol::paginate(12);

        foreach($articols as $articol) {

            $articol->articol_content= $this->cutTex($articol->articol_content);
            
        }

        return view('home', compact('articols'));
    }

    private function cutTex ($text) {
        $cutText = substr($text,0, 100);
        $cutText =  $cutText . "...";
        return $cutText;
    }
}
