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

            <form action="{{ route('banners.update', $banners->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                @if ($banners->image)
                    <img src="/storage/{{ $banners->image }}" class="w-20" alt="">
                @endif
                <div class="input-group input-group-static my-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="input-group input-group-outline mb-4">
                    <label class="form-label"></label>
                    <input type="text" class="form-control" value="{{ $banners->heading }}" name="heading">
                </div>
                <div class="input-group input-group-dynamic">
                    <textarea class="form-control" name="para" rows="5"
                        placeholder="Say a few words about who you are or what you're working on." spellcheck="false">{{ $banners->para }}</textarea>
                </div>
                <div class="input-group input-group-outline mb-4">
                    <label for="status" class="form-label"></label>
                    <select name="status" class="form-select">
                        <option value="1"  {{ $banners->status == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0"  {{ $banners->status == '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn bg-gradient-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
