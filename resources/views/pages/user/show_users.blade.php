@extends('main')
@section('content')
<div class="container">
    <table class="table table-dark table-striped mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    @if ($user->role == 1)
                        <td>Admin</td>
                    @else
                        <td>Guest</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end md-4 pt-2">
        {{ $users->links() }}
    </div>
</div>
@endsection
