@extends('layouts.register')

@section('content')

<div class="container-fluid">
    <div class="container p-0">
        <div class="align-self-center align-content-center">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row justify-content-center">
                        <div class="register-image col-lg-7">  
                        </div>
                        <div class="col-lg-5 p-0">
                            <div class="p-5">
                                <!-- <main class="form-registration w-100 m-auto"> -->

                                <h1 class="h4 mb-4 fw-normal text-center">{{ __('Create an Account!') }}</h1>

                                <form class="user" action="{{ route('register') }}" method="POST">
                                 @csrf
                                  <div class="form-group">
                                    <!-- <label for="name">{{ __('Name') }}</label> -->
                                    <input type="text" class="form-control-user form-control @error('name') is-invalid @enderror " id="name" name="name" placeholder="Name" required value="{{ old('name') }}">
                                    
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <!-- <label for="email">{{ __('Email Address') }}</label> -->
                                    
                                        <input type="email" class="form-control-user form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" required value="{{ old('email') }}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    
                                    
                                  </div>
                                  <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <!-- <label for="password">{{ __('Password') }}</label> -->
                                        <div class="">
                                            <input type="password" class="form-control-user form-control @error('password') is-invalid @enderror" id="password" name="password"  placeholder="Password" required autocomplete="new-password">
                                            <i class="fa fa-eye me-3 register-eye" id="togglePassword"></i> 
                                        </div>
                                        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <!-- <label for="password-confirm">{{ __('Confirm Password') }}</label> -->
                                        <input type="password" class="form-control-user form-control @error('password-confirm') is-invalid @enderror" id="passwordConfirm" name="password_confirmation"  placeholder="Repeat Password" required autocomplete="new-password">
                                        <i class="fa fa-eye me-3 register-eye" id="togglePassword2"></i>
                                        @error('password-confirm')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                  </div>
                                  <button class="w-100 btn btn-lg btn-primary mb-2" type="submit">{{ __('Register') }}</button>
                                </form>
                                <hr>
                                <div class="text-center mt-3">
                                    <a class="small" href="/login">Already have an account? Login!</a>
                                </div>
                                <!-- <small  class="d-block text-center mt-3">Allready registered ? <a href="/login"> login </a></small> -->
                              <!-- </main> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer -->
            <footer class="sticky-footer text-white p-0">
                <div class="container my-auto">
                    <div class="copyright text-center mb-3 pt-4">
                        <span>Copyright &copy; General Affair 2022</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>

<script type="">
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('fa-eye-slash');
    });

    const togglePassword2 = document.querySelector('#togglePassword2');
    const passwordConfirm = document.querySelector('#passwordConfirm');

    togglePassword2.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordConfirm.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('fa-eye-slash');
    });
</script>

@endsection


