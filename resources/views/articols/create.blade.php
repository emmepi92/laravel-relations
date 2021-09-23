@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('articols.store') }}" method='post'>
        @csrf
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>
    
        <div class="form-group">
            <textarea id="articol_content" name="articol_content" rows="5" placeholder="Scrivi qui il tuo articolo..."></textarea>
        </div>
    
        <div class="form-group">
            <label for="img_path">Url Immagine</label>
            <input type="text" class="form-control" name="img_path" id="img_path">
        </div>


        {{-- menu a tendina per autore  --}}
        <div class="form-group">
            <h3>Info Autore</h3> 
            <label for="author_name">Nome</label>
            <input type="text" class="form-control" name="author_name" id="author_name">
            <label for="author_surname">Cognome</label>
            <input type="text" class="form-control" name="author_surname" id="author_surname">
        </div>
    
    </form>

</div>

@endsection