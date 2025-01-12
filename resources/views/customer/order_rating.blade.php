@extends('layout.main')
@section('content')
    @session('successCheckout')
        <script>
            loadSuccessSwal('Sukses!', "{{ session('successCheckout') }}")
        </script>
    @endsession
    @session('customer_order_detail')
        <script>
            loadSuccessSwal('Pembayaran Berhasil!', "{{ session('customer_order_detail') }}")
        </script>
    @endsession
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                            <li class="breadcrumb-item active">Order Detail</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Order Detail</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <!-- sample modal content -->
        <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Pembayaran</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <form action="/customer_order_payment" method="post" id="form-payorder"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                            <input type="hidden" name="order_code" value="{{ $order->code }}">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="field-1" class="form-label">Nomor Rekening</label>
                                    <input type="text" data-error-label="Nomor rekening" name="nomor_rekening"
                                        class="form-control input-form-payorder" id="field-1"
                                        placeholder="XXXX XXXX XXXX">
                                    <div id="" class="invalid-feedback d-none">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="field-3" class="form-label">Bukti Transfer</label>
                                    <input type="file" data-error-label="Bukti transfer" name="bukti_transfer"
                                        id="example-fileinput" class="form-control file-form-payorder">
                                    <div id="" class="invalid-feedback d-none">
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Batal</button>
                        <button type="button" onclick="checkFormData('form-payorder')"
                            class="btn btn-success waves-effect waves-light">Bayar</button>
                    </div>

                    </form>
                </div>
            </div>
        </div><!-- /.modal -->


        <div class="row">

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-1">Informasi Pesanan</h4>

                        <p class="mb-1 text-muted"><span class="fw-semibold me-2">{{ $order->code }}</p>
                        <p class="mb-3"> {!! getOrderStatusLabel($order->status) !!} </p>
                        <h5 class="font-family-primary fw-semibold">{{ $user->name }}</h5>
                        <p class="mb-2"><span class="fw-semibold me-2">Email :</span> {{ $user->email }}</p>
                        <p class="mb-2"><span class="fw-semibold me-2">Address :</span> {{ $userData->alamat }},
                            {{ $userData->kota }}, {{ $userData->provinsi }}, {{ $userData->kode_pos }}</p>
                        <p class="mb-2"><span class="fw-semibold me-2">Phone :</span> {{ $userData->telepon }}</p>
                        <p class="mb-2"><span class="fw-semibold me-2">Handphone :</span>{{ $userData->no_hp }}</p>
                        <p class="mb-4"><span class="fw-semibold me-2">Catatan :</span>{{ $order->note }}</p>
                    </div>
                </div>

            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Penilaian</h4>
                        <form action="/customer_order_review" method="post">
                            @csrf
                            <div class="mb-2" style="max-height: 500px;overflow-y:scroll">
                                @foreach ($orderItems as $oi)
                                    <input type="hidden" name="items_id[]" value="{{ $oi->id }}">
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-sm-4">
                                                    <div class="d-flex align-items-start">
                                                        <img src="{{ '/uploads/product/' . $oi->product_pic }}"
                                                            alt="product-pic" class="img-fluid align-self-center "
                                                            style="object-fit:contain;height:100px;width:100%;" />
                                                        <div class="w-100">
                                                            <h4 class="mt-0 mb-2 font-16">{{ $oi->product_name }}</h4>

                                                            <p class="mb-0"><b>
                                                                    {{ toCurrency($oi->amountPrice, 'IDN') }}</b>
                                                            <p class="mb-1">{{ $oi->amount }}
                                                                {{ $oi->unit }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2  mb-2 mt-2">
                                                    <select class="star-rating"
                                                        data-options="{&quot;clearable&quot;:false, &quot;tooltip&quot;:false}"
                                                        name="items_rating[]" style="outline: none;">
                                                        <option value="">Select
                                                            a rating</option>
                                                        <option value="5">Excellent</option>
                                                        <option value="4">Very Good</option>
                                                        <option value="3">Average</option>
                                                        <option value="2">Poor</option>
                                                        <option value="1">Terrible</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <textarea class="form-control" id="example-textarea" placeholder="Tulis review anda." rows="3"
                                                        name="items_review[]"></textarea>
                                                </div> <!-- end col-->
                                            </div> <!-- end row -->
                                        </div>
                                    </div> <!-- end card-->
                                @endforeach
                            </div>
                            <div class="mb-0 text-end">
                                <button onclick="verifyRatingInput()"
                                    class="btn btn-success waves-effect waves-light">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container -->


    <script>
        var starRatingControl = new StarRating('.star-rating');

        function verifyRatingInput() {

        }

        function loadSwalInvalidRating(url) {
            Swal.fire({
                title: "Anda yakin ingin membatalkan pesanan ini?",
                text: "Pesanan ini tidak akan berlaku setelah dibatalkan.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, batalkan pesanan!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        }
    </script>
@endsection
