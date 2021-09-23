@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4 card">
            <h2 class="card-title">{{ $articol->title }}</h2>
            <p class="card-text">{{ $articol->articol_content }}</p>
            <div class="card-subtitle">Scritto da: {{ $articol->author->name }} {{ $articol->author->surname }}</div>
            <img class="card-img-top mb-3" src="{{ $articol->img_path }}" alt="Card image cap">
        </div>
    </div>
</div>
@endsection