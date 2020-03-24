<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
</head>
<body class="loginpage">
	<div class="loginbox">
		<div class="logo">
			<center><img style="padding: 0px 0px 5px 0px;" src="{{asset('/images/icons/logo/logo.png')}}" alt="" /></center> <!-- margin:80px 0px -80px 0px; -->
    	</div><!--logo-->
    	<div class="loginboxinner">
            
            <form action="{{ route('login') }}" method="post">
            	@csrf 
                <label for="email" class="" style="color:white; font-size:20pt;">{{ __('E-Mail Address') }}</label>                   
                <div class="username">
                
                <div class="usernameinner">
                            
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                <label for="password" class="col-md-4 col-form-label text-md-right" style="color:white; font-size:20pt;">{{ __('Password') }}</label>
                <div class="password">
                <div class="passwordinner">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br/>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember" style="color:white; font-size:10pt;">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
<br/><br/>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
            </form>
            
        </div><!--loginboxinner-->
    </div><!--loginbox-->
</body>
</html>
