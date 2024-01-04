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
                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                    <h5 class="text-dark font-weight-medium mb-0 mr-3">{{ $product->size }}</h5>
                    {{-- <form> --}}
                    {{-- <div class="custom-control custom-radio custom-control-inline"> --}}
                    {{-- <input type="radio" class="custom-control-input" id="size-1" name="size"> --}}
                    {{-- <label class="custom-control-label" for="size-1">{{ $product->description }}</label> --}}
                    {{-- </div> --}}
                    {{-- <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-2" name="size">
                            <label class="custom-control-label" for="size-2">S</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-3" name="size">
                            <label class="custom-control-label" for="size-3">M</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-4" name="size">
                            <label class="custom-control-label" for="size-4">L</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-5" name="size">
                            <label class="custom-control-label" for="size-5">XL</label>
                        </div> --}}
                    {{-- </form> --}}
                </div>
                <div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
                    <h5 class="text-dark font-weight-medium mb-0 mr-3">{{ $product->color }}</h5>
                    {{-- <form>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-1" name="color">
                            <label class="custom-control-label" for="color-1">Black</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-2" name="color">
                            <label class="custom-control-label" for="color-2">White</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-3" name="color">
                            <label class="custom-control-label" for="color-3">Red</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-4" name="color">
                            <label class="custom-control-label" for="color-4">Blue</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-5" name="color">
                            <label class="custom-control-label" for="color-5">Green</label>
                        </div>
                    </form> --}}
                </div>
                <form action="{{ route('Addcart', ['id' => $product->id]) }}" method="GET">
                    <div class="d-flex align-items-center mb-4 pt-2">

                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                            </div>
                            <input type="number" name="quantity" class="form-control bg-secondary text-center qty-input"
                                value="1" min="1">
                            <div class="input-group-btn">
                            </div>
                        </div>

                        {{-- @foreach ($featured_products as $prods) --}}
                        <input type="submit" value="Add To cart" class="form-control bg-secondary text-center qty-input"
                        value="1" min="1">
                        {{-- <a href="{{ route('welcome.product.cart', ['id' => $product->id]) }}"
                            class="btn btn-sm text-dark p-0 mt-4"><i class="fas fa-eye text-primary mr-1"></i>Add
                            To Cart</a> --}}

                        {{-- @endforeach     --}}
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
                            <div
                                class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
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
                                <a href="" class="btn btn-sm text-dark p-0"><i
                                        class="fas fa-eye text-primary mr-1"></i>View Detail</a>
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


    {{-- <script>
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
       
    </script> --}}
@endsection
