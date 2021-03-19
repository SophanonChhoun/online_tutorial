<!
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
    <style>
        [v-cloak] {
            display: none;
        }
        .google {
            background-color: #dd4b39;
            color: white;
        }

    </style>
</head>

<body>
<div id="login">

    <h3 class="text-center text-white pt-5">Login</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12" v-cloak>
{{--                    <form id="login-form" class="form" action="{{ url('admin/login') }}" method="post">--}}
                    <form id="login-form" class="form" action="{{ url('admin/login') }}" method="post">
                        @csrf
                        <h3 class="text-center text-info">Login</h3>
                        <div class="form-group" :class="{'has-error' : errors.first('email')}">
                            <label for="username" class="text-info">Email:</label><br>
                            <input type="text"
                                   name="email"
                                   v-model="email"
                                   data-vv-as="Email"
                                   v-validate="'required'"
                                   id="username"
                                   class="form-control">
                            <span class="help-block">@{{ errors.first('email') }}</span>
                        </div>
                        <div class="form-group" :class="{'has-error' : errors.first('password')}">
                            <label for="password" class="text-info">Password:</label><br>
                            <input type="password"
                                   name="password"
                                   v-model="password"
                                   data-vv-as="Password"
                                   v-validate="'required'"
                                   id="password"
                                   class="form-control">
                            <span class="help-block">@{{ errors.first('password') }}</span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="Login">
                        </div>
                        @if(isset($errorMessageDuration))
                            <h3 class="alert alert-danger">{{ $errorMessageDuration }}</h3>
                        @endif

                    </form>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="{{ url('/auth/google/login') }}" class="google btn"><i class="fa fa-google fa-fw">
                </i> Login with Google+
            </a>
        </div>
    </div>
</div>
<script src="{{ mix('/dist/js/app.js') }}"></script>
<script src="{{ mix('/dist/js/adminAuth/login.js') }}"></script>

</body>

</html>
