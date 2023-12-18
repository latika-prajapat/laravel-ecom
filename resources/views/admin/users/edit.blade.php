@extends('layouts.admin')
@section('main-content')
    <div class="card">
        <div class="card-header">
            <h1>Edit/Update Users</h1>
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
            <form action="{{ route('users.update', $users->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="input-group input-group-outline mb-4">
                    <label class="form-label"></label>
                    <input type="text" class="form-control" value="{{ $users->name }}" name="name">
                </div>
                <div class="input-group input-group-outline mb-4">
                    <label class="form-label"></label>
                    <input type="email" class="form-control" value="{{ $users->email }}" name="email">
                </div>
                <div class="input-group input-group-outline mb-4">
                    <label class="form-label"></label>
                    <input type="password" class="form-control" value="{{ $users->password }}" name="password">
                </div>
                <div class="input-group input-group-outline mb-4">
                    <label for="role" class="form-label"></label>
                    <select name="role" class="form-select">
                        <option value="1"  {{ $users->role == '1' ? 'selected' : '' }}>Admin</option>
                        <option value="0"  {{ $users->role == '0' ? 'selected' : '' }}>User</option>
                    </select>
                </div>
                <button type="submit" class="btn bg-gradient-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
