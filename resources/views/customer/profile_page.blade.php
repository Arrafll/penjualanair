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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Profile</a></li>
                            {{-- <li class="breadcrumb-item active">List</li> --}}
                        </ol>
                    </div>
                    <h4 class="page-title">Profile</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            @session('successEdit')
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        {{ session('successEdit') }}
                    </div>
                </div>
            @endsession
            <div class="col-lg-4 col-xl-4">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="@if ($profile->user_data->pic) {{ '/uploads' . '/user-avatar' . '/' . $profile->user_data->pic }} @else {{ asset('templates/assets/images/users/empty-profile.png') }} @endif"
                            class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                        <h4 class="mb-0">{{ $profile->name }}</h4>
                        <p class="text-muted">{{ $profile->username }}</p>

                        <div class="text-start mt-3">
                            <h4 class="font-13">About Me</h4>
                            <p class="text-muted font-13 mb-3">
                                @if ($profile->user_data->bio)
                                    {{ $profile->user_data->bio }}
                                @else
                                    -
                                @endif

                            </p>
                            <p class="text-muted mb-2 font-13"><strong>Nama :</strong> <span
                                    class="ms-2">{{ $profile->name }}</span>
                            <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span
                                    class="ms-2">user@email.domain</span></p>
                            <p class="text-muted mb-2 font-13"><strong>Telepon :</strong><span class="ms-2">
                                    @if ($profile->user_data->telepon)
                                        {{ $profile->user_data->telepon }}
                                    @else
                                        -
                                    @endif
                                </span>
                            </p>
                            <p class="text-muted mb-2 font-13"><strong>Handphone :</strong><span class="ms-2">
                                    @if ($profile->user_data->no_hp)
                                        {{ $profile->user_data->no_hp }}
                                    @else
                                        -
                                    @endif
                                </span></p>
                            <p class="text-muted mb-1 font-13"><strong>Alamat :</strong> <span class="ms-2">
                                    @if ($profile->user_data->alamat)
                                        {{ $profile->user_data->alamat }}
                                    @else
                                        -
                                    @endif
                                </span></p>
                        </div>

                    </div>
                </div> <!-- end card -->

            </div> <!-- end col-->

            <div class="col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills nav-fill navtab-bg">
                            <li class="nav-item">
                                <a href="#history" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                    Riwayat
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#timeline" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                    Review
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    Data User
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="history">
                                <h5 class="mb-3 mt-4"><i class="mdi mdi-cards-variant me-1"></i>
                                    Riwayat Pemesanan Terakhir</h5>
                                <div class="table-responsive">
                                    <table class="table table-borderless mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Kode</th>
                                                <th>Tanggal</th>
                                                <th>Harga</th>
                                                <th>Payment</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order as $or)
                                                <tr>
                                                    <td>{{ $or->code }} </td>
                                                    <td>{{ $or->created_at }}</td>
                                                    <td>{{ toCurrency($or->total_payment, 'IDN') }}</td>
                                                    <td>{!! getPayStatusLabel($or->payment_status) !!}

                                                    </td>
                                                    <td> {!! getOrderStatusLabel($or->status) !!}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div> <!-- end tab-pane -->
                            <!-- end about me section content -->

                            <div class="tab-pane show" id="timeline">


                                <h5 class="mb-3 mt-4"><i class="mdi mdi-chat-processing-outline me-1"></i>
                                    Ulasan Terakhir</h5>

                                @foreach ($orderReviews as $orv)
                                    <!-- Story Box-->
                                    <div class="border border-light p-2 mb-3">
                                        <div class="col-sm-12 d-flex">

                                            <div class="col-sm-2">
                                                <img src="{{ '/uploads/product/' . $orv->product_pic }}" alt="product-pic"
                                                    class="img-fluid align-self-center"
                                                    style="object-fit:contain;height:120px;width:100%;" />
                                            </div>

                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="d-flex justify-content-between">
                                                        <h4>{{ $orv->product_name }}</h4>
                                                        <h6 class="text-muted">{{ $orv->created_at }}</h6>

                                                    </div>
                                                    <p class="text-muted float-start me-3">
                                                        <?php $stars = 5; ?>
                                                        @for ($i = 1; $i <= $stars; $i++)
                                                            @if ($i <= $orv->score)
                                                                <span class="mdi mdi-star text-warning"></span>
                                                            @else
                                                                <span class="mdi mdi-star"></span>
                                                            @endif
                                                        @endfor
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <p>{{ $orv->review }}</p>
                                                </div>
                                            </div>
                                            {{-- <div class="w-100">
                                                    <h5 class="m-0">Jeremy Tomlinson</h5>
                                                    <p class="text-muted"><small>about 2 minuts ago</small></p>
                                                </div> --}}
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                            <!-- end timeline content-->

                            <div class="tab-pane" id="settings">
                                <form action="{{ route('user_update_data') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <h5 class="mb-2"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                                    <div class="row">
                                        <input type="hidden" name="data_id" value="{{ $profile->user_data->id }}">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="fullname" class="form-label">Nama</label>
                                                <input type="text" name="fullname"
                                                    class="form-control @error('fullname') is-invalid @enderror"
                                                    id="fullname" placeholder="Masukkan nama."
                                                    value="{{ old('fullname', $profile->name) }}">
                                                @error('fullname')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" name="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    id="email" placeholder="Masukkan email."
                                                    value="{{ old('email', $profile->email) }}">
                                                @error('email')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div> <!-- end row -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="telepon" class="form-label">Telepon <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="telepon"
                                                    class="form-control @error('telepon') is-invalid @enderror"
                                                    id="telepon" placeholder="Masukkan nomor telepon."
                                                    value="{{ old('telepon', $profile->user_data->telepon) }}">
                                                @error('telepon')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="nohandphone" class="form-label">Handphone <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('handphone') is-invalid @enderror"
                                                    id="nohandphone" name="handphone"
                                                    placeholder="Masukkan nomor handphone."
                                                    value="{{ old('handphone', $profile->user_data->no_hp) }}">
                                                @error('telepon')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="alamat" class="form-label">Alamat <span
                                                        class="text-danger">*</span></label>
                                                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="4"
                                                    placeholder="Masukkan alamat. Contoh : Nama jalan, dan yang lainnya.">{{ old('alamat', $profile->user_data->alamat) }}</textarea>
                                                @error('alamat')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="kota" class="form-label">Kota <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="kota"
                                                    class="form-control @error('kota') is-invalid @enderror"
                                                    id="kota" placeholder="Masukkan nama kota."
                                                    value="{{ old('kota', $profile->user_data->kota) }}">
                                                @error('kota')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="provinsi" class="form-label">Provinsi <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('provinsi') is-invalid @enderror"
                                                    id="provinsi" name="provinsi" placeholder="Masukkan nama provinsi."
                                                    value="{{ old('provinsi', $profile->user_data->provinsi) }}">
                                                @error('provinsi')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="kodepos" class="form-label">Kode Pos <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('kodepos') is-invalid @enderror"
                                                    id="kodepos" name="kodepos" placeholder="Masukkan nomor kode pos."
                                                    value="{{ old('kodepos', $profile->user_data->kode_pos) }}">
                                                @error('kodepos')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="userbio" class="form-label">Bio</label>
                                                <textarea class="form-control" id="userbio" name="bio" rows="4" placeholder="Tuliskan bio profil anda">{{ $profile->user_data->bio }}</textarea>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="fotoprofil" class="form-label">Foto Profil</label>
                                                <input type="file" name="fotoprofil" data-plugins="dropify"
                                                    data-show-errors="true"
                                                    data-default-file="{{ '/uploads' . '/user-avatar' . '/' . $profile->user_data->pic }}"
                                                    data-allowed-file-extensions='["jpg", "png", "jpeg"]'
                                                    data-height="300" class="dropifyForm" />
                                            </div>
                                        </div>
                                    </div> <!-- end row -->


                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i
                                                class="mdi mdi-content-save"></i> Save</button>
                                    </div>

                            </div> <!-- end row -->

                            </form>
                        </div>
                        <!-- end settings content-->

                    </div> <!-- end tab-content -->
                </div>
            </div> <!-- end card-->

        </div> <!-- end col -->
    </div>
    <!-- end row-->
    </div> <!-- container -->
@endsection
