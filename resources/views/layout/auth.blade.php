<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-sidenav-user="true">

<head>
    <meta charset="utf-8" />
    <title>{{ $title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('templates/assets/images/logo-icon-airmoo.png') }}">

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

    @yield('content')
    &nbsp;

    <footer class="footer footer-alt text-white">
        <script>document.write(new Date().getFullYear())</script> &copy; <a href=""
            class="text-white-50">  &nbsp; Airmoo</a>
    </footer>
  
    </body>
    <!-- Vendor js -->
    <script src="{{ asset('templates/assets/js/vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('templates/assets/js/app.min.js') }}"></script>

    <script src="{{ asset('templates/assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>
    <script src="{{ asset('templates/assets/libs/mohithg-switchery/switchery.min.js') }}"></script>
    <script src="{{ asset('templates/assets/libs/multiselect/js/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('templates/assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('templates/assets/libs/jquery-mockjax/jquery.mockjax.min.js') }}"></script>
    <script src="{{ asset('templates/assets/libs/devbridge-autocomplete/jquery.autocomplete.min.js') }}"></script>
    <script src="{{ asset('templates/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ asset('templates/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <!-- Authentication js -->
    <script src="{{ asset('templates/assets/js/pages/authentication.init.js') }}"></script>
    <script src="{{ asset('js/regis.js') }}"></script>
    
    
</html>