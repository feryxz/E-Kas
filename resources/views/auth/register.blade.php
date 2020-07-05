
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>E-KAS | Register Page</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="{{ asset('dist/images/favicon.ico')}}">

        <link href="{{('dist/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{('dist/assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{('dist/assets/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{('dist/assets/css/style.css')}}" rel="stylesheet" type="text/css">
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
                        <h4 class="text-muted font-18 m-b-5 text-center">Register</h4>
                        <p class="text-muted text-center">Get your account E-Kas now.</p>

                        <form method="POST" action="{{ route('register') }}">
                        @csrf
                            
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror id="name" placeholder="Enter name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email"  name="email" value="{{ old('email') }}" required autocomplete="email">
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Enter phone" name="phone" required autocomplete="phone" value="{{ old('phone') }}">
                            
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password" placeholder="Enter password">
                            
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                            </div>


                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customControlInline" name="agree" id="agree" {{ old('agree') ? 'checked' : '' }} required>
                                <label class="custom-control-label" for="customControlInline">By registering you agree to <a href="#" class="text-primary">Terms of Use</a></label>
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-12 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
                <p>Already have an account ? <a href="/login" class="text-primary"> Login </a> </p>
                <p>© 2020 Created  <i class="mdi mdi-heart text-danger"></i><a href="https://feryxz.com"> by Feryxz Dev</a> </p>
            </div>
        </div>
            

        <!-- jQuery  -->
        <script src="{{('dist/assets/js/jquery.min.js')}}"></script>
        <script src="{{('dist/assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{('dist/assets/js/metisMenu.min.js')}}"></script>
        <script src="{{('dist/assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{('dist/assets/js/waves.min.js')}}"></script>

        <script src="{{('dist/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

        <!-- App js -->
        <script src="{{('dist/assets/js/app.js')}}"></script>

    </body>

</html>