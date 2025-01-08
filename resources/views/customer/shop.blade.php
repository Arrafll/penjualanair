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
                                <form class="d-flex flex-wrap align-items-center" method="get">
                                    <label for="inputPassword2" class="visually-hidden">Search</label>
                                    <div class="me-3">
                                        <input type="search" name="search_product" class="form-control my-1 my-lg-0"
                                            id="inputPassword2" placeholder="Search..." value="{{ old('search_product') }}">
                                    </div>
                                    <label for="status-select" class="me-2">Sort By</label>
                                    <div class="me-sm-3">
                                        <select class="form-select my-1 my-lg-0" id="status-select" name="price"
                                            value="{{ old('price') }}">
                                            <option value="">All</option>
                                            <option value="asc">Price Low</option>
                                            <option value="desc">Price High</option>
                                        </select>
                                    </div>

                            </div>
                            <div class="col-auto">
                                <div class="text-lg-end my-1 my-lg-0">
                                    <button type="submit" class="btn btn-success waves-effect waves-light"><i
                                            class="mdi mdi-magnify me-1"></i> Search</button>
                                </div>
                            </div><!-- end col-->
                            </form>
                        </div> <!-- end row -->
                    </div>
                </div> <!-- end card -->
            </div> <!-- end col-->
        </div>
        <!-- end row-->

        <div class="row">
            @if ($product->count() < 1)
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-xl-4 mb-4">
                        <div class="error-text-box">
                            <svg viewBox="0 0 600 200">
                                <!-- Symbol-->
                                <symbol id="s-text">
                                    <text text-anchor="middle" x="50%" y="50%" dy=".35em">Oops!</text>
                                </symbol>
                                <!-- Duplicate symbols-->
                                <use class="text" xlink:href="#s-text"></use>
                                <use class="text" xlink:href="#s-text"></use>
                                <use class="text" xlink:href="#s-text"></use>
                                <use class="text" xlink:href="#s-text"></use>
                                <use class="text" xlink:href="#s-text"></use>
                            </svg>
                        </div>
                        <div class="text-center">
                            <p class="text-muted mb-3">Produk belum tersedia! Tunggu pembaruan produk selanjunya atau
                                silahkan pilih
                                produk lain.</p>
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
            @else
                @foreach ($product as $p)
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="card product-box ribbon-box"
                            onclick="window.location.href=`{{ route('customer_detail_product', ['id' => $p->id]) }}`"
                            style="cursor:pointer">
                            <div class="card-body">

                                <div
                                    class="ribbon-two @if ($p->stock > 0) ribbon-two-success @else ribbon-two-danger @endif">
                                    <span>
                                        @if ($p->stock > 0)
                                            Tersedia
                                        @else
                                            Habis
                                        @endif
                                    </span>
                                </div>
                                <div class="product-action">

                                </div>

                                <div class="bg-light">
                                    <img src="{{ 'uploads/product/' . $p->attachment->first()->name }}" alt="product-pic"
                                        class="img-fluid" style="object-fit:contain" />
                                </div>

                                <div class="product-info">
                                    <div class="row align-items-center">
                                        <div class="col-md-12 d-flex justify-content-between">

                                            <h5 class="font-16 mt-0 sp-line-1"><a
                                                    href="{{ route('customer_detail_product', ['id' => $p->id]) }}"
                                                    class="text-dark" title="{{ $p->name }}" tabindex="0"
                                                    data-plugin="tippy" data-tippy-theme="gradient"
                                                    data-tippy-placement="top">
                                                    {{ strlen($p->name) > 25 ? substr($p->name, 0, 22) . '...' : $p->name }}</a>
                                            </h5>
                                        </div>
                                        <div class="col-md-12 d-flex justify-content-between align-items-center">
                                            <div class="col-md-6">
                                                <h5 class="text-info">{{ toCurrency($p->price, 'IDN') }}</h5>
                                            </div>
                                            <div class="col-md-6 text-end font-13">
                                                <i class="mdi mdi-star text-warning me-1"></i>{{ $p->rating }}
                                            </div>
                                            {{-- <h5 class=""> <span class="text-muted"></span>
                                            </h5> --}}
                                        </div>
                                        <div class="col-md-12">
                                        </div>
                                    </div> <!-- end row -->
                                </div> <!-- end product info-->
                            </div>
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                @endforeach
            @endif
        </div>

        <!-- end row-->
        @if ($product->count() > 1)
            <div class="row">
                {{ $product->links('layout.pagination') }}
            </div>
        @endif
        <!-- end row-->

    </div> <!-- container -->
    <script>
        $('.product-box').mouseenter(function() {
            $(this).addClass("border border-info")
        })
        $('.product-box').mouseleave(function() {
            $(this).removeClass("border border-info")
        })
    </script>
@endsection
