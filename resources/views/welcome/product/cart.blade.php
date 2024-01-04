@extends('layout.app')

@section('title')
    Welcome TO E-commerce Shop
@endsection
@section('content')
    <div>
        <table class="table table-striped">
            <tr>
                <th>Image</th>
                <th>Product name</th>
                <th>Product Quantity</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            @php
                $totalPrice=0;
                @endphp
            @foreach ($cart as $carts)
                <tr>
                    <td>
                        @if ($carts->image)
                            <img src="/storage/{{ $carts->image }}" style="height: 125px">
                        @endif
                    </td>
                    <td>{{ $carts->Product_name }}</td>
                    <td>{{ $carts->quantity }}</td>
                    <td>{{ $carts->price }}</td>
                    <td>
                        <a href="{{ route('remove_cart', ['id' => $carts->id]) }}" class="btn btn-primary">Remove Cart</a>
                    </td>
                </tr>
                @php
                $totalPrice=$totalPrice+$carts->price
               @endphp
            @endforeach

        </table>
        <h3 class="text-center mt-4">
         Total Price:   {{$totalPrice}}
        </h3>
       
        <div class="text-center mt-4">
            <a href="{{route('welcome.product.checkout')}}" class="btn btn-primary">Proceed your Order</a >
            
        </div>
    </div>
@endsection
