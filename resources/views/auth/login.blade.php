 <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('/backend') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('/backend') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/backend') }}/dist/css/adminlte.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('/backend/plugins/toastr/toastr.css') }}">
  <style type="text/css">
.button-60 {
  align-items: center;
  appearance: none;
  background-color: #fff;
  border: 1px solid #dbdbdb;
  border-radius: .375em;
  box-shadow: none;
  box-sizing: border-box;
  color: #363636;
  cursor: pointer;
  display: inline-flex;
  font-family: BlinkMacSystemFont,-apple-system,"Segoe UI",Roboto,Oxygen,Ubuntu,Cantarell,"Fira Sans","Droid Sans","Helvetica Neue",Helvetica,Arial,sans-serif;
  font-size: 1rem;
  height: 2.2em;
  justify-content: center;
  line-height: 1.5;
  padding: calc(.5em - 1px) 1em;
  position: relative;
  text-align: center;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: top;
  white-space: nowrap;
}

.button-60:active {
  border-color: #4a4a4a;
  outline: 0;
}

.button-60:focus {
  border-color: #485fc7;
  outline: 0;
}

.button-60:hover {
  border-color: #b5b5b5;
}

.button-60:focus:not(:active) {
  box-shadow: rgba(72, 95, 199, .25) 0 0 0 .125em;
}
  </style>

<div class="login-page dark-mode">
        <div class="login-box">
          <!-- /.login-logo -->
          <div class="card card-outline card-primary">
            <div class="card-header text-center">
              <a href="{{ url('/') }}" class="h1"><b>Educo Lab</b></a>
            </div>
            <div class="card-body">
              <p class="login-box-msg">Please Login Here</p>

              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group mb-3">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
                @if (session('error'))
                      <strong style="color: red;">  {{ session('error') }} </strong>
                @endif
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="input-group mb-3">
                   <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="row">
                  <div class="col-8">
                    <div class="icheck-primary">
                      <input type="checkbox"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label for="remember">
                        Remember Me
                      </label>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block button-60">Log In</button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>
              <p class="mb-1">
                <a href="#">I forgot my password</a>
              </p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <a href="{{ route('register') }}" class="button-60" style="margin-top: 15px;">Registration</a>
</div>

<script type="text/javascript" src="{{ asset('/backend/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('/backend/plugins/sweetalert/sweetalert.min.js') }}"></script>
