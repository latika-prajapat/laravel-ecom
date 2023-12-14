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
                    <td>Quantity</td>
                    <td>{{ $products->quantity }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
