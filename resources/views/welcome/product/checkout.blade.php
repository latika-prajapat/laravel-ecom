@extends('layout.app')

@section('title')
Welcome TO E-commerce Shop
@endsection
@section('content')
<div class="container">
    <form method="POST" action="{{ route('place_Order') }}">
        @csrf
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-center">Basic details</h6>
                        <hr>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Name</label>
                            <input type="text" class="form-control" name="customer_name" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter First Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email </label>
                            <input type="email" class="form-control" name="customer_email" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone Number </label>
                            <input type="text" class="form-control" name="customer_phone" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter Phone Number">
                        </div>
                        <div class="input-group input-group-outline mb-4">
                            <label for="status" class="form-label"></label>
                            <select name="status" id="" class="form-select">
                                <option value="1" {{ old('status')=='1' ? 'selected' : '' }}>processing</option>
                                <option value="0" {{ old('status')=='0' ? 'selected' : '' }}>cancel</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-center">Order details</h6>
                        <table class="table table-striped">
                            <tr>
                                <th>Image</th>
                                <th>Product name</th>
                                <th>Product Quantity</th>
                                <th>color</th>
                                <th>size</th>
                                <th>Price</th>
                            </tr>
                            @foreach ($cart as $carts)
                            <!-- <input type="text" value="{{ $carts->id }}" name="customer_id" hidden> -->
                            <tr>
                                <td>
                                    @if ($carts->image)
                                    <img src="/storage/{{ $carts->image }}" style="height: 125px">
                                    @endif
                                </td>
                                <td>{{ $carts->Product_name }}</td>
                                <td>{{ $carts->quantity }}</td>
                                <td>{{ $carts->color }}</td>
                                <td>{{ $carts->size }}</td>
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