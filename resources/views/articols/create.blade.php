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
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="author_id">Autore</label>
                </div>
                <select class="custom-select" id="author_id" name="author_id">
                    <option selected>Choose...</option>
                    @foreach($authors as $author)
                        <option value="{{$author->id}}">{{ $author->surname }} {{ $author->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    
    </form>

</div>

@endsection