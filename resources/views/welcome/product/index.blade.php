@extends('layout.app')

@section('title')
    Welcome TO E-commerce Shop
@endsection
@section('content')
    <div class="container-fluid pt-5">
        <form method="GET" action="{{ route('welcome.product.index') }}">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">

                    <a href="{{ route('welcome.product.index') }}" class="btn btn-primary btn-block mt-3 mb-3" >Reset </a>

                <!-- Price Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filter by price</h5>

                        {{-- <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="" class="custom-control-input" checked id="price-all">
                            <label class="custom-control-label" for="price-all">All Price</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div> --}}
                        <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" class="custom-control-input" id="price-1" name="price_range"
                                value="0-100" {{ request('price_range') == '0-100' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="price-1">$0 - $100</label>
                            {{-- <button class="custom-control-label" type="submit"> $0 - $100</button> --}}
                            {{-- <span class="badge border font-weight-normal">150</span> --}}
                        </div>
                        <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" class="custom-control-input" id="price-2" name="price_range"
                                value="100-200" {{ request('price_range') == '100-200' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="price-2">$100 - $200</label>
                            {{-- <span class="badge border font-weight-normal">295</span> --}}
                        </div>
                        <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" class="custom-control-input" id="price-3" name="price_range"
                                value="200-300" {{ request('price_range') == '200-300' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="price-3">$200 - $300</label>
                            {{-- <span class="badge border font-weight-normal">246</span> --}}
                        </div>
                        <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" class="custom-control-input" id="price-4" name="price_range"
                                value="300-400" {{ request('price_range') == '300-400' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="price-4">$300 - $400</label>
                            {{-- <span class="badge border font-weight-normal">145</span> --}}
                        </div>
                        <div class="custom-control custom-radio d-flex align-items-center justify-content-between">
                            <input type="radio" class="custom-control-input" id="price-5" name="price_range"
                                value="400-500" {{ request('price_range') == '400-500' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="price-5">$400 - $500</label>
                            {{-- <span class="badge border font-weight-normal">168</span> --}}
                        </div>
                        <!-- <button class="btn btn-primary btn-block mt-3" type="submit">Filter</button> -->

                </div>
                <!-- Price End -->

                <!-- Color Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filter by color</h5>

                        <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" class="custom-control-input" id="color-1" name="color" value="Black"
                                {{ request('color') == 'Black' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="color-1">Black</label>
                            {{-- <span class="badge border font-weight-normal">150</span> --}}
                        </div>
                        <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" class="custom-control-input" id="color-2" name="color" value="White"
                                {{ request('color') == 'White' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="color-2">White</label>
                            {{-- <span class="badge border font-weight-normal">295</span> --}}
                        </div>
                        <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" class="custom-control-input" id="color-3" name="color" value="Red"
                                {{ request('color') == 'Red' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="color-3">Red</label>
                            {{-- <span class="badge border font-weight-normal">246</span> --}}
                        </div>
                        <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" class="custom-control-input" id="color-4" name="color" value="Blue"
                                {{ request('color') == 'Blue' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="color-4">Blue</label>
                            {{-- <span class="badge border font-weight-normal">145</span> --}}
                        </div>
                        <div class="custom-control custom-radio d-flex align-items-center justify-content-between">
                            <input type="radio" class="custom-control-input" id="color-5" name="color" value="Green"
                                {{ request('color') == 'Green' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="color-5">Green</label>
                            {{-- <span class="badge border font-weight-normal">168</span> --}}
                        </div>
                        <!-- <button class="btn btn-primary btn-block mt-3" type="submit">Filter</button> -->

                </div>
                <!-- Color End -->

                <!-- Size Start -->
                <div class="mb-5">
                    <h5 class="font-weight-semi-bold mb-4">Filter by size</h5>

                        <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" class="custom-control-input" id="size-1" name="size"
                                value="XS" {{ request('size') == 'XS' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="size-1">XS</label>
                            {{-- <span class="badge border font-weight-normal">150</span> --}}
                        </div>
                        <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" class="custom-control-input" id="size-2" name="size"
                                value="S" {{ request('size') == 'S' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="size-2">S</label>
                            {{-- <span class="badge border font-weight-normal">295</span> --}}
                        </div>
                        <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" class="custom-control-input" id="size-3" name="size"
                                value="M" {{ request('size') == 'M' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="size-3">M</label>
                            {{-- <span class="badge border font-weight-normal">246</span> --}}
                        </div>
                        <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" class="custom-control-input" id="size-4" name="size"
                                value="L" {{ request('size') == 'L' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="size-4">L</label>
                            {{-- <span class="badge border font-weight-normal">145</span> --}}
                        </div>
                        <div class="custom-control custom-radio d-flex align-items-center justify-content-between">
                            <input type="radio" class="custom-control-input" id="size-5" name="size"
                                value="XL" {{ request('size') == 'XL' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="size-5">XL</label>
                            {{-- <span class="badge border font-weight-normal">168</span> --}}
                        </div>
                        <button class="btn btn-primary btn-block mt-3" type="submit">Filter</button>

                </div>
                <!-- Size End -->

            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">

                                <div class="input-group">
                                    <input type="text" name="search" class="form-control"
                                        placeholder="Search by name">
                                    <div class="input-group-append">
                                        <button type="submit" class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>

                            <div class="dropdown ml-4">

                                    <button class="btn border dropdown-toggle" type="button" id="triggerId"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Sort by
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                        <button class="dropdown-item" type="submit" name="sort" value="latest"
                                            href="#">Latest</button>
                                        <button class="dropdown-item" type="submit" name="sort" value="oldest"
                                            href="#">oldest</button>
                                    </div>

                            </div>
                        </div>
                    </div>
                    @foreach ($products as $prods)
                        <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
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
                                <div class="card-footer d-flex justify-content-center bg-light border">
                                    <a href="{{ route('welcome.product.show', ['id' => $prods->id]) }}"
                                        class="btn btn-sm text-dark  p-0"><i class="fas fa-eye text-primary mr-1"></i>View
                                        Detail</a>
                                    {{-- <a href="{{ route('Addcart', ['id' => $prods->id]) }}"
                                        class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Add
                                        To Cart</a> --}}
                                </div>
                            </div>

                        </div>
                    @endforeach
                    <!-- <div class="col-12 pb-1">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center mb-3">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div> -->
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
        </form>
    </div>
@endsection
