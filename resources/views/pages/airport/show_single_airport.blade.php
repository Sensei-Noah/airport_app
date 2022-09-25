@extends('main')
@section('content')
    <div class="container">
        <h1 class="mt-4">{{ $airportCon-> airport_name }}</h1>
        <p> {{ $airportCon-> country_name }}</p>
        <p>{{ $airportCon-> latitude }} / {{ $airportCon-> longitude }}</p>
        <hr class="my-4" />
        <div class="row">
            <img class="img-thumbnail img-fluid" style="" src="/storage/{{ $airportCon-> image }}"></img>
        </div>
    </div>
    
@endsection
