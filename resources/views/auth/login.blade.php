<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gari-import | Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('/admin/assets/') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{ asset('/admin/assets/') }}/css/sb-admin.css" rel="stylesheet">

</head>

<body class="login-bg-img">

<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email address" required="required" autofocus="autofocus">
                        <label for="email">Email address</label>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required="required">
                        <label for="password">Password</label>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Login
                </button>
            </form>
{{--            <div class="text-center">--}}
{{--                <a class="d-block small mt-3" href="register.html">Register an Account</a>--}}
{{--                <a class="d-block small" href="forgot-password.html">Forgot Password?</a>--}}
{{--            </div>--}}
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('/admin/assets/') }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('/admin/assets/') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('/admin/assets/') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
