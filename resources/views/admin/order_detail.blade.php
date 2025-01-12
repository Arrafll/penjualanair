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


        <!-- Standard modal content -->
        <div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="standard-modalLabel">Bukti Pembayaran</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-0"><span class="fw-semibold me-2">Nomor Rekening :</span> {{ $order->pay_cred }}</p>
                        <hr>

                        <img src="{{ '/uploads/payment/' . $order->pay_attachment }}" alt="bukti-bayar" class="img-fluid"
                            style="object-fit:contain;height:400px;width:100%;" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
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
                        <div class="text-center">
                            @if ($order->status == 'Ordering')
                                <button type="button"
                                    onclick="loadSwalCancelConfirm('/admin_order_cancel/{{ $order->id }}')"
                                    class="btn btn-danger waves-effect waves-light">Batalkan
                                    Pesanan</button>
                                <button type="button"
                                    onclick="loadSwalProcessConfirm('memproses', '/admin_order_process/{{ $order->id }}')"
                                    class="btn btn-success waves-effect waves-light">Proses
                                    Pesanan</button>
                            @endif
                            @if ($order->status == 'Processing')
                                <button type="button"
                                    onclick="loadSwalProcessConfirm('mengirim', '/admin_order_ship/{{ $order->id }}')"
                                    class="btn btn-success waves-effect waves-light">Kirim
                                    Pesanan</button>
                            @endif

                            @if ($order->status == 'Shipping')
                                <button type="button"
                                    onclick="loadSwalProcessConfirm('menyelesaikan', '/admin_order_finish/{{ $order->id }}')"
                                    class="btn btn-success waves-effect waves-light">Selesaikan
                                    Pesanan</button>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Riwayat Pesanan</h4>
                        <div class="track-order-list">
                            <ul class="list-unstyled">
                                <li class="completed">
                                    <h5 class="mt-0 mb-1">Pesanan Dibuat</h5>
                                    <p class="text-muted">{{ $order->created_at }}<br>
                                        Pesanan berhasil dibuat.
                                    </p>
                                </li>
                                <li @if ($order->processed_at) class="completed" @endif>
                                    @if (!$order->processed_at && $order->payed_at)
                                        <span class="active-dot dot"></span>
                                    @endif
                                    <h5 class="mt-0 mb-1">Pembayaran</h5>
                                    <p class="text-muted">
                                        @if ($order->payed_at)
                                            {{ $order->payed_at }}<br>
                                        @endif
                                        Menunggu pembayaran dari pelanggan.
                                    </p>
                                </li>

                                @if ($order->status != 'Cancel')
                                    <li @if ($order->shiped_at) class="completed" @endif>
                                        @if (!$order->shiped_at && $order->processed_at)
                                            <span class="active-dot dot"></span>
                                        @endif
                                        <h5 class="mt-0 mb-1">Diproses</h5>
                                        <p class="text-muted">
                                            @if ($order->processed_at)
                                                {{ $order->processed_at }}<br>
                                            @endif
                                            Pesanan akan diproses setelah
                                            pembayaran valid.
                                        </p>
                                    </li>
                                    <li @if ($order->finished_at) class="completed" @endif>
                                        @if (!$order->finished_at && $order->shiped_at)
                                            <span class="active-dot dot"></span>
                                        @endif
                                        <h5 class="mt-0 mb-1">Dikirim</h5>
                                        <p class="text-muted">
                                            @if ($order->shiped_at)
                                                {{ $order->shiped_at }}<br>
                                            @endif
                                            Produk dikirim setelah diproses.
                                        </p>
                                    </li>
                                    <li @if ($order->finished_at) class="completed" @endif>
                                        @if ($order->finished_at)
                                            <span class="active-dot dot"></span>
                                        @endif
                                        <h5 class="mt-0 mb-1">Selesai</h5>
                                        <p class="text-muted">
                                            @if ($order->finished_at)
                                                {{ $order->finished_at }}<br>
                                            @endif
                                            Pesanan selesai dan produk diterima pelanggan.

                                        </p>
                                    </li>
                                @else
                                    <li class="completed">
                                        <span class="active-dot dot"></span>
                                        <h5 class="mt-0 mb-1">Dibatalkan</h5>
                                        <p class="text-muted">
                                            {{ $order->updated_at }}<br>
                                            Pesanan dibatalkan oleh pengguna atau pembayaran gagal.
                                        </p>
                                    </li>
                                @endif

                            </ul>

                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Rincian Pembayaran</h4>
                        <p class="mb-2"><span class="fw-semibold me-2">Metode : </span> {{ $order->method }}</p>
                        <p class="mb-3"><span class="fw-semibold me-2">Status : </span> {!! getPayStatusLabel($order->payment_status) !!}
                        </p>
                        @if ($order->method == 'Bank')
                            <button type="button" data-bs-toggle="modal" data-bs-target="#standard-modal"
                                class="btn btn-info btn-sm waves-effect waves-light mb-3">Lihat Pembayaran</button>
                        @endif

                        <div class="table-responsive mb-2" style="max-height:500px;">
                            <table class="table table-bordered table-centered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Jumlah</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderItems as $oi)
                                        <tr>
                                            <th scope="row">{{ $oi->product_name }}</th>
                                            <td>{{ $oi->amount }}</td>
                                            <td>{{ toCurrency($oi->price, 'IDN') }}</td>
                                            <td>{{ toCurrency($oi->amountPrice, 'IDN') }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th scope="row" colspan="3" class="text-end">Sub Total :</th>
                                        <td>
                                            <div class="fw-bold">{{ toCurrency($orderItems->sum('amountPrice'), 'IDN') }}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" colspan="3" class="text-end">Shipping Charge :</th>
                                        <td>
                                            @if ($order->delivery == 'fast')
                                                {{ toCurrency(8000, 'IDN') }}
                                            @else
                                                {{ toCurrency(0, 'IDN') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" colspan="3" class="text-end">Total :</th>
                                        <td>
                                            <div class="fw-bold"> {{ toCurrency($order->total_payment, 'IDN') }}</div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>


                        </div>
                        <div class="mb-0 text-end">
                            @if ($order->pay_status == 'Waiting')
                                <button type="button" data-bs-toggle="modal" data-bs-target="#con-close-modal"
                                    class="btn btn-success waves-effect waves-light">Bayar</button>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container -->


    <script>
        function loadSwalCancelConfirm(url) {
            Swal.fire({
                title: "Anda yakin ingin membatalkan pesanan ini?",
                text: "Pesanan ini tidak akan berlaku setelah dibatalkan.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, batalkan pesanan!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        }

        function loadSwalProcessConfirm(msg, url) {
            Swal.fire({
                title: `Anda yakin ingin ${msg} pesanan ini?`,
                text: "Proses tidak dapat dibatalkan.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        }
    </script>
@endsection
