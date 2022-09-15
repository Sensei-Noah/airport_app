@extends('main')
@section('content')


    <div class="container d-flex justify-content-center">
        <h1 class="mt-3">Add a Country</h1>
    </div>
    <div class="container border border-2 bg-dark p-2">

        <form action="/store_country" method="post">

        @csrf
        @include('_partials.errors')
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Country Name</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="country_name">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Country Code</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="country_ISO">
            </div>
            <div class="input-group mb-2">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>

    </div>



@endsection
