@extends('layouts.app')

@section('content')

<div class="container ">
    <div class="row">
        @foreach ($articols as $articol)
        <div class="col-4 articol-card">
            <div class="articol-card-inner">
                <h3> {{ $articol->title }}</h3>
                <h6 class=""> di {{ $articol->author->name }} {{ $articol->author->surname }}</h6>
                <img src="{{ $articol->img_path }}" alt="">                
                <p> {{ $articol->articol_content }}</p>
            </div>
        </div>        
        @endforeach
    </div>
</div>

@endsection
