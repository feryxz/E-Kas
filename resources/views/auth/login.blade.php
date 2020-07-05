

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>E-KAS | Login Page</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="{{ asset('dist/images/favicon.ico')}}">

        <link href="{{ asset('dist/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('dist/assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('dist/assets/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('dist/assets/css/style.css')}}" rel="stylesheet" type="text/css">
    </head>

    <body>

        <!-- Begin page -->
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center m-0">
                        <a href="/" class="logo logo-admin"><img src="{{ asset('dist/images/logo.png')}}" height="50" alt="logo"></a>
                    </h3>

                    <div class="p-3">
                        <p class="text-muted text-center">Sign in to continue to E-Kas.</p>

                        <form method="POST" action="{{ route('login') }}" class="form-horizontal m-t-30">
                        @csrf

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="enail" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="userpassword">Password</label>
                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" id="userpassword" placeholder="Enter password" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlInline" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="customControlInline">Remember me</label>
                                    </div>
                                </div>
                                <div class="col-6 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-12 m-t-20">
                                    <a href="#" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
                <p>Don't have an account ? <a href="/register" class="text-primary"> Signup Now </a> </p>
                <p>© 2020 Created  <i class="mdi mdi-heart text-danger"></i><a href="https://feryxz.com"> by Feryxz Dev</a> </p>
            </div>

        </div>
        

        <!-- jQuery  -->
        <script src="{{ asset('dist/assets/js/jquery.min.js')}}"></script>
        <script src="{{ asset('dist/assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('dist/assets/js/metisMenu.min.js')}}"></script>
        <script src="{{ asset('dist/assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{ asset('dist/assets/js/waves.min.js')}}"></script>

        <script src="{{ asset('dist/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

        <!-- App js -->
        <script src="{{ asset('dist/assets/js/app.js')}}"></script>

    </body>
</html>