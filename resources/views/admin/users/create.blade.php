@extends('layouts.admin')
@section('main-content')
    <div class="card">
        <div class="card-header">
            <h1>Add Users</h1>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input-group input-group-outline mb-4">
                    <label class="form-label"></label>
                    <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">
                </div>
                <div class="input-group input-group-outline mb-4">
                    <label class="form-label"></label>
                    <input type="email" class="form-control" placeholder="Email" name="email"
                        value="{{ old('email') }}">
                </div>
                <div class="input-group input-group-outline mb-4">
                    <label class="form-label"></label>
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
                <div class="input-group input-group-outline mb-4">
                    <label for="role" class="form-label"></label>
                    <select name="role" id="" class="form-select" >
                        <option value="">select user</option>
                        <option value="1">Admin</option>
                        <option value="0">User</option>
                    </select>
                </div>
                <button type="submit" class="btn bg-gradient-primary">Add Users</button>
            </form>
        </div>
    </div>
@endsection
