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
                <div class="card-subtitle">Scritto da: {{ $articol->author->name }} {{ $articol->author->surname }}</div>
            </div>
        </div>
    </div>
</div>
@endsection