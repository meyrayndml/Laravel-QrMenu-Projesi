@extends('admin.panel')

@section('content')
<div class="login-box">

<div class="card card-outline card-primary">
<div class="card-header text-center">
<a href="/login" class="h1">{{ __('Giriş Yap') }}</a>
</div>
<div class="card-body">
<p class="login-box-msg">Oturumunuzu başlatmak için oturum açın</p>
<form method="POST" action="{{ route('login') }}">
@csrf
<div class="input-group mb-3">
<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Adresiniz">
@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-envelope"></span>
</div>
</div>
</div>
<div class="input-group mb-3">
<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Şifre">
@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-lock"></span>
</div>
</div>
</div>
<div class="row">
<div class="col-8">
<div class="icheck-primary">
<input type="checkbox" id="remember" >
<label for="remember">
Beni Hatırla
</label>
</div>
</div>

<div class="col-4">
 <button type="submit" class="btn btn-primary btn-block" > Giriş Yap</button>
</div>

</div>
</form>
<!--<div class="social-auth-links text-center mt-2 mb-3">
<a href="#" class="btn btn-block btn-primary">
<i class="fab fa-facebook mr-2"></i> Sign in using Facebook
</a>
<a href="#" class="btn btn-block btn-danger">
<i class="fab fa-google-plus mr-2"></i> Sign in using Google+
</a>
</div>-->

<p class="mb-1">
<a href="forgot-password.html">Şifreyi Unuttum</a>
</p>
<p class="mb-0">
<a href="/register" class="text-center">Yeni üyelik oluştur</a>
</p>
</div>

</div>

</div>
@endsection
