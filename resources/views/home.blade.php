@extends('layouts.top')

@section('content')
<div class="container">
<br>
<div class="panel panel-default">
        <div class="panel-heading">
            <b>Dashboard</b>
        </div>
        <div class="panel-body">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ session('status') }}
                    @endif
                    
                    <h2>Halo</h2>
                    Selamat Datang {{ Auth::user()->name }}.
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</div>
@endsection
