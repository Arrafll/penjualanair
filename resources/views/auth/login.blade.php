@extends('layout.auth')
@section('content')
<body class="authentication-bg authentication-bg-pattern">

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card bg-pattern">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <div class="auth-brand">
                                    <a href="index.html" class="logo logo-dark text-center">
                                        <span class="logo-lg">
                                            <img src="{{ asset('templates/assets/images/logo-text-airmoo.png') }}" alt="" height="44">
                                        </span>
                                    </a>

                                    <a href="index.html" class="logo logo-light text-center">
                                        <span class="logo-lg">
                                            <img src="{{ asset('templates/assets/images/logo-text-airmoo.png') }}" alt="" height="44">
                                        </span>
                                    </a>
                                </div>
                                <p class="text-muted mb-4 mt-3">Masukkan username dan password anda untuk memasuki halaman.</p>
                            </div>
                            
                            <form action="{{ route('signin') }}" class="" method="POST" >
                                @csrf
                                    {{-- <div class="invalid-feedback" style="display: block">
                                        {{ $error }}
                                    </div>
                                    --}}
                                @session('success')
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endsession

                                @session('invalid')
                                <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                    <button type="button" class="btn-close btn-xs btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                    {{ session('invalid') }}
                                </div>
                     
                                 
                                @endsession
                           
                        
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>           
                                    <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" id="username" required=""
                                        placeholder="Enter your username" value="{{ old('username') }}">
                                        @error('username')     
                                        <div id="" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control  @error('password') is-invalid @enderror"
                                            placeholder="Enter your password" name="password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                        @error('password')     
                                        <div id="" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="text-center d-grid">
                                    <button class="btn btn-info" type="submit"> Log In </button>
                                </div>

                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-white-50">Belum memiliki akun? <a href="{{ route('register') }}"
                                    class="text-white ms-1"><b>Sign Up</b></a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->



@endsection
