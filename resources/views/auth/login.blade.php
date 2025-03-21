<!doctype html>
<html lang="en">


<!-- Mirrored from codebucks.in/clivax/layout/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Mar 2025 06:20:25 GMT -->
<head>

    <meta charset="utf-8" />
    <title>Login | Clivax - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Codebucks" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">


    
    <!-- dark layout js -->
    <script src="{{ asset('assets/js/pages/layout.js') }}"></script>

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- simplebar css -->
    <link href="{{ asset('assets/libs/simplebar/simplebar.min.css') }} " rel="stylesheet">
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }} " id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="container-fluid authentication-bg overflow-hidden">
        <div class="bg-overlay"></div>
        <div class="row align-items-center justify-content-center min-vh-100">
            <div class="col-10 col-md-6 col-lg-4 col-xxl-3">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="text-center">
                            <a href="#" class="logo-dark">
                                <img src="assets/images/logo-dark.png" alt="" height="20" class="auth-logo logo-dark mx-auto">
                            </a>
                            <a href="#" class="logo-dark">
                                <img src="assets/images/logo-light.png" alt="" height="20" class="auth-logo logo-light mx-auto">
                            </a>
                            

                            <h4 class="mt-4">Welcome Back !</h4>
                            <p class="text-muted">Sign in to continue to BLUEJAY .</p>
                        </div>

                        <div class="p-2 mt-5">
                           
                            @csrf
            <form method="POST" action="{{ route('login') }}" name="login-form" class="needs-validation" novalidate="">
                @csrf
                <div class="form-floating mb-3">
                <input class="form-control form-control_gray  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required="" autocomplete="email"
                  autofocus="">
                <label for="email">Email address *</label>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>

              <div class="pb-3"></div>

              <div class="form-floating mb-3">
                <input id="password" type="password" class="form-control form-control_gray  @error('password') is-invalid @enderror" name="password" required=""
                  autocomplete="current-password">
                <label for="customerPasswodInput">Password *</label>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>

              <button class="btn btn-primary w-100 text-uppercase" type="submit">Log In</button>

              <div class="customer-option mt-4 text-center">
                <span class="text-secondary">No account yet?</span>
                <a href="{{ route('register') }}" class="btn-text js-show-register">Create Account</a> |  
              </div>
            </form>
                        </div>

                        <div class="mt-5 text-center">
                            <p>©
                                <script>document.write(new Date().getFullYear())</script>   by BLUEJAY ENGINEERING SERVICES 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    
    
    <!-- apexcharts -->
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    
    <script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>
    
    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

</body>


<!-- Mirrored from codebucks.in/clivax/layout/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Mar 2025 06:20:25 GMT -->
</html>