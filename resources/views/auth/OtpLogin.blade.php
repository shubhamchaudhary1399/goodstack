@extends('layouts.app')

@section('header')
<link rel="stylesheet" type="text/css" href="/css/login.css">
@endsection

@section('title', 'Login | goodstack')

@section('content')
<div class="top-banner">
    <div class="f-overlay">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-lg-6 d-none d-lg-block">
                    <h1 class="text-heading">There is a smarter way to login</h1>
                    <span class="text-wh">Login now using otp on email</span>
                </div>
                <div class="col-lg-6">
                <div class="card" style="max-width: 500px; margin: auto;">
                    <div class="card-header text-center my-card">{{ __('Login to goodstack') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('loginWithOtp') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" required autofocus>

                                </div>
                            </div>



                            <div class="form-group row otp">
                                <label for="password" class="col-md-4 col-form-label text-md-right">OTP</label>

                                <div class="col-md-6">

                                    <input id="otp" type="number" class="form-control" name="otp" >
                                </div>
                            </div>


                            <div class="form-group row mb-0 otp">
                              <div class="col-md-8">
                                      <a class="btn btn-link" href="/login">
                                      {{ __('Email/Password Login') }}
                                      </a>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class=" btn btn-default my-btn float-right">
                                        {{ __('Login') }}
                                    </button>

                                </div>
                            </div>
                        </form>
                        <div class="form-group row send-otp">
                            <div class="col-md-8 offset-md-4">
                                <button class="btn btn-success" onclick="sendOtp()">Send OTP</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>





    <script>
        $('.otp').hide();
        function sendOtp() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // alert($('#mobile').val());
            $.ajax( {
                url:'sendOtp',
                type:'post',
                data: {'email': $('#email').val()},
                success:function(data) {
                    // alert(data);
                    if(data != 0){
                        $('.otp').show();
                        $('.send-otp').hide();
                    }else{
                        alert('Email not found');
                    }

                },
                error:function () {
                    console.log('error');
                }
            });
        }
    </script>
@endsection
