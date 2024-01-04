@extends('layouts.admin')
@section('main-content')
    <div class="card">
        <div class="card-header">
            <h1>View Your data</h1>
        </div>

        <div class="card-body">
            <table class="table">
                <tr>
                    <td>category</td>
                    <td>
                        @if ($products->category)
                            {{ $products->category->name }}
                        @else
                            No Category
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{ $products->name }}</td>
                </tr>
                <tr>
                    <td>Slug</td>
                    <td>{{ $products->slug }}</td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>{{ $products->description }}</td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td>
                        @if ($products->image)
                            <img src="/storage/{{ $products->image }}" class="w-20" alt="">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Selling price</td>
                    <td>{{ $products->selling_price }}</td>
                </tr>
                <tr>
                    <td>color</td>
                    <td>{{ $products->color }}</td>
                </tr>
                <tr>
                    <td>size</td>
                    <td>{{ $products->size }}</td>
                </tr>
                <tr>
                    <td>Quantity</td>
                    <td>{{ $products->quantity }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        @if ($products->status == '0')
                            <label value="0" selected>Inactive</label>
                        @elseif ($products->status == '1')
                            <label value="1" selected>Active</label>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>
                        {{ $products->updated_at }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
