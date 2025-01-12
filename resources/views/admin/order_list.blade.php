@extends('layout.main')
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Airmoo</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a></li>
                            <li class="breadcrumb-item active">List</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Pesanan</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Pesanan</h4>
                        <p class="text-muted font-13 mb-4">
                            Daftar pesanan anda.
                            @session('success')
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                {{ session('success') }}
                            </div>
                        @endsession
                        @session('orderCancel')
                            <script>
                                loadFailSwal('Dibatalkan!', "{{ session('orderCancel') }}")
                            </script>
                        @endsession
                        </p>

                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th width="20%">Kode</th>
                                    <th width="20%">Tanggal</th>
                                    <th width="20%">Total</th>
                                    <th width="20%">Payment</th>
                                    <th width="20%">Status</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $o)
                                    <tr>
                                        <td>{{ $o->code }}</td>
                                        <td>{{ $o->created_at }}</td>
                                        <td>{{ toCurrency($o->total_payment, 'IDN') }}</td>
                                        <td>
                                            <h5> {!! getPayStatusLabel($o->payment_status) !!}
                                            </h5>
                                        </td>
                                        <td>
                                            <h5> {!! getOrderStatusLabel($o->status) !!}
                                            </h5>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-info waves-effect waves-light"
                                                onclick="window.location=`{{ route('admin_order_detail', ['id' => $o->id]) }}`"><i
                                                    class="mdi mdi-eye"></i></button>
                                            <button type="button"
                                                onclick="confirmDeleteData('/admin_product_delete', {{ $o->id }})"
                                                class="btn btn-danger waves-effect waves-light" id="sa-warning"><i
                                                    class="mdi mdi-trash-can"></i></button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
    </div>


@endsection
