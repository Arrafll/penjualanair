@extends('layout.main')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-auto">
                                <form class="d-flex flex-wrap align-items-center">
                                    <label for="inputPassword2" class="visually-hidden">Search</label>
                                    <div class="me-3">
                                        <input type="search" class="form-control my-1 my-lg-0" id="inputPassword2"
                                            placeholder="Search...">
                                    </div>
                                    <label for="status-select" class="me-2">Sort By</label>
                                    <div class="me-sm-3">
                                        <select class="form-select my-1 my-lg-0" id="status-select">
                                            <option selected="">All</option>
                                            <option value="1">Popular</option>
                                            <option value="2">Price Low</option>
                                            <option value="3">Price High</option>
                                            <option value="4">Sold Out</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="col-auto">
                                <div class="text-lg-end my-1 my-lg-0">
                                    <a href="ecommerce-product-edit.html"
                                        class="btn btn-success waves-effect waves-light"><i
                                            class="mdi mdi-magnify me-1"></i> Search</a>
                                </div>
                            </div><!-- end col-->
                        </div> <!-- end row -->
                    </div>
                </div> <!-- end card -->
            </div> <!-- end col-->
        </div>
        <!-- end row-->

        <div class="row">

            @foreach ($product as $p)
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card product-box">
                        <div class="card-body">
                            <div class="product-action">

                            </div>

                            <div class="bg-light">

                                <img src="{{ 'uploads/product/' . $p->attachment->first()->name }}" alt="product-pic"
                                    class="img-fluid" style="object-fit:contain" />
                            </div>

                            <div class="product-info">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h5 class="font-16 mt-0 sp-line-1"><a
                                                href="{{ route('customer_detail_product', ['id' => $p->id]) }}"
                                                class="text-dark"> {{ $p->name }}</a> </h5>
                                        <div class="text-warning mb-2 font-13">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <h5 class="m-0"> <span class="text-muted"> Stocks : {{ $p->stock }}</span>
                                        </h5>
                                    </div>
                                    <div class="col-auto">
                                        <div class="product-price-tag">
                                            {{ toCurrency($p->price, 'IDN') }}
                                        </div>
                                    </div>
                                </div> <!-- end row -->
                            </div> <!-- end product info-->
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col-->
            @endforeach


        </div>
        <!-- end row-->

        <div class="row">
            {{ $product->links('layout.pagination') }}
        </div>
        <!-- end row-->

    </div> <!-- container -->
@endsection
