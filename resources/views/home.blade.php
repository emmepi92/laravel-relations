@extends('layouts.app')

@section('content')

<div class="container reset-padding-container">
    <div class="row">
        @foreach ($articols as $articol)
        <div class="col-12 col-md-6 col-lg-4 articol-card">
            <div class="articol-card-inner">
                <h3>
                    <a href="{{ route('articols.show', $articol) }}">
                        {{ $articol->title }}
                    </a>
                </h3>
                <h6 class=""> di {{ $articol->author->name }} {{ $articol->author->surname }}</h6>
                <img src="{{ $articol->img_path }}" alt="">                
                <p> {{ $articol->articol_content }}</p>
            </div>
        </div>        
        @endforeach
    </div>
</div>

<div class="d-flex justify-content-center">
    {{ $articols->onEachSide(1)->links() }}

</div>

@endsection
