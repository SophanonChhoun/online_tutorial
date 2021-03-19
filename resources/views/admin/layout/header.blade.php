
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
{{--    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">--}}

    <!-- Custom CSS -->
    <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">
    <!-- Custom Fonts -->

    <link href="{{asset('css/styles.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <!-- Custom Fonts -->


    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link href="{{asset("font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css">

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- BEGIN select2 -->
    <link href="{{ asset('plugins/css/select2.min.css') }}" rel="stylesheet" />
    <!-- END select2 -->
    @yield("style")

    <style>
        [v-cloak] {
            display: none;
        }
    </style>
</head>
