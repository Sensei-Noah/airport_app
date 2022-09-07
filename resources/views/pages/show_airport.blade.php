@extends('main')
@section('content')
<div class="container">

    <a type="button" class="btn btn-success mt-2" href="/add_airport">Add Airport</a>

    <table class="table">
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
        @foreach ($airportCon as $airportCons)
            
            <tr>
                <th scope="row">{{ $airportCons -> id }}</th>
                <td>{{ $airportCons -> airport_name }}</td>
                <td>{{ $airportCons -> country_name }}</td>
                <td>{{ $airportCons -> latitude }} / {{ $airportCons -> longitude }}</td>
                <td>
                    <a type="button" class="btn btn-primary mt-2" href="/show_airport/update/{{ $airportCons -> id }}">Edit</a>
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
          <a href="" class="btn btn-danger">Confirm delete</a>
        </div>
      </div>
    </div>
  </div>
@endsection