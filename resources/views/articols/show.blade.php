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

                <div class="options-container">
                    <button class="btn btn-success"><a href=" {{ route('articols.edit', $articol) }}">Modifica</a></button>
    
                    <form action=" {{ route('articols.destroy', $articol) }} " method="POST">
                        @csrf
                        @method('DELETE')                  
                        <button type="submit" class="btn btn-danger">
                          Elimina
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container comments-container reset-padding-container">    
    <div class="row">
        <div class="col">
            <div>
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

                    <div class="form-group">
                        <label for="title">Nome:</label>
                        <input type="text" class="form-control" name="author" id="author" placeholder="Scrivi qui il tuo nome">
                    </div>

                    <div class="form-group">
                        <label for="text">Testo commento:</label>
                        <textarea name="text" id="text" cols="30" rows="10" placeholder="Scrivi qui il tuo commento"></textarea>
                        <button type="submit" class="btn btn-success">Pubblica commento</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div>
                <h3>Commenti</h3>
                @foreach ($articol->comment as $comment) 

                <div class="comment">

                    <p>{{ $comment->text }}</p>
                    <div class="comment-info">Scritto da {{ $comment->author }}, il {{ $comment->created_at }}</div>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success close-but" data-toggle="modal" data-target="#exampleModal{{$comment->id}}">
                        X
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$comment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Attenzione</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            Sicuro di voler eliminare il commento?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Annulla</button>
                                
                                <form action=" {{ route('comment.destroy', $comment) }}" method="POST">
                                    @csrf
                                    @method('DELETE')   

                                    <button type="submit" class="btn btn-danger">Elimina</button>

                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                @endforeach  
            </div>
        </div>
    </div>
</div>
@endsection