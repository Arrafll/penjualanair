<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Error Page | 403 | Forbidden | Airmoo </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

		<!-- Theme Config Js -->
		<script src="{{ asset('templates/assets/js/head.js') }}"></script>

		<!-- Bootstrap css -->
		<link href="{{ asset('templates/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

		<!-- App css -->
		<link href="{{ asset('templates/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

		<!-- Icons css -->
		<link href="{{ asset('templates/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                
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

                                <div class="text-center mt-4">
                                    <h1 class="text-error">403</h1>
                                    <h3 class="mt-3 mb-2">Forbidden</h3>
                                    <p class="text-muted mb-3">Anda tidak memiliki akses ke halaman ini. </p>

                                    <a href="/home" class="btn btn-success waves-effect waves-light">Kembali</a>
                                </div>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <footer class="footer footer-alt">
            2015 - <script>document.write(new Date().getFullYear())</script> &copy; UBold theme by <a href="" class="text-white-50">Coderthemes</a> 
        </footer>

        
    </body>
</html>