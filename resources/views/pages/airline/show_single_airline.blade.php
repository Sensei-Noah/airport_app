@extends('main')
@section('content')
    <div class="container">
        <h1 class="mt-4">{{ $airline-> airline_name }}</h1>
        <p> {{ $airline-> country_name }}</p>
        <hr class="my-4" />
    </div>

@endsection
