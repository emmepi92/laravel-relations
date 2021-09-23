@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
    <ul>
      @foreach ($errors->all() as $error)
          <li> {{ $error }}</li>
      @endforeach
    </ul>
    @endif
    <form action="{{ route('articols.store') }}" method='POST'>
        @csrf
        <div class="form-group">
            <label for="title">Titolo:</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Scrivi qui il titolo">
        </div>
    
        <div class="form-group">
            <label for="articol_content">Testo:</label>
            <textarea id="articol_content" name="articol_content" rows="5" placeholder="Scrivi qui il tuo articolo..."></textarea>
        </div>
    
        <div class="form-group">
            <label for="img_path">Url Immagine:</label>
            <input type="text" class="form-control" name="img_path" id="img_path" placeholder="incolla qui l'url della tua immagine">
        </div>

        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="author_id">Autore</label>
                </div>
                <select class="custom-select" id="author_id" name="author_id">
                    <option>Choose...</option>
                    @foreach($authors as $author)
                        <option value="{{$author->id}}">{{ $author->surname }} {{ $author->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    
    </form>

</div>

@endsection