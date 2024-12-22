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
                            <img src="@if ($profile->user_data->pic) {{ '/uploads' . '/user-avatar' . '/' . $profile->user_data->pic  }} @else {{ asset('templates/assets/images/users/empty-profile.png') }} @endif" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                            <h4 class="mb-0">{{ $profile->name }}</h4>
                            <p class="text-muted">{{ $profile->username }}</p>

                                        <div class="text-start mt-3">
                                            <h4 class="font-13">About Me</h4>
                                            <p class="text-muted font-13 mb-3">
                                                @if ($profile->user_data->bio) {{ $profile->user_data->bio }} @else - @endif
                                                
                                            </p>
                                            <p class="text-muted mb-2 font-13"><strong>Nama :</strong> <span class="ms-2">{{ $profile->name }}</span>
                                            <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2">user@email.domain</span></p>
                                            <p class="text-muted mb-2 font-13"><strong>Telepon :</strong><span class="ms-2"> @if ($profile->user_data->telepon) {{ $profile->user_data->telepon }} @else - @endif</span></p>
                                            <p class="text-muted mb-2 font-13"><strong>Handphone :</strong><span class="ms-2"> @if ($profile->user_data->no_hp) {{ $profile->user_data->no_hp }} @else - @endif</span></p>
                                            <p class="text-muted mb-1 font-13"><strong>Alamat :</strong> <span class="ms-2">@if ($profile->user_data->alamat) {{ $profile->user_data->alamat }} @else - @endif</span></p>
                                        </div>                                    

                                        <ul class="social-list list-inline mt-3 mb-0">
                                            <li class="list-inline-item">
                                                <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                                            </li>
                                        </ul>   
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
                                                <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant me-1"></i>
                                                    Projects</h5>
                                                <div class="table-responsive">
                                                    <table class="table table-borderless mb-0">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Project Name</th>
                                                                <th>Start Date</th>
                                                                <th>Due Date</th>
                                                                <th>Status</th>
                                                                <th>Clients</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>App design and development</td>
                                                                <td>01/01/2015</td>
                                                                <td>10/15/2018</td>
                                                                <td><span class="badge bg-info">Work in Progress</span></td>
                                                                <td>Halette Boivin</td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Coffee detail page - Main Page</td>
                                                                <td>21/07/2016</td>
                                                                <td>12/05/2018</td>
                                                                <td><span class="badge bg-success">Pending</span></td>
                                                                <td>Durandana Jolicoeur</td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>Poster illustation design</td>
                                                                <td>18/03/2018</td>
                                                                <td>28/09/2018</td>
                                                                <td><span class="badge bg-pink">Done</span></td>
                                                                <td>Lucas Sabourin</td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>Drinking bottle graphics</td>
                                                                <td>02/10/2017</td>
                                                                <td>07/05/2018</td>
                                                                <td><span class="badge bg-blue">Work in Progress</span></td>
                                                                <td>Donatien Brunelle</td>
                                                            </tr>
                                                            <tr>
                                                                <td>5</td>
                                                                <td>Landing page design - Home</td>
                                                                <td>17/01/2017</td>
                                                                <td>25/05/2021</td>
                                                                <td><span class="badge bg-warning">Coming soon</span></td>
                                                                <td>Karel Auberjo</td>
                                                            </tr>
    
                                                        </tbody>
                                                    </table>
                                                </div>
    
                                            </div> <!-- end tab-pane -->
                                            <!-- end about me section content -->
    
                                            <div class="tab-pane show" id="timeline">
    
                                                <!-- comment box -->
                                                <form action="#" class="comment-area-box mt-2 mb-3">
                                                    <span class="input-icon">
                                                        <textarea rows="3" class="form-control" placeholder="Write something..."></textarea>
                                                    </span>
                                                    <div class="comment-area-btn">
                                                        <div class="float-end">
                                                            <button type="submit" class="btn btn-sm btn-dark waves-effect waves-light">Post</button>
                                                        </div>
                                                        <div>
                                                            <a href="#" class="btn btn-sm btn-light"><i class="far fa-user"></i></a>
                                                            <a href="#" class="btn btn-sm btn-light"><i class="fa fa-map-marker-alt"></i></a>
                                                            <a href="#" class="btn btn-sm btn-light"><i class="fa fa-camera"></i></a>
                                                            <a href="#" class="btn btn-sm btn-light"><i class="far fa-smile"></i></a>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- end comment box -->
    
                                                <!-- Story Box-->
                                                <div class="border border-light p-2 mb-3">
                                                    <div class="d-flex align-items-start">
                                                        <img class="me-2 avatar-sm rounded-circle" src="assets/images/users/user-3.jpg" alt="Generic placeholder image">
                                                        <div class="w-100">
                                                            <h5 class="m-0">Jeremy Tomlinson</h5>
                                                            <p class="text-muted"><small>about 2 minuts ago</small></p>
                                                        </div>
                                                    </div>
                                                    <p>Story based around the idea of time lapse, animation to post soon!</p>
    
                                                    <img src="assets/images/small/img-1.jpg" alt="post-img" class="rounded me-1" height="60" />
                                                    <img src="assets/images/small/img-2.jpg" alt="post-img" class="rounded me-1" height="60" />
                                                    <img src="assets/images/small/img-3.jpg" alt="post-img" class="rounded" height="60" />
    
                                                    <div class="mt-2">
                                                        <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-reply"></i> Reply</a>
                                                        <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-heart-outline"></i> Like</a>
                                                        <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-share-variant"></i> Share</a>
                                                    </div>
                                                </div>
    
                                                <!-- Story Box-->
                                                <div class="border border-light p-2 mb-3">
                                                    <div class="d-flex align-items-start">
                                                        <img class="me-2 avatar-sm rounded-circle" src="assets/images/users/user-4.jpg" alt="Generic placeholder image">
                                                        <div class="w-100">
                                                            <h5 class="m-0">Thelma Fridley</h5>
                                                            <p class="text-muted"><small>about 1 hour ago</small></p>
                                                        </div>
                                                    </div>
                                                    <div class="font-16 text-center fst-italic text-dark">
                                                        <i class="mdi mdi-format-quote-open font-20"></i> Cras sit amet nibh libero, in
                                                        gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
                                                        purus odio, vestibulum in vulputate at, tempus viverra turpis. Duis
                                                        sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper
                                                        porta. Mauris massa.
                                                    </div>
    
                                                    <div class="post-user-comment-box">
                                                        <div class="d-flex align-items-start">
                                                            <img class="me-2 avatar-sm rounded-circle" src="assets/images/users/user-3.jpg"
                                                                alt="Generic placeholder image">
                                                            <div class="w-100">
                                                                <h5 class="mt-0">Jeremy Tomlinson <small class="text-muted">3 hours ago</small></h5>
                                                                Nice work, makes me think of The Money Pit.
    
                                                                <br/>
                                                                <a href="javascript: void(0);" class="text-muted font-13 d-inline-block mt-2"><i
                                                                    class="mdi mdi-reply"></i> Reply</a>
    
                                                                <div class="d-flex align-items-start mt-3">
                                                                    <a class="pe-2" href="#">
                                                                        <img src="assets/images/users/user-4.jpg" class="avatar-sm rounded-circle"
                                                                            alt="Generic placeholder image">
                                                                    </a>
                                                                    <div class="w-100">
                                                                        <h5 class="mt-0">Kathleen Thomas <small class="text-muted">5 hours ago</small></h5>
                                                                        i'm in the middle of a timelapse animation myself! (Very different though.) Awesome stuff.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
    
                                                        <div class="d-flex align-items-start mt-2">
                                                            <a class="pe-2" href="#">
                                                                <img src="assets/images/users/user-1.jpg" class="rounded-circle" alt="Generic placeholder image" height="31">
                                                            </a>
                                                            <div class="w-100">
                                                                <input type="text" id="simpleinput" class="form-control border-0 form-control-sm" placeholder="Add comment">
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <div class="mt-2">
                                                        <a href="javascript: void(0);" class="btn btn-sm btn-link text-danger"><i class="mdi mdi-heart"></i> Like (28)</a>
                                                        <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-share-variant"></i> Share</a>
                                                    </div>
                                                </div>
    
                                                <!-- Story Box-->
                                                <div class="border border-light p-2 mb-3">
                                                    <div class="d-flex align-items-start">
                                                        <img class="me-2 avatar-sm rounded-circle" src="assets/images/users/user-6.jpg"
                                                            alt="Generic placeholder image">
                                                        <div class="w-100">
                                                            <h5 class="m-0">Jeremy Tomlinson</h5>
                                                            <p class="text-muted"><small>15 hours ago</small></p>
                                                        </div>
                                                    </div>
                                                    <p>The parallax is a little odd but O.o that house build is awesome!!</p>
    
                                                    <iframe src='https://player.vimeo.com/video/87993762' height='300' class="img-fluid border-0"></iframe>
                                                </div>
    
                                                <div class="text-center">
                                                    <a href="javascript:void(0);" class="text-danger"><i class="mdi mdi-spin mdi-loading me-1"></i> Load more </a>
                                                </div>
    
                                            </div>
                                            <!-- end timeline content-->
    
                                            <div class="tab-pane" id="settings">
                                                <form action="{{ route('user_update_data') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <h5 class="mb-2"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                                                    <div class="row">
                                                        <input type="hidden" name="data_id" value="{{ $profile->user_data->id }}">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="fullname" class="form-label">Nama</label>
                                                                <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" id="fullname" placeholder="Masukkan nama." value="{{ old('fullname', $profile->name) }}">
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
                                                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan email." value="{{ old('email', $profile->email) }}">
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
                                                                <label for="telepon" class="form-label">Telepon <span class="text-danger">*</span></label>
                                                                <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror" id="telepon" placeholder="Masukkan nomor telepon." value="{{ old('telepon', $profile->user_data->telepon) }}">
                                                                @error('telepon')     
                                                                <div id="" class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="nohandphone" class="form-label">Handphone <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control @error('handphone') is-invalid @enderror" id="nohandphone" name="handphone" placeholder="Masukkan nomor handphone." value="{{ old('handphone', $profile->user_data->no_hp) }}">
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
                                                                <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                                                                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="4" placeholder="Masukkan alamat. Contoh : Nama jalan, dan yang lainnya.">{{ old('alamat', $profile->user_data->alamat) }}</textarea>
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
                                                                <label for="kota" class="form-label">Kota <span class="text-danger">*</span></label>
                                                                <input type="text" name="kota" class="form-control @error('kota') is-invalid @enderror" id="kota" placeholder="Masukkan nama kota." value="{{ old('kota', $profile->user_data->kota) }}">
                                                                @error('kota')     
                                                                <div id="" class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="provinsi" class="form-label">Provinsi <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi" placeholder="Masukkan nama provinsi." value="{{ old('provinsi', $profile->user_data->provinsi) }}">
                                                                @error('provinsi')     
                                                                <div id="" class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div> <!-- end col -->
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="kodepos" class="form-label">Kode Pos <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control @error('kodepos') is-invalid @enderror" id="kodepos" name="kodepos" placeholder="Masukkan nomor kode pos." value="{{ old('kodepos', $profile->user_data->kode_pos) }}">
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
                                                                 <input type="file" name="fotoprofil" data-plugins="dropify" data-show-errors="true" data-default-file="{{ '/uploads' . '/user-avatar' . '/' . $profile->user_data->pic  }}" data-allowed-file-extensions='["jpg", "png", "jpeg"]' data-height="300" class="dropifyForm"/>
                                                            </div>
                                                        </div>
                                                    </div> <!-- end row -->
    
                                       
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
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