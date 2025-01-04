@extends('layout.main')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Airmoo</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a></li>
                            <li class="breadcrumb-item active">Detail</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Product</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        @session('cartAdded')
            <script>
                loadSuccessSwal('Ditambahkan!', "{{ session('cartAdded') }}")
            </script>
        @endsession
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5">

                                <div class="tab-content pt-0">

                                    @foreach ($product->attachment as $item)
                                        <div class="tab-pane @if ($loop->first) active show @endif"
                                            id="product-{{ $item->id }}-item">
                                            <img src="{{ asset('uploads') }}/product/{{ $item->name }}" alt=""
                                                class="img-fluid mx-auto d-block rounded">
                                        </div>
                                    @endforeach
                                </div>

                                <ul class="nav nav-pills nav-justified">
                                    @if ($product->attachment->count() > 1)
                                        @foreach ($product->attachment as $item)
                                            <li class="nav-item">
                                                <a href="#product-{{ $item->id }}-item" data-bs-toggle="tab"
                                                    aria-expanded="false"
                                                    class="nav-link product-thumb @if ($loop->first) active show @endif">
                                                    <img src="{{ asset('uploads') }}/product/{{ $item->name }}"
                                                        alt="" class="img-fluid mx-auto d-block rounded">
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif

                                </ul>
                            </div> <!-- end col -->
                            <div class="col-lg-7">
                                <div class="ps-xl-3 mt-3 mt-xl-0">
                                    <a href="#" class="text-primary">{{ $product->brand }}</a>
                                    <h4 class="mb-3">{{ $product->name }}</h4>
                                    <p class="text-muted float-start me-3">
                                        <span class="mdi mdi-star text-warning"></span>
                                        <span class="mdi mdi-star text-warning"></span>
                                        <span class="mdi mdi-star text-warning"></span>
                                        <span class="mdi mdi-star text-warning"></span>
                                        <span class="mdi mdi-star"></span>
                                    </p>
                                    <p class="mb-4"><a href="" class="text-muted">( 36 Customer Reviews )</a></p>
                                    <h4 class="mb-4">Harga : <b>{{ toCurrency($product->price, 'IDN') }}</b></h4>
                                    <h4>

                                        @if ($product->stock > 0)
                                            <span class="badge bg-soft-success text-success mb-2">Tersedia</span>
                                        @else
                                            <span class="badge bg-soft-danger text-success mb-2">Habis</span>
                                        @endif
                                    </h4>
                                    <p class="text-muted mb-4">{!! $product->description !!}</p>

                                    <form class="d-flex flex-wrap align-items-center mb-4">
                                        <label class="my-1 me-2" for="quantityinput">Quantity</label>
                                        <div class="col-md-2 me-2">
                                            <input type="number" name="" id="amount-buy" class="form-control my-1"
                                                value="1" max="{{ $product->stock }}">
                                        </div>
                                        <label class="my-1 me-2" for="sizeinput">Unit</label>
                                        <div class="me-sm-3">
                                            <select class="form-select my-1" id="sizeinput" @readonly(true)>
                                                <option selected>{{ $product->unit }}</option>
                                            </select>
                                        </div>
                                    </form>
                                    <div>

                                        <button class="btn btn-info waves-effect waves-light" onclick="addcart()"><i
                                                class="mdi
                                            mdi-cart-outline me-1"></i>
                                            Masukkan
                                            Keranjang</button>

                                        <input type="hidden" name="product_id" value="{{ $product->id }}"
                                            form="order-now" id="product_id">
                                        <input type="hidden" class="amount-buy-checkout" name="amount" value="1"
                                            form="order-now" id="amount-buy">
                                        <button class="btn btn-success waves-effect waves-light" onclick="buynow()"><i
                                                class="mdi
                                            mdi-book-check-outline me-1"></i>
                                            Beli Sekarang</a>

                                    </div>

                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div>
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>
        <!-- end row-->

    </div> <!-- container -->

    <script>
        let productId = $('#product_id').val();

        function buynow() {
            let amount = $('#amount-buy').val();
            let url = `/customer_order_now/${productId}/${amount}`
            window.location.href = url;
        }

        function addcart() {
            let amount = $('#amount-buy').val();
            let url = `/customer_cart_add/${productId}/${amount}`
            window.location.href = url;
        }
    </script>
@endsection
