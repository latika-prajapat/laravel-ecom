@extends('layout.app')

@section('title')
Welcome TO E-commerce Shop
@endsection
@section('content')
<h6 class="text-center">My Order </h6>
<table class="table table-striped">
    <tr>
        <th>Product name</th>
        <th>Product Quantity</th>
        <th>color</th>
        <th>size</th>
        <th>Price</th>
        <th>Status</th>
    </tr>
    @foreach ($order as $orders)
    <tr>
        <td>{{ $orders->product_name }}</td>
        <td>{{ $orders->quantity }}</td>
        <td>{{ $orders->color }}</td>
        <td>{{ $orders->size }}</td>
        <td>{{ $orders->price }}</td>
        <td>
            @if ($orders->status == '0')
            <label value="0" selected>cancel</label>
            @elseif ($orders->status == '1')
            <label value="1" selected>processing</label>
            @endif
        </td>
    </tr>

    @endforeach
</table>
@endsection