@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                <div class="col mx-auto">
                    <div class="my-4 text-center">
                        <img src="{{asset('assets/images/logo-img.png')}}" width="180" alt="" />
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="p-4 rounded">
                                <div class="text-center">
                                    <h3 class="">{{ __('Sign Up') }}</h3>
                                    <p>Already have an account? <a href="{{route('login')}}">{{ __('Sign in here') }}</a>
                                    </p>
                                </div>
                                <div class="login-separater text-center mb-4"> <span>OR SIGN UP WITH EMAIL</span>
                                    <hr/>
                                </div>
                                <div class="form-body">
                                    <form method="POST" class="row g-3 ajax" action="{{ route('register') }}">
                                        @csrf
                                        <div class="col-sm-6">
                                            <label for="first_name" class="form-label">{{ __('First Name') }}</label>
                                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name"  placeholder="Jhon" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="last_name" class="form-label">{{ __('Last Name') }}</label>
                                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name"  placeholder="Deo" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">{{ __('Email Address') }}</label>
                                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required id="inputEmailAddress" placeholder="example@user.com">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">{{ __('Password') }}</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password" name="password" class="form-control border-end-0" id="inputChoosePassword" value="12345678" placeholder="Enter Password" autocomplete="new-password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputSelectCountry" class="form-label">{{ __('Country') }}</label>
                                            <select class="form-select" id="inputSelectCountry" aria-label="Default select example">
                                                <option selected>India</option>
                                                <option value="1">United Kingdom</option>
                                                <option value="2">America</option>
                                                <option value="3">Dubai</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                                <label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms & Conditions</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary"><i class='bx bx-user'></i>{{ __('Sign up') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
@endsection
