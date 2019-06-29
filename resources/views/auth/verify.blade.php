@extends('layouts.top')

@section('content')
<div class="container">
<br>
<div class="panel panel-default">
        <div class="panel-heading">
            <b>Verify your Email Address</b>
        </div>
        <div class="panel-body">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</div>
@endsection
