<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gari-import | Admin Panel</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('/admin/assets/') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{ asset('/admin/assets/') }}/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('/admin/assets/') }}/css/sb-admin.css" rel="stylesheet">

</head>
    <body>
        <div class="container">
            <div class="col-md-12">
                <div class="col-md-12" style="background-color: white">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('/fontend/assets/logo.png') }}" height="90" width="192" style="margin-left: 300px;" class="logo" alt="gari-import">
                    </a>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 sadow" style="background-color: #fffcbb; padding: 30px;">
                        <h4 style="margin-left: 40px;"><b>Dear {{ $name }}</b> sir</h4>
                        <p style="margin-left: 40px;"><b>Your e-mail is</b> : {{ $email }}</p>
                        <p style="margin-left: 40px;"><b>Your phone is</b> : {{ $phone }}</p>
                        @if($port == 1)
                            <p style="margin-left: 40px;"><b>Your Port is</b> : Chittagong</p>
                        @else
                            <p style="margin-left: 40px;"><b>Your Port is</b> : Mongla</p>
                        @endif
                        @if($inquiry_type == 1)
                            <p style="margin-left: 40px;"><b>Your inquiry type</b> : Dealer</p>
                        @else
                            <p style="margin-left: 40px;"><b>Your inquiry type</b> : Individual</p>
                        @endif
                        <p style="margin-left: 40px;"><b>Your query is</b> : {!! $mage !!}</p>
                        <p style="margin-left: 40px;"><b>Thank you for contact with us</b>.</p>
                        <h3 style="margin-left: 40px;">Gari-import Team</h3>
                        <p style="color: red; margin-left: 40px;"><a href="#">gari-import.com.bd</a></p>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </div>
    </body>
</html>
