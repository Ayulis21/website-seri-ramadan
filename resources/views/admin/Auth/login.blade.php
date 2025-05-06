<html lang="en"><head>
        
    <meta charset="utf-8">
    <title>Login | Skote - Admin &amp; Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin &amp; Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('admin-template/assets/images/favicon.ico') }}">
    <!-- Bootstrap Css -->
    <link href="{{ asset('admin-template/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{ asset('admin-template/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <!-- App Css -->
    <link href="{{ asset('admin-template/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">

</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p>Sign in to continue to Nama Toko.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{ asset('assets/images/profile-img.png') }}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0"> 
                            <div class="auth-logo">
                                <a href="index.html" class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{ asset('admin-template/assets/images/logo-light.svg') }}" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                        
                                <a href="index.html" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{ asset('admin-template/assets/images/logo.svg') }}" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <form method="POST" action="{{ route('admin.login.submit') }}">
                                    @csrf  <!-- CSRF token untuk keamanan -->
    
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" required>
                                    </div>
            
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember-check">
                                        <label class="form-check-label" for="remember-check">
                                            Remember me
                                        </label>
                                    </div>
                                    
                                    <div class="d-grid">
                                        <button class="btn btn-primary" type="submit">Login</button>
                                    </div>
                                    <!-- Jika ada error -->
                                        @if($errors->any())
                                        <div class="alert alert-danger mt-3">
                                            {{ $errors->first() }}
                                        </div>
                                    @endif
                                    <div class="mt-4 text-center">
                                        <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        
                        <div>
                            <p>Don't have an account ? <a href="auth-register.html" class="fw-medium text-primary"> Signup now </a> </p>
                            <p>© <script>document.write(new Date().getFullYear())</script>2025 Skote. Crafted with <i></i> by Natusi</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('admin-template/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin-template/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin-template/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin-template/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin-template/assets/libs/node-waves/waves.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('admin-template/assets/js/app.js') }}"></script>


</body></html>