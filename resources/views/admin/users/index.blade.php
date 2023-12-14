@extends('layouts.admin')
@section('main-content')
    <div class="card">
        <hr>
        <div class="card-heading">
            <h4 style="text-align: center">User Page</h4>
            <hr>
        </div>
        {{-- <button class="btn btn-icon btn-3 btn-primary" type="button"> --}}
        <div class="col-md-6" style="margin-left: 20px">
            <a class="btn btn-primary" href="{{ route('users.create') }}">+Add user</a>
        </div>

        {{-- </button> --}}
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->role == 1)
                                    <label>Admin</label>
                                @elseif ($user->role == 0)
                                    <label>User</label>
                                @else
                                    <label>User</label>
                                @endif
                            </td>
                            <td> {{ $user->updated_at }}</td>
                            <td>
                                <a href="{{ route('users.show', ['user' => $user->id]) }}" class="btn btn-info">View</a>
                                <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-success">Edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>
        </div>
        <div class="pagi" style="margin-left: 10px;">
            {{ $users->links() }}
        </div>

    </div>
@endsection
