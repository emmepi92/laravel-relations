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
                <div class="interactions-container">
                    <div> <button class="btn btn-success">Like</button></div>
                    <div> <button class="btn btn-success">Commenta</button></div>
                    <div> <button class="btn btn-success">Condividi</button></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container show reset-padding-container">
    <div class="row">
        <div class="col">
            <div class="comments-container">
                <h3>Commenti</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="comments-container">
                <h3>Lascia qui il tuo commento</h3>
                <form action="{{ route('comment.store', ['id'=>$articol->id]) }}" method='POST'>
                    @csrf
                    <textarea name="text" id="text" cols="30" rows="10" placeholder="Scrivi qui..."></textarea>
                    <button type="submit" class="btn btn-success">Pubblica co   mmento</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection