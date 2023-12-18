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

            <form action="{{ route('products.update', $products->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="input-group input-group-outline mb-4">
                    <select name="category_id" class="form-control p-3" id="category">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if($category->id == $products->category_id) selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group input-group-outline mb-4">
                    <label class="form-label"></label>
                    <input type="text" class="form-control" value="{{ $products->name }}" name="name">
                </div>
                <div class="input-group input-group-dynamic">
                    <textarea class="form-control" name="description" rows="5"
                        placeholder="Say a few words about who you are or what you're working on." spellcheck="false">{{ $products->description }}</textarea>
                </div>
                @if ($products->image)
                    <img src="/storage/{{ $products->image }}" class="w-20" alt="">
                @endif
                <div class="input-group input-group-static my-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="input-group input-group-static my-3">

                    <label for="quantity">Quantity</label>
                    <input type="numb" name="quantity" id="quantity" value="{{ $products->quantity }}"
                        class="form-control">

                </div>
                <div class="input-group input-group-static my-3">
                    <label for="selling_price">Selling Price</label>
                    <input type="numb" name="selling_price" value="{{ $products->selling_price }}" id="selling_price"
                        class="form-control">
                </div>
                <div class="input-group input-group-outline mb-4">
                    <label for="status" class="form-label"></label>
                    <select name="status" class="form-select">
                        <option value="1"  {{ $products->status == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0"  {{ $products->status == '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn bg-gradient-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
