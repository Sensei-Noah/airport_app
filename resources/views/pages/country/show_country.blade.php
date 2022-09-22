@extends('main')
@section('content')
<div class="container">

    <div class="container d-flex justify-content-center">
      <a type="button" class="btn btn-warning mt-2 me-2" href="/add_country">Add Country</a>
      <a type="button" class="btn btn-secondary mt-2 me-2" href="/show_countryNoAirline">Countries without airlines</a>
      <a type="button" class="btn btn-secondary mt-2 me-2" href="/show_countryNoAirlineNoAirport">Countries without airlines and airports</a>

    </div>

    <table class="table table-dark table-striped mt-3">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Country Name</th>
            <th scope="col">Country ISO Code</th>
            <th scope="col">Airline name</th>
            <th scope="col">Airport name</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($country as $countries)

            <tr>
                <th scope="row">{{ $countries -> id }}</th>
                <td>{{ $countries -> country_name }}</td>
                <td>{{ $countries -> country_ISO }}</td>
                <td>{{ $countries-> airline -> implode('airline_name', ', ') }}</td>
                <td>{{ $countries-> airportCon -> implode('airport_name', ', ') }}</td>
                <td>
                    <a type="button" class="btn btn-primary mt-2" href="/show_country/update/{{ $countries -> id }}">Edit</a>
                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#deleteConformation">Delete</button>
                </td>
            </tr>
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
          <a href="/show_country/delete/{{ $countries -> id ?? '' }}" class="btn btn-danger">Confirm delete</a>
        </div>
      </div>
    </div>
  </div>
@endsection
