@extends('layouts.admin')
@section('main-content')
    <div class="card">
        <div class="card-header">
            <h1>Edit/Update Category</h1>
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
            
            <form action="{{ route('categories.update',$categories->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
               
                <div class="input-group input-group-outline mb-4">
                    <label class="form-label"></label>
                    <input type="text" class="form-control" value="{{ $categories->name }}" name="name">
                </div>
                <div class="input-group input-group-dynamic">
                    <textarea class="form-control" name="desc" rows="5"
                        placeholder="Say a few words about who you are or what you're working on." spellcheck="false">{{ $categories->desc }}</textarea>
                </div>
                @if ($categories->image)
                <img src="/storage/{{ $categories->image }}" class="w-20" alt="">
                @endif
                <div class="input-group input-group-static my-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="customRadio2"
                        {{ $categories->status == '1' ? 'checked' : '' }}>
                    <label class="custom-control-label" for="customRadio2">status</label>
                </div>
                <button type="submit" class="btn bg-gradient-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
