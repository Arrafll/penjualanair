@extends('layout.main')
@section('content')
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
    <div class="content">
        <div class="content-page">
            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row mt-2">
                    <div class="col-lg-12">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-7">
                                    <img src="https://i.pinimg.com/originals/5a/7f/1e/5a7f1eff255d5e1d91e542d67c8be256.jpg"
                                        alt="..." class="img-fluid min-vh-75">
                                </div>
                                <div class="col-md-5">
                                    <div class="card-body">
                                        <h2 class="text-info mt-5">Selamat Datang, {{ auth()->user()->name }} !</h2>
                                        <p class="card-text mt-3 lh-lg" style="text-align:justify"> Airmoo adalah platform
                                            e-commerce
                                            inovatif
                                            yang
                                            menyediakan berbagai pilihan air bersih berkualitas untuk kebutuhan rumah
                                            tangga, bisnis, dan industri. Dengan hanya beberapa klik, Anda dapat memesan
                                            air
                                            minum, air mineral, atau air galon langsung ke lokasi Anda.</p>
                                        <p>Nikmati pengalaman berbelanja air yang praktis dan terpercaya hanya di Airmoo.
                                            Ayo belanja sekarang!
                                        </p>

                                        <button type="button"
                                            class="btn btn-outline-info rounded-pill waves-effect waves-light mt-3">Belanja
                                            Sekarang</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">Produk Terbaru</h4>
                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Produk</th>
                                                <th class="border-top-0">Satuan</th>
                                                <th class="border-top-0">Tanggal Ditambahkan</th>
                                                <th class="border-top-0">Harga</th>
                                                <th class="border-top-0">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($product->count() > 0)
                                                @foreach ($product as $p)
                                                    <tr>
                                                        <td>
                                                            <img src="{{ asset('uploads/product') . '/' . $p->product_pic }}"
                                                                alt="product-pic" height="36" />
                                                            <span class="ms-2">{{ $p->name }}</span>
                                                        </td>
                                                        <td>
                                                            {{ $p->unit }}
                                                        </td>
                                                        <td>{{ $p->created_at }}</td>
                                                        <td>{{ toCurrency($p->price, 'IDN') }}</td>


                                                        <td>
                                                            @if ($p->stock > 0)
                                                                <span
                                                                    class="badge bg-soft-success text-success">Tersedia</span>
                                                            @else
                                                                <span class="badge bg-soft-danger text-danger">Habis</span>
                                                            @endif

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="5" class="text-center">Data tidak tersedia</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive -->
                            </div>
                        </div> <!-- end card-->

                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">Transaksi Terbaru</h4>

                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Kode</th>
                                                <th class="border-top-0">Tanggal</th>
                                                <th class="border-top-0">Total</th>
                                                <th class="border-top-0">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($order->count() > 0)
                                                @foreach ($order as $o)
                                                    <tr>
                                                        <td>
                                                            <span>{{ $o->code }}</span>
                                                        </td>
                                                        <td>
                                                            {{ $o->created_at }}
                                                        </td>
                                                        <td> {{ $o->created_at }}</td>
                                                        <td>$345.98</td>
                                                        <td><span class="badge bg-soft-success text-success">Active</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="5" class="text-center">Data tidak tersedia</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive -->
                            </div>
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                    <div class="col-lg-4">
                        <div class="card">
                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active card-img img-fluid" data-bs-interval="3500">
                                        <img class="d-block img-fluid"
                                            src="{{ asset('templates/assets/images/product/Aqua Botol.jpg') }}"
                                            alt="First slide">
                                    </div>
                                    <div class="carousel-item card-img img-fluid" data-bs-interval="3500">
                                        <img class="d-block img-fluid"
                                            src="{{ asset('templates/assets/images/product/le minerale.jpg') }}"
                                            alt="Second slide">
                                    </div>
                                    <div class="carousel-item card-img img-fluid" data-bs-interval="3500">
                                        <img class="d-block img-fluid"
                                            src="{{ asset('templates/assets/images/product/Fiji.jpg') }}"
                                            alt="Third slide">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">


                        </div>
                    </div> <!-- end col -->


                </div> <!-- end col -->

            </div> <!-- container -->
        </div>
    </div> <!-- content -->

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
@endsection
