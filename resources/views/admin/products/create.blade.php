@extends('layouts.admin')
@section('main-content')
    <div class="card">
        <div class="card-header">
            <h1>Add Product</h1>
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
            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="category">Select Category</label>
                <div class="input-group input-group-outline mb-4">

                    <select name="category_id" class="form-control p-3" id="category">
                        @foreach ($categories as $category)
                            {{-- <option value="">Select category</option> --}}
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group input-group-outline mb-4">
                    <label class="form-label"></label>
                    <input type="text" class="form-control" placeholder="Name" name="name"
                        value="{{ old('name') }}">
                </div>
                <!-- <div class="input-group input-group-outline mb-4">
                    <label class="form-label"></label>
                    <input type="text" class="form-control" placeholder="Name" name="slug"
                        value="{{ old('slug') }}">
                </div> -->
                {{-- <div class="input-group input-group-outline mb-4">
                    <label class="form-label"></label>
                    <input type="color" id="color" name="color"
                        value="{{ old('slug') }}">
                </div> --}}
                <div class="input-group input-group-dynamic">
                    <textarea class="form-control" name="description" rows="5" placeholder="write long description about the category"
                        spellcheck="false" value="">{{ old('description') }}</textarea>
                </div>
                <div class="input-group input-group-static my-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="input-group input-group-static my-3">

                    <label for="quantity">Quantity</label>
                    <input type="numb" name="quantity" id="quantity" class="form-control">

                </div>
                 <label for="color" class="form-label">Colors:</label>
                <div class="input-group input-group-outline mb-4">

                    <select name="color[]" multiple id="" class="form-select">
                        <option value="Black"  {{ old('color') == 'Black' ? 'selected' : '' }}>Black</option>
                        <option value="White"  {{ old('color') == 'White' ? 'selected' : '' }}>White</option>
                        <option value="Red"  {{ old('color') == 'Red' ? 'selected' : '' }}>Red</option>
                        <option value="Blue"  {{ old('color') == 'Blue' ? 'selected' : '' }}>Blue</option>
                        <option value="Green"  {{ old('color') == 'Green' ? 'selected' : '' }}>Green</option>
                    </select>
                </div>

                <label for="size" class="form-label">sizes:</label>
                <div class="input-group input-group-outline mb-4">

                    <select name="size[]" multiple id="" class="form-select">
                        <option value="XS"  {{ old('size') == 'XS' ? 'selected' : '' }}>XS</option>
                        <option value="S"  {{ old('size') == 'S' ? 'selected' : '' }}>S</option>
                        <option value="M"  {{ old('size') == 'M' ? 'selected' : '' }}>M</option>
                        <option value="L"  {{ old('size') == 'L' ? 'selected' : '' }}>L</option>
                        <option value="XL"  {{ old('size') == 'XL' ? 'selected' : '' }}>XL</option>
                    </select>
                </div>
                <div class="input-group input-group-static my-3">
                    <label for="selling_price">Selling Price</label>
                    <input type="numb" name="selling_price" id="selling_price" class="form-control">
                </div>

                <div class="input-group input-group-outline mb-4">
                    <label for="status" class="form-label"></label>
                    <select name="status" id="" class="form-select">
                        <option value="1"  {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0"  {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn bg-gradient-primary">Add Product</button>
            </form>
        </div>
    </div>
@endsection
