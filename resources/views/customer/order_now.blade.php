@extends('layout.main')
@section('content')
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->


    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">AirMoo</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a></li>
                                <li class="breadcrumb-item active">Checkout</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Checkout</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="nav nav-pills flex-column navtab-bg nav-pills-tab text-center"
                                        id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active show py-2" id="custom-v-pills-billing-tab"
                                            data-bs-toggle="pill" href="#custom-v-pills-billing" role="tab"
                                            aria-controls="custom-v-pills-billing" aria-selected="true">
                                            <i class="mdi mdi-account-circle d-block font-24"></i>
                                            Billing Info
                                        </a>
                                        <a class="nav-link mt-2 py-2" id="custom-v-pills-shipping-tab" data-bs-toggle="pill"
                                            href="#custom-v-pills-shipping" role="tab"
                                            aria-controls="custom-v-pills-shipping" aria-selected="false">
                                            <i class="mdi mdi-truck-fast d-block font-24"></i>
                                            Shipping Info</a>
                                        <a class="nav-link mt-2 py-2" id="custom-v-pills-payment-tab" data-bs-toggle="pill"
                                            href="#custom-v-pills-payment" role="tab"
                                            aria-controls="custom-v-pills-payment" aria-selected="false">
                                            <i class="mdi mdi-cash-multiple d-block font-24"></i>
                                            Payment Info</a>
                                    </div>

                                    <div class="border mt-4 rounded">
                                        <h4 class="header-title p-2 mb-0">Order Summary</h4>

                                        <form action="{{ route('customer_checkout') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="order_type" value="direct">
                                            <input type="hidden" name="userdata_id" value="{{ $userData->id }}">
                                            <div class="table-responsive">
                                                <table class="table table-centered table-nowrap mb-0">
                                                    <tbody>
                                                        <input type="hidden" name="product_ids[]"
                                                            value="{{ $product->id }}">
                                                        <input type="hidden" name="amounts[]"
                                                            value="{{ $product->amount }}">
                                                        <input type="hidden" name="prices[]" value="{{ $product->price }}">
                                                        <tr>

                                                            <td style="width: 90px;">
                                                                <img src="{{ asset('uploads') }}/product/{{ $product->attachment[0]->name }}"
                                                                    alt="product-img" title="product-img" class="rounded"
                                                                    height="48" />
                                                            </td>
                                                            <td>
                                                                <a href="ecommerce-product-detail.html"
                                                                    class="text-body fw-semibold">{{ $product->name }}</a>
                                                                <small class="d-block">{{ $product->amount }} x
                                                                    {{ toCurrency($product->price, 'IDN') }}</small>
                                                            </td>

                                                            <td class="text-end">
                                                                {{ toCurrency($product->price, 'IDN') }}
                                                            </td>
                                                        </tr>
                                                        <tr class="text-end">

                                                            <input type="hidden" name="subtotal" id="subtotal-form"
                                                                value="{{ $product->subtotal }}">
                                                            <td colspan="2">
                                                                <h6 class="m-0">Sub Total:</h6>
                                                            </td>
                                                            <td class="text-end">
                                                                {{ toCurrency($product->subtotal, 'IDN') }}
                                                            </td>
                                                        </tr>
                                                        <tr class="text-end">
                                                            <td colspan="2">
                                                                <h6 class="m-0">Shipping:</h6>
                                                            </td>
                                                            <td class="text-end" id="shipping-type">
                                                                FREE
                                                            </td>
                                                        </tr>
                                                        <tr class="text-end">
                                                            <input type="hidden" name="total_payment"
                                                                id="total-payment-form">
                                                            <td colspan="2">
                                                                <h5 class="m-0">Total:</h5>
                                                            </td>
                                                            <td class="text-end fw-semibold" id="total-payment">
                                                                {{ toCurrency($product->subtotal, 'IDN') }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- end table-responsive -->
                                    </div> <!-- end .border-->
                                </div> <!-- end col-->
                                <div class="col-lg-8">
                                    <div class="tab-content p-3">
                                        <div class="tab-pane fade active show" id="custom-v-pills-billing"
                                            role="tabpanel" aria-labelledby="custom-v-pills-billing-tab">
                                            <div>
                                                <h4 class="header-title">Billing Information</h4>

                                                <p class="sub-header">Fill the form below in order to
                                                    send you the order's invoice.</p>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="billing-first-name" class="form-label">
                                                                Nama <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text"
                                                                placeholder="Enter your first name"
                                                                id="billing-first-name" value="{{ $user->name }}"
                                                                readonly />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="billing-email-address" class="form-label">Email
                                                                <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="email"
                                                                placeholder="Enter your email" id="billing-email-address"
                                                                value="{{ $user->email }}" readonly />
                                                        </div>
                                                    </div>
                                                </div> <!-- end row -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="billing-phone" class="form-label">Telepon
                                                                <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text"
                                                                placeholder="(xx) xxx xxxx xxx" id="billing-phone"
                                                                name="telepon" value="{{ $userData->telepon }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="billing-phone" class="form-label">Handphone
                                                                <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text"
                                                                placeholder="(xx) xxx xxxx xxx" id="billing-phone"
                                                                name="handphone" value="{{ $userData->no_hp }}" />
                                                        </div>
                                                    </div>
                                                </div> <!-- end row -->
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="billing-address" class="form-label">Alamat</label>
                                                            <textarea class="form-control" id="example-textarea" rows="3" name="alamat" placeholder="Write some note..">{{ $userData->alamat }}</textarea>
                                                        </div>
                                                    </div>
                                                </div> <!-- end row -->
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="billing-town-city" class="form-label">Kota</label>
                                                            <input class="form-control" type="text"
                                                                placeholder="Masukkan nama kota" id="billing-town-city"
                                                                name="kota" value="{{ $userData->kota }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="billing-state" class="form-label">Provinsi</label>
                                                            <input class="form-control" type="text"
                                                                placeholder="Masukkan nama provinsi" id="billing-state"
                                                                name="provinsi" value="{{ $userData->provinsi }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="billing-zip-postal" class="form-label">Kode
                                                                Pos</label>
                                                            <input class="form-control" type="text"
                                                                placeholder="Enter your zip code" id="billing-zip-postal"
                                                                name="kode_pos" value="{{ $userData->kode_pos }}" />
                                                        </div>
                                                    </div>
                                                </div> <!-- end row -->

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="my-3">
                                                            <label for="example-textarea" class="form-label">Catatan
                                                            </label>
                                                            <textarea class="form-control" id="example-textarea" name="catatan" rows="3"
                                                                placeholder="Tulis catatan pesanan anda.."></textarea>
                                                        </div>
                                                    </div>
                                                </div> <!-- end row -->

                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="custom-v-pills-shipping" role="tabpanel"
                                            aria-labelledby="custom-v-pills-shipping-tab">
                                            <div>

                                                <h4 class="header-title mt-4">Pengiriman</h4>

                                                <p class="text-muted mb-3">Pilih metode pengiriman yang tersedia dibawah
                                                    ini.</p>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="border p-3 rounded mb-3">
                                                            <div class="form-check">
                                                                <input type="radio" id="shippingMethodRadio1"
                                                                    name="shippingOptions" class="form-check-input"
                                                                    value="free" checked>
                                                                <label class="form-check-label font-16 fw-bold"
                                                                    for="shippingMethodRadio1">Standard Delivery -
                                                                    FREE</label>
                                                            </div>
                                                            <p class="mb-0 ps-3 pt-1">Estimated 5-7 days shipping
                                                                (Duties and tax may be due upon delivery)</p>
                                                        </div>

                                                        <div class="border p-3 rounded">
                                                            <div class="form-check">
                                                                <input type="radio" id="shippingMethodRadio2"
                                                                    name="shippingOptions" class="form-check-input"
                                                                    value="fast">
                                                                <label class="form-check-label font-16 fw-bold"
                                                                    for="shippingMethodRadio2">Fast -
                                                                    {{ toCurrency(8000, 'IDN') }}</label>
                                                            </div>
                                                            <p class="mb-0 ps-3 pt-1">Estimated 1-2 days shipping
                                                                (Duties and tax may be due upon delivery)</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end row-->
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="custom-v-pills-payment" role="tabpanel"
                                            aria-labelledby="custom-v-pills-payment-tab">
                                            <div>
                                                <h4 class="header-title">Metode Pembayaran</h4>

                                                <p class="sub-header">Pilih metode pembayaran anda.</p>


                                                <!-- Credit/Debit Card box-->
                                                <div class="border p-3 mb-3 rounded">
                                                    <div class="float-end">
                                                        <i class="far fa-credit-card font-24 text-primary"></i>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="radio" id="BillingOptRadio1" name="billingOptions"
                                                            class="form-check-input" value="Bank" checked>
                                                        <label class="form-check-label font-16 fw-bold"
                                                            for="BillingOptRadio1">Transfer Bank</label>
                                                    </div>
                                                    <p class="mb-0 ps-3 pt-1">Membayar tagihan dengan melakukan transfer
                                                        bank ke
                                                        rekening <b>BCA - 74373473</b>. <br>
                                                        Setelah
                                                        transfer, lakukan upload bukti pembayaran.
                                                    </p>

                                                    <div class="row mt-4">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="card-name-on" class="form-label">Nama
                                                                    Rekening</label>
                                                                <input type="text" id="card-name-on"
                                                                    class="form-control"
                                                                    placeholder="Masukkan nama rekening" value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="card-name-on" class="form-label">Bukti
                                                                    Transfer</label>
                                                                <input type="file" id="example-fileinput"
                                                                    name="file-transfer" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div> <!-- end row -->

                                                </div>
                                                <!-- end Credit/Debit Card box-->

                                                <!-- Cash on Delivery box-->
                                                <div class="border p-3 mb-3 rounded">
                                                    <div class="float-end">
                                                        <i class="fas fa-money-bill-alt font-24 text-primary"></i>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="radio" id="BillingOptRadio4" value="Cod"
                                                            name="billingOptions" class="form-check-input">
                                                        <label class="form-check-label font-16 fw-bold"
                                                            for="BillingOptRadio4">Cash on Delivery</label>
                                                    </div>
                                                    <p class="mb-0 ps-3 pt-1">Melakukan pembayaran saat barang sampai pada
                                                        tujuan.</p>
                                                </div>
                                                <!-- end Cash on Delivery box-->
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-sm-6">
                                                <a href="ecommerce-cart.html" class="btn btn-secondary">
                                                    <i class="mdi mdi-arrow-left"></i> Back to Shopping Cart
                                                </a>
                                            </div> <!-- end col -->
                                            <div class="col-sm-6">
                                                <div class="text-sm-end mt-2 mt-sm-0">
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="mdi mdi-cash-multiple me-1"></i> Pesan </button>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>
                                </div> <!-- end col-->
                            </div> <!-- end row-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->


    <script>
        $('input[type=radio][name=shippingOptions]').change(function() {
            let extraPay = 0;
            if ($(this).val() == 'fast') extraPay = 8000;

            let subtotal = $('#subtotal-form').val();
            let total = Number(subtotal) + Number(extraPay);

            $('#total-payment-form').val(total);
            $('#total-payment').html(`Rp ${formatNum(total)}`);

            $('#shipping-type').html($(this).val().toUpperCase());
            $('#shipping-type').html($(this).val().toUpperCase());

            function formatNum(rawNum) {
                rawNum = "" + rawNum; // converts the given number back to a string
                var retNum = "";
                var j = 0;
                for (var i = rawNum.length; i > 0; i--) {
                    j++;
                    if (((j % 3) == 1) && (j != 1))
                        retNum = rawNum.substr(i - 1, 1) + "." + retNum;
                    else
                        retNum = rawNum.substr(i - 1, 1) + retNum;
                }
                return retNum;
            }
        });
    </script>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
@endsection