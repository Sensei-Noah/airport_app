@extends('main')
@section('content')


    <div class="container d-flex justify-content-center">
        <h1 class="mt-3">Add an Airline</h1>
    </div>
    <div class="container border border-2 bg-dark p-2">

        <form action="/store_airline" method="post">

        @csrf
        @include('_partials.errors')
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Airline Name</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="airline_name">
            </div>
            <div class="input-group mb-3">
                <select id="country" class="form-select" aria-label="Default select example" name="country_name">
                    <option selected value="">Open this select menu</option>
                    @foreach ($country as $countries)
                        <option value="{{ $countries-> country_name }}">{{ $countries -> country_name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Country</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="country_name">
            </div> --}}
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Country ISO</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="country_ISO">
            </div>
            <div class="input-group mb-2">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>

    </div>



@endsection
