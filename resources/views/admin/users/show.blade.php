@extends('layouts.admin')
@section('main-content')
    <div class="card">
        <div class="card-header">
            <h1>View Your data</h1>
        </div>

        <div class="card-body">
            <table class="table">
                <tr>
                    <td>Name</td>
                    <td>{{ $users->name }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $users->email }}</td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td>
                        @if ($users->role == '0')
                            <label value="0" selected>User</label>
                        @elseif ($users->role == '1')
                            <label value="1" selected>Admin</label>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>
                        {{ $users->updated_at }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
