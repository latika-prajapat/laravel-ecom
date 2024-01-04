@extends('layout.app')

@section('title')
    Welcome TO E-commerce Shop
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('place_Order') }}" method="POST">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-center">Basic details</h6>
                            <hr>
                            <div class="form-group">
                                <label for="exampleInputEmail1">First Name</label>
                                <input type="text" class="form-control" name="fname" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter First Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Last Name</label>
                                <input type="text" class="form-control" name="lname" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Last Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email </label>
                                <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Address</label>
                                <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone Number </label>
                                <input type="text" class="form-control" name="phone" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Phone Number">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">city </label>
                                <input type="text" class="form-control" name="city" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter city">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">state </label>
                                <input type="text" class="form-control" name="state" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter state">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">country </label>
                                <input type="text" class="form-control" name="country" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter country">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">pincode </label>
                                <input type="text" class="form-control" name="pincode" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter pincode">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-center">Order details</h6>
                            <table class="table table-striped">
                                <tr>
                                    <th>Image</th>
                                    <th>Product name</th>
                                    <th>Product Quantity</th>
                                    <th>Price</th>
                                </tr>
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
                                    </tr>
                                @endforeach
                            </table>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
