@extends('layout.auth')
@section('content')
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
                                <p class="text-muted mb-4 mt-3">Belum memiliki akun? Buat akun anda kurang dari 1 menit</p>
                                
                            </div>
                            <div class="alert alert-danger align-items-center d-none" role="alert" id="alert-danger-register">
                                <div class="text-center">
                                    <i class="fas fa-exclamation-triangle"></i> An example danger alert with an icon
                                </div>
                              </div>
                            <form action="{{ route('signup') }}" class="" method="POST" id="registration-form" novalidate>
                                @csrf
                                <div class="mb-3">
                                    <label for="fullname" class="form-label">Full Name</label> 
                                    <input class="form-control regis-form regis-form @error('fullname') is-invalid @enderror" type="text" id="fullname" placeholder="Enter your name" name="fullname" value="{{ old('fullname') }}" required>
                                    @error('fullname')     
                                        <div id="" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="fullname" class="form-label">Username</label>
                                    <input class="form-control regis-form  @error('username') is-invalid @enderror" type="text" id="fullname" placeholder="Enter your username" value="{{ old('username') }}" name="username" required>
                                    @error('username')     
                                        <div id="" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email address</label>
                                    <input class="form-control regis-form @error('email') is-invalid @enderror" type="email" id="emailaddress" required placeholder="Enter your email" name="email" value="{{ old('email') }}">
                                    @error('email')     
                                        <div id="" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control regis-form @error('password') is-invalid  @enderror" placeholder="Enter your password" name="password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                        @error('password')     
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                               
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Confirm Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password_confirmation" class="form-control regis-form @error('password_confirmation') is-invalid  @enderror" placeholder="Enter your password" name="password_confirmation">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                        @error('password_confirmation')     
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkbox-terms-regis">
                                        <label class="form-check-label" for="checkbox-signup">I accept <a href="javascript: void(0);" class="text-dark" id="terms-condition-regis">Terms and Conditions</a></label>
                                    </div>
                                    
                                </div>
                                <div class="text-center d-grid">
                                    <button class="btn btn-success" id="btn-submit-regis"> Sign Up </button>
                                </div>

                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-white-50">Already have account? <a href="/auth" class="text-white ms-1"><b>Sign In</b></a></p>
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

    <footer class="footer footer-alt">
        2015 -
        <script>document.write(new Date().getFullYear())</script> &copy; UBold theme by <a href="" class="text-white-50">Coderthemes</a>
    </footer>

@endsection
