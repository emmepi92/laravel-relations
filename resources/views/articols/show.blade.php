@extends('layouts.app')

@section('content')
<div class="container show reset-padding-container">
    <div class="row">
        <div class="col">
            <div class="articol">
                <h2 class="card-title">{{ $articol->title }}</h2>
                <div class="row">
                    <div class="col-12 col-md-8">
                        <p class="card-text">{{ $articol->articol_content }}</p>
                    </div>
                    <div class="col-12 col-md-4">
                        <img class="card-img-top mb-3" src="{{ $articol->img_path }}" alt="Card image cap">                        
                    </div>
                </div>
                <div class="after-articol">
                    <div class="card-subtitle">Scritto da: {{ $articol->author->name }} {{ $articol->author->surname }}</div>
                    <div>
                        @foreach ($articol->tag as $tag)
                        <span class="badge badge-success">{{ $tag->name }}</span>
                            
                        @endforeach
                    </div>
                    
                </div>
                <button class="btn btn-success"><a href=" {{ route('articols.edit', $articol) }}">Modifica</a></button>
            </div>
        </div>
    </div>
</div>

<div class="container show reset-padding-container">
    
    <div class="row">
        <div class="col">
            <div class="comments-container">
                <h3>Lascia qui il tuo commento</h3>
                @if ($errors->any())
                <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }}</li>
                @endforeach
                </ul>
                @endif
                <form action="{{ route('comment.store', ['id'=>$articol->id]) }}" method='POST'>
                    @csrf
                    <label for="title">Nome:</label>
                    <input type="text" class="form-control" name="author" id="author" placeholder="Scrivi qui il tuo nome">
                    <textarea name="text" id="text" cols="30" rows="10" placeholder="Scrivi qui il tuo commento"></textarea>
                    <button type="submit" class="btn btn-success">Pubblica commento</button>
                    

                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="comments-container">
                <h3>Commenti</h3>
                @foreach ($articol->comment as $comment) 
                <div>
                    <p>{{ $comment->text }}</p>
                    <span>Scritto da {{ $comment->author }}, il {{ $comment->created_at }}</span>
                </div>                    
                @endforeach  
            </div>
        </div>
    </div>
</div>
@endsection