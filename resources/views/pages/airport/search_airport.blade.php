@extends('main')
@section('content')

<div class="container">

    <div class="container d-flex justify-content-center">
      <a type="button" class="btn btn-warning mt-2" href="/add_airport">Add Airport</a>
    </div>

    <div class="container d-flex justify-content-center">
        <a type="button" class="btn btn-info mt-2 btn-lg" href="/show_airport">Go back</a>
    </div>

    {{-- <form action="/show_airport/search" method="GET">
        <div class="container mt-3">
            <select id="country" class="form-select" aria-label="Default select example" name="country">
                <option selected>Open this select menu</option>
                @foreach ($country as $countries)

                <option value="{{ $countries-> id }}">{{ $countries -> country_name }}</option>
                @endforeach
            </select>
            <button class="btn btn-success " type="submit" >Search</button>
        </div>
    </form> --}}

    <table class="table table-dark table-striped mt-3">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Airport Name</th>
            <th scope="col">Country</th>
            <th scope="col">Location</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($country as $countries)


            @foreach ($airportCon as $airportCons)
                        @if ($countries-> id == $airportCons-> country_id)

                            <tr>
                                <th scope="row">{{ $airportCons -> id }}</th>
                                <td>{{ $airportCons -> airport_name }}</td>
                                <td>{{ $airportCons -> country_name }}</td>
                                <td>{{ $airportCons -> latitude }} / {{ $airportCons -> longitude }}</td>
                                <td>
                                    {{-- <button type="submit" class="btn btn-success mt-2" name="airport_show_map" value="{{ $airportCons -> latitude }},{{ $airportCons-> longitude }}">Show Map</button> --}}
                                    @if (Auth::check())
                                        <a type="button" class="btn btn-primary mt-2" href="/show_airport/update/{{ $airportCons -> id }}">Edit</a>
                                        <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#deleteConformation">Delete</button>

                                    @else
                                        <a type="button" class="btn btn-primary mt-2" href="/login">Login</a>

                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="deleteConformation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a href="/show_airport/delete/{{ $airportCons -> id ?? '' }}" class="btn btn-danger">Confirm delete</a>
        </div>
      </div>
    </div>
  </div>
@endsection
