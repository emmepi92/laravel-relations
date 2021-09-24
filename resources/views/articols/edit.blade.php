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

    <form action="{{ route('articols.update', $articol) }}" method='POST'>
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Titolo:</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $articol->title }}">
        </div>
    
        <div class="form-group">
            <label for="articol_content">Testo:</label>
            <textarea id="articol_content" name="articol_content" rows="5" placeholder="Scrivi qui il tuo articolo...">{{ $articol->articol_content }}</textarea>
        </div>
    
        <div class="form-group">
            <label for="img_path">Url Immagine:</label>
            <input type="text" class="form-control" name="img_path" id="img_path" value="{{ $articol->img_path }}">
        </div>

        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="author_id">Autore</label>
                </div>
                <select class="custom-select" id="author_id" name="author_id">
                    <option>Choose...</option>
                    @foreach($authors as $author)
                        @if($articol->author_id===$author->id)
                            <option  selected value="{{$author->id}}">{{ $author->surname }} {{ $author->name }}</option>
                        @else
                            <option  value="{{$author->id}}">{{ $author->surname }} {{ $author->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    
    </form>

</div>

@endsection