<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Partial Css -->
    @extends('include.stylelogin')

</head>

<body style="background-color: rgb(229,229,229);">

    <div class="container" style="margin-top: 2%;">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block" style="background-color: rgb(229,229,229);"><i class="fas fa-tags fa-10x" style="margin-top: 45%; margin-left: 30%;"></i></div>
                            <div class="col-lg-6" style="padding-top: 10%; padding-bottom: 6%;">
                                <div class="p-5" style="padding-top: 100%;">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" style="border-radius: 10px;" id="name" name="name" value="{{ old('name') }}" placeholder="Enter Your Name..." required autocomplete="name" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" style="border-radius: 10px;" id="email" name="email" value="{{ old('email') }}" placeholder="Enter Email Address..." required autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" style="border-radius: 10px;" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required autocomplete="current-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" style="border-radius: 10px;" class="form-control form-control-user" id="password-confirm" name="password_confirmation" placeholder="Password Confirm" required autocomplete="new-password">
                                        </div>
                                        <button type="submit" class="btn btn-user btn-block text-gray-900" style="background-color: rgb(229,229,229); border-radius: 10px;">
                                            Register
                                        </button>
                                        <br>
                                        <div class="text-center">
                                            <a class="small" href="{{ route('login') }}">Have An Account? Login Now!</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Partial Js -->
    @extends('include.jslogin')

</body>

</html>
