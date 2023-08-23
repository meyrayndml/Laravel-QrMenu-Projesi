@extends('admin.panel')

@section('content')

<div class="register-box">
<div class="register-logo">
</div>
<div class="card">
<div class="card-body register-card-body">
<p class="login-box-msg">Yeni üyelik oluştur</p>
<form method="POST" action="{{ route('register') }}">
@csrf
<div class="input-group mb-3">
<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus  placeholder="Tam isim">
@error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-user"></span>
</div>
</div>
</div>
<div class="input-group mb-3">
<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
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
<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"placeholder="Şifre">

<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-lock"></span>
</div>
</div>
</div>
<div class="input-group mb-3">
<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Şifre tekrarı">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-lock"></span>
</div>
</div>
</div>
<div class="row">
<div class="col-8">
<div class="icheck-primary">
<input type="checkbox" id="agreeTerms" name="terms" value="agree">
<label for="agreeTerms">
Tüm <a href="#"> şartları </a>kabul ediyorum.
</label>
</div>
</div>

<div class="col-4">
<button type="submit" class="btn btn-primary btn-block">Kayıt Ol</button>
</div>

</div>
</form>

<a href="/login" class="text-center">Zaten bir hesabım var.</a>
</div>

</div>
</div>


<script src="../../assets/plugins/jquery/jquery.min.js"></script>

<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../../assests/js/adminlte.min.js?v=3.2.0"></script>


</body>
@endsection
