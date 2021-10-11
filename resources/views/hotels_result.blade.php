@extends('layouts.app')
@section('title', 'List Hotels')
@section('content')
    <div class="container">

        <div class="text-center">
            <h3><b>List Hotels</b></h3>
        </div>
        <div>
            <a href="{{ route('index') }}">Voltar</a>
        </div>
        <ul class="list-group mt-3">
            @foreach ($hotels as $hotel)
                <li class="list-group-item"><?= $hotel[0] . ', ' . $hotel[4] . ' KM, ' . $hotel[3] . ' EUR' ?></li>
            @endforeach
        </ul>
    </div>
@endsection
