<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title','TestLaravelDev')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" />
    <!-- Font-icon css -->
    <link
            rel="stylesheet"
            type="text/css"
            href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
</head>
<body class="pace-done"><div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
        <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div></div>
<section class="material-half-bg">
    <div class="cover bg-primary"></div>
</section>
<section class="login-content">
    <div class="logo">
        <h2 style="font-weight: lighter">Admin Sign In Form</h2>
    </div>

        {{-- Note of  Enter the Admin  Dashboard --}}

    @if($admin_exist->isEmpty())
        <div class="alert alert-danger">
            <i style="font-size: 20px;" class="fa fa-info-circle"></i> Note :<small>Please Run : php artisan db:seed</small>
            <br>
            <small>
                Email:admin@admin.com <br>
                Password:123456
            </small>
        </div>
    @endif

    <div class="login-box" style="height: 400px; width: 400px;">

        <form class="login-form" action="{{route('admin.login.submit')}}" method="POST">
            @csrf
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
            <div class="form-group">
                <label class="control-label">E-mail</label>
                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" autofocus="">
                @error('email')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="control-label">PASSWORD</label>
                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">
                @error('password')
                <div class="form-control-feedback">{{ $message  }}</div>
                @enderror
            </div>

            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
            </div>

        </form>

    </div>
</section>
<!-- Essential javascripts for application to work-->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="js/plugins/pace.min.js"></script>
<script type="text/javascript">
    // Login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
    });
</script>

</body>
<!-- Essential javascripts for application to work -->
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}" defer></script>
<!-- The javascript plugin to display page loading on top -->
<script src="{{ asset('js/plugins/pace.min.js') }}"></script>
<!-- Data table plugin -->
<script
        type="text/javascript"
        src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"
></script>
<script
        type="text/javascript"
        src="{{ asset('js/plugins/dataTables.bootstrap.min.js') }}"
></script>
<script
        type="text/javascript"
        src="{{ asset('js/plugins/bootstrap-notify.min.js') }}"
></script>
<script
        type="text/javascript"
        src="{{ asset('js/plugins/bootstrap-datepicker.min.js') }}"
></script>
<script
        type="text/javascript"
        src="{{ asset('js/plugins/select2.min.js') }}"
></script>


<script type="text/javascript">

    $('.data-table').DataTable();
    $('.select2').select2();
    $('.date-picker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
    });

    $(
        '.app-menu a[href^="' + location.href + '"].app-menu__item'
    ).addClass('active');
    $('a[href^="' + location.href + '"]')
        .closest('.treeview')
        .addClass('is-expanded');
</script>
@if(Session::has('response'))
    <script>
        var toastData = {
            html: '{{Session::get("response.message")}}',
            classes:
                '{{Session::get("response.type") == "success" ? "green" : "red"}}'
        };
        $.notify(
            {
                title: '',
                message: '{{Session::get("response.message")}}',
                icon:
                    '{{Session::get("response.type") == "success" ? "fa fa-check" : "fa fa-close"}}'
            },
            {
                type:
                    '{{Session::get("response.type") == "success" ? "success" : "danger"}}'
            }
        );
    </script>
    @endif
    </body>
</html>
