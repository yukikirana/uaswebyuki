@extends('layouts.top')

@section('content')
<div class="container">
<br>
    <div class="panel panel-default">
        <div class="panel-heading">
            <b>Register</b>
        </div>
        <div class="panel-body">
            <div class="row justify-content-center">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <br>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Yuki Kirana" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="yukikirana2@gmail.com" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" onkeyup="passwordStrength(this.value)" required>
                                        <a href="#" onclick="passToggle() "id="show">Lihat Password</a><br>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">

                                    <div class="col-md-6 offset-md-4">
                                        <button type="reset" class="btn btn-warning">
                                            Reset
                                        </button>
                                        <button type="submit" class="btn btn-danger">
                                            {{ __('Register') }}
                                        </button>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<script>
    function passwordStrength(p){
        var status = document.getElementById('status');
        var regex = new Array();
        regex.push("[A-Z]");
        regex.push("[a-z]");
        regex.push("[0-9]");
        regex.push("[!@#$%^&*]");
        
        var passed = 0;
        
        for(var x = 0; x < regex.length;x++){
            if(new RegExp(regex[x]).test(p)){
                console.log(passed++);
            }
        }
        
        var strength = null;
        var color = null;
        
        switch(passed){
            case 0:
            case 1:
            case 2:
                strength = "Tidak Aman";
                color = "#FF3232";
            break;
            case 3:
                strength = "Cukup Aman";
                color = "#E1D441";
            break;
            case 4:
                strength = "Sangat Aman";
                color = "#27D644";
        }
        
        status.innerHTML = strength;
        status.style.color = color;
    }

// fungsi untuk menampilkan dan menyembunyikan password

function passToggle(){
    var pass = document.getElementById('password');
    var showbtn = document.getElementById('show');
    
    // kalau type inputnya password
    
    if(pass.type == 'password'){
        pass.type = 'text';
        showbtn.innerHTML = 'Sembunyikan';
        }else{
            pass.type = 'password';
            showbtn.innerHTML = 'Lihat Password'; 
        }
    }
</script>

@endsection

