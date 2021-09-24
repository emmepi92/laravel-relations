<?php

namespace App\Http\Controllers;

use App\Author;
use App\Articol;
use Illuminate\Http\Request;

class ArticolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        return view('articols.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'articol_content' =>'required|max:65500',
            'author_id'=> 'required|exists:App\Author,id',
            'img_path' => 'required|url|max:65500'
        ]);

        $articol = new Articol();

        $this->fillAndSave($request, $articol);

        return redirect()->route('articols.show', $articol);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articol = Articol::find($id);
        $articol->title = ucwords($articol->title);
        return view('articols.show', compact('articol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Articol $articol)
    {
        $authors = Author::all();
        return view('articols.edit', compact('articol','authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articol $articol)
    {
        $this->fillAndSave($request, $articol);
        
        return redirect()->route ('articols.show', $articol);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function fillAndSave (Request $request, Articol $articol) {
        $data= $request->all();

        $articol->title = $data['title'];
        $articol->articol_content = $data['articol_content'];
        $articol->author_id = $data['author_id'];
        $articol->img_path = $data['img_path'];

        $articol->save();

    }
}
