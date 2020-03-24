<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="{{ app()->getLocale() }}">
<style>
.top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
</style>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Template</title>
	<link rel="stylesheet" href="{{asset('css/style.default.css')}}" type="text/css" />
	<script type="text/javascript" src="{{asset('js/plugins/jquery-1.7.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/jquery-ui-1.8.16.custom.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/jquery.cookie.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/jquery.uniform.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/custom/general.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/custom/index.js')}}"></script>
	<!--[if IE 9]>
		<link rel="stylesheet" media="screen" href="/css/style.ie9.css"/>
	<![endif]-->
	<!--[if IE 8]>
		<link rel="stylesheet" media="screen" href="/css/style.ie8.css"/>
	<![endif]-->
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
    <div style="font-size:19pt; margin-top:5px; margin-left:90%;">
        
    <div class="flex-center position-ref full-height">
                    @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>&nbsp; &nbsp;
                    @else
                       <u><a href="{{ route('login') }}">Login</a></u>&nbsp; &nbsp;

                        @if (Route::has('register'))
                          <u><a href="{{ route('register') }}">Register</a></u>
                        @endif
                    @endauth
                </div>
            @endif
            </div>
        </div>
    </div>
</head>
<body class="loginpage">
	<div class="loginbox">
		<div class="logo">
			<center><img style="padding: 0px 0px 5px 0px;" src="{{asset('/images/icons/logo/logo.png')}}" alt="" /></center> <!-- margin:80px 0px -80px 0px; --></div></div>
</body>
</html>


    