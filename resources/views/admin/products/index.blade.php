@extends('layouts.admin')
@section('main-content')
    <div class="card">
        <hr>
        <div class="card-heading">
            <h4 style="text-align: center">Product Page</h4>
            <hr>
        </div>
        {{-- <button class="btn btn-icon btn-3 btn-primary" type="button"> --}}
        <div class="col-md-6" style="margin-left: 20px">
            <a class="btn btn-primary" href="{{ route('products.create') }}">+Add product</a>
        </div>

        {{-- </button> --}}
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>color</th>
                    <th>size</th>
                    <th>Status</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                @if ($product->category_name)
                                    {{ $product->category_name }}
                                @else
                                    No Category
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->selling_price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->color }}</td>
                            <td>{{ $product->size }}</td>
                            <td>
                                @if ($product->status == 1)
                                    <label>Active</label>
                                @elseif ($product->status == 0)
                                    <label>Inactive</label>
                                @else
                                    <label>Active</label>
                                @endif
                            </td>

                            <td> {{ $product->updated_at }}</td>
                            <td>
                                <a href="{{ route('products.show', ['product' => $product->id]) }}"
                                    class="btn btn-info">View</a>
                                <a href="{{ route('products.edit', ['product' => $product->id]) }}"
                                    class="btn btn-success">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
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
            {{ $products->links() }}
        </div>

    </div>
@endsection
