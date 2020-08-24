<!DOCTYPE html>
<html>
<head>
    @include('layouts.links')
</head>
<body class="sign-in" oncontextmenu="return false;">

<div class="wrapper">		

<div class="sign-in-page">
<div class="signin-popup">
<div class="signin-pop">
<div class="row">
<div class="col-lg-6">
<div class="cmp-info">
<div class="cm-logo">
<img src="images/cm-logo.png" alt="">
<p>Workwise,  is a global freelancing platform and social networking where businesses and independent professionals connect and collaborate remotely</p>
</div><!--cm-logo end-->	
<img src="/assets/images/panel.png" alt="">			
</div><!--cmp-info end-->
</div>
<div class="col-lg-6">
<div class="login-sec">
<ul class="sign-control">
<li data-tab="tab-1" class="current"><a href="#" title="">Connectez - vous</a></li>				
<li data-tab="tab-2"><a href="#" title="">Inscrivez - vous</a></li>				
</ul>			
<div class="sign_in_sec current" id="tab-1">

<h3>Authentification</h3>
<form action="{{ url('auth-user') }}" method="post">
	@csrf
	
<div class="row">
<div class="col-lg-12 no-pdd">
	<div class="sn-field">
		<input type="text" name="email" placeholder="Email">
		<i class="la la-user"></i>
	</div><!--sn-field end-->
</div>
<div class="col-lg-12 no-pdd">
	<div class="sn-field">
		<input type="password" name="password" placeholder="Password">
		<i class="la la-lock"></i>
	</div>
</div>
<div class="col-lg-12 no-pdd">
	<button type="submit" value="submit">Connexion</button>
</div>
</div>
</form>
<div class="login-resources">
<h4>Login Via Social Account</h4>
<ul>
<li><a href="#" title="" class="fb"><i class="fa fa-facebook"></i>Login Via Facebook</a></li>
<li><a href="#" title="" class="tw"><i class="fa fa-twitter"></i>Login Via Twitter</a></li>
</ul>
</div><!--login-resources end-->
</div><!--sign_in_sec end-->
<div class="sign_in_sec" id="tab-2">
<div class="dff-tab current" id="tab-3">
<form action="{{ URL::to('/save-user') }}" method="post">
@csrf
<div class="row">
	<div class="col-lg-12 no-pdd {{ $errors->has('nom') ? 'has-error' : ''}} ">
		<div class="sn-field">
			<input type="text" value="{{old('nom')}}"  name="nom" placeholder="Nom">
			<i class="la la-user"></i>
		</div>
		{!! $errors->first('nom', '<span class="help-block text-danger">:message</span>' ) !!}
	</div>
	<div class="col-lg-12 no-pdd {{ $errors->has('prenom') ? 'has-error' : ''}}  ">
		<div class="sn-field">
			<input type="text" value="{{old('prenom')}}" name="prenom" placeholder="Prénom">
			<i class="la la-user"></i>
		</div>
		{!! $errors->first('prenom', '<span class="help-block text-danger">:message</span>' ) !!}
	</div>
	<div class="col-lg-12 no-pdd {{ $errors->has('phone') ? 'has-error' : ''}}  ">
		<div class="sn-field">
			<input type="text" name="phone" value="{{old('phone')}}" placeholder="Téléphone">
			<i class="la la-phone"></i>
		</div>
		{!! $errors->first('phone', '<span class="help-block text-danger">:message</span>' ) !!}
	</div>
	<div class="col-lg-12 no-pdd {{ $errors->has('email') ? 'has-error' : ''}}  ">
		<div class="sn-field">
			<input type="email" name="email" value="{{old('email')}}" placeholder="E-mail">
			<i class="la la-globe"></i>
		</div>
		{!! $errors->first('email', '<span class="help-block text-danger">:message</span>' ) !!}
	</div>
	<div class="col-lg-12 no-pdd {{ $errors->has('password') ? 'has-error' : ''}} ">
		<div class="sn-field">
			<input type="password" name="password" value="" placeholder="Mot de passe">
			<i class="la la-lock"></i>
		</div>
		{!! $errors->first('password', '<span class="help-block text-danger">:message</span>' ) !!}
	</div>
	<div class="col-lg-12 no-pdd {{ $errors->has('confirm') ? 'has-error' : ''}}  ">
		<div class="sn-field">
			<input type="password" name="confirm" placeholder="Confirme mot de passe">
			<i class="la la-lock"></i>
		</div>
		{!! $errors->first('confirm', '<span class="help-block text-danger">:message</span>' ) !!}
	</div>
	<div class="col-lg-12 no-pdd">
		<button type="submit" value="submit">S'Inscrire</button>
	</div>
</div>
</form>
</div><!--dff-tab end-->	
</div>		
</div><!--login-sec end-->
</div>
</div>		
</div><!--signin-pop end-->
</div><!--signin-popup end-->	
</div><!--sign-in-page end-->
</div><!--theme-layout end-->

<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
 		 @include('flashy::message')
<script type="text/javascript" src="{{ asset('assets/js/popper.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.mCustomScrollbar.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/lib/slick/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/scrollbar.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/script.js') }}"></script>

</body>

<!-- Mirrored from gambolthemes.net/workwise-new/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jun 2020 13:12:43 GMT -->
</html>