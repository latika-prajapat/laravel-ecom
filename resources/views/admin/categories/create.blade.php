@extends('layouts.admin')
@section('main-content')
    <div class="card">
        <div class="card-header">
            <h1>Add Category</h1>
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
            <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input-group input-group-outline mb-4">
                    <label class="form-label"></label>
                    <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">
                </div>
                <div class="input-group input-group-dynamic">
                    <textarea class="form-control" name="desc" rows="5" placeholder="write long description about the category"
                        spellcheck="false" value="{{ old('desc') }}"></textarea>
                </div>
                <div class="input-group input-group-static my-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="customRadio2">
                    <label class="custom-control-label" for="customRadio2">status</label>
                </div>
                <button type="submit" class="btn bg-gradient-primary">Add Category</button>
            </form>
        </div>
    </div>
@endsection
