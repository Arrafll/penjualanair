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
                            <li class="breadcrumb-item active"><a href="javascript: void(0);">Cart</a></li>
                            {{-- <li class="breadcrumb-item active">Cart</li> --}}
                        </ol>
                    </div>
                    <h4 class="page-title">Product</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        @session('cartDeleted')
            <script>
                loadSuccessSwal('Dihapus!', "{{ session('cartDeleted') }}")
            </script>
        @endsession
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-nowrap table-centered mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Produk</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <th>Total</th>
                                                <th style="width: 50px;"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($cart->count() > 0)
                                                @foreach ($cart as $c)
                                                    <tr>
                                                        <td>
                                                            <img src="{{ asset('uploads') }}/product/{{ $c->product_pic }}"
                                                                alt="contact-img" title="contact-img" class="rounded me-3"
                                                                height="48" />
                                                            <p class="m-0 d-inline-block align-middle font-16">
                                                                <a href="ecommerce-product-detail.html"
                                                                    class="text-reset font-family-secondary">{{ $c->product_name }}</a>
                                                            </p>
                                                        </td>
                                                        <td>
                                                            {{ toCurrency($c->price, 'IDN') }}
                                                        </td>
                                                        <td>
                                                            {{ $c->amount }}
                                                            <input type="hidden" min="1" value="{{ $c->amount }}"
                                                                class="form-control" placeholder="Qty" style="width: 90px;">
                                                        </td>
                                                        <td>
                                                            {{ toCurrency($c->amountPrice, 'IDN') }}
                                                        </td>
                                                        <td>
                                                            <a onclick="loadSwalDeleteConfirm('/customer_cart_delete/{{ $c->id }}')"
                                                                class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="5" class="text-center">Tidak ada data</td>

                                                </tr>
                                            @endif



                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive-->

                            </div>
                            <!-- end col -->

                            <div class="col-lg-4">
                                <div class="border p-3 mt-4 mt-lg-0 rounded">
                                    <h4 class="header-title mb-3">Order Summary</h4>

                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <tbody>
                                                <tr>
                                                    <th>Total Belanja:</th>
                                                    <th>{{ toCurrency($cart->sum('amountPrice'), 'IDN') }}</th>
                                                    <input type="hidden" name="amonuntPrice[]" value="">
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- end table-responsive -->
                                </div>


                            </div> <!-- end col -->

                        </div> <!-- end row -->
                        <div class="row">
                            <!-- action buttons-->
                            <div class="row mt-4">
                                <div class="col-sm-6">
                                </div> <!-- end col -->
                                <div class="col-sm-6">
                                    <div class="text-sm-end">
                                        @if ($cart->count() > 0)
                                            <a href="
                                        {{ route('customer_order_cart') }}"
                                                class="btn btn-danger"><i class="mdi mdi-cart-plus me-1"></i>
                                                Checkout </a>
                                        @endif
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end card-body-->

                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container -->

    <script>
        function loadSwalDeleteConfirm(url) {
            Swal.fire({
                title: "Anda yakin ingin menghapus produk ini?",
                text: "Data yang dihapus akan hilang sepenuhnya!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus produk ini!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        }
    </script>
@endsection
