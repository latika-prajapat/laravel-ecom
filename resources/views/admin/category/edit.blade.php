@extends('layouts.admin')
@section('main-content')
    <div class="card">
        <div class="card-header">
            <h1>Edit/Update Category</h1>
        </div>
        <div class="card-body">
            <form action="{{ url('update-category/'.$category->id) }}" method="get" enctype="multipart/form-data">
                @csrf
                {{-- @method('PUT') --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ $category->name }}" id="">

                        <div class="col-md-12 mb-3">
                            <label for="">Description</label>
                            <textarea name="desc" id="" cols="30"  rows="10">{{$category->desc }}</textarea>
                        </div>
                        @if ($category->image)
                            <img src="{{ asset('assets/uploads/category/' . $category->image) }}" alt="">
                        @endif
                        <div class="col-md-6 mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" id="">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">status</label>
                            <input type="checkbox" name="status"{{ $category->status == '1' ? 'checked' : '' }}
                                id="">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit Category</button>

                </div>
            </form>
        </div>
    </div>
@endsection
