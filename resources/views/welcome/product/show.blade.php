@extends('layout.app')

@section('title')
Welcome TO E-commerce Shop
@endsection
@section('content')
<!-- Shop Detail Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner border">
                    <div class="carousel-item active">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }} Image"
                            class="w-100 h-100">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold">{{ $product->name }}</h3>
            <div class="d-flex mb-3">
                <div class="text-primary mr-2">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star-half-alt"></small>
                    <small class="far fa-star"></small>
                </div>
                <small class="pt-1">(50 Reviews)</small>
            </div>
            <h3 class="font-weight-semi-bold mb-4">{{ $product->selling_price }}</h3>
            <p class="mb-4">{{ $product->description }}
            </p>
            <form action="{{ route('Addcart', ['id' => $product->id]) }}" method="GET">
                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                    <!-- <h5 class="text-dark font-weight-medium mb-0 mr-3">{{ $product->size }}</h5> -->
                    @foreach (explode(',', $product->size) as $key => $size)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="size" id="size{{ $key+1 }} "
                            value="{{ $size }}">
                        <label class="form-check-label mx-3" for="size{{ $key+1 }}">
                            {{$size}}
                        </label>
                    </div>
                    @endforeach
                </div>
                <div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
                    @foreach (explode(',', $product->color) as $key => $color)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="color" id="color{{ $key+1 }}"
                            value="{{ $color }}">
                        <label class="form-check-label  mx-3" for="color{{ $key+1 }}">
                            {{$color}}
                        </label>
                    </div>
                    @endforeach
                </div>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                        </div>
                        <input type="number" name="quantity" class="form-control bg-primary text-center qty-input"
                            value="1" min="1">
                        <div class="input-group-btn">
                        </div>
                    </div>
                    <button type="submit" value="Add To cart" class="form-control bg-primary text-center qty-input">
                        <a href="{{route('welcome.product.cart')}}" class="btn btn-sm text-dark p-0">Add To
                            Cart</a></button>

                </div>
            </form>
            <div class="d-flex pt-2">
                <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                <div class="d-inline-flex">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-pinterest"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- Shop Detail End -->


<!-- Products Start -->
<div class="container-fluid py-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
    </div>
    <div class="row px-xl-5">
        @foreach ($featured_products as $prods)
        <div class="col">
            <div class="owl-carousel related-carousel">
                <div class="card product-item border-0">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="/storage/{{ $prods->image }}" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">{{ $prods->name }}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>{{ $prods->selling_price }}</h6>
                            <h6 class="text-muted ml-2"><del>{{ $prods->selling_price }}</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View
                            Detail</a>
                        <a href="" class="btn btn-sm text-dark p-0"><i
                                class="fas fa-shopping-cart text-primary mr-1 AddToCartBtn"></i>Add To Cart</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Products End -->


<!-- {{-- <script>
        $(document).ready(function() {

            $('.AddToCartBtn').click(function(e) {
                e.preventDefault();
            })
            $('#increment').click(function(e) {
                e.preventDefault();
                var inc_value = $('.qty-input').val();
                var value = parseInt(inc_value, 15);
                value = isNaN(value) ? 0 : value;
                if (value < 15) {
                    value++;
                    $('.qty-input').val(value);
                }
            })
            $('.decrement').click(function(e) {
                e.preventDefault();
                var dec_value = $('.qty-input').val();
                var value = parseInt(dec_value, 15);
                value = isNaN(value) ? 0 : value;
                if (value > 1) {
                    value--;
                    $('.qty-input').val(value);
                }
            })
        });

    </script>  -->
@endsection