@extends('layouts.top')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col">
			<h2>Tambah Alamat</h2>

			<br />
			@if(count($errors))
			<div class="form-group">
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
						<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			</div>
			@endif
			<br />

			<form action="{{ route('admin.orders.store') }}" method="POST">
            {{ csrf_field() }}
				<div class="form-group">
					<label>Alamat Pengiriman</label>
					<textarea name="shipping address" class="form-control" rows="3" placeholder="Alamat Pengiriman"></textarea>
				</div>
				<div class="form-group">
					<label>Kode Pos</label>
					<input type="number" name="zip_code" class="form-control" placeholder="Kode Pos">
				</div>
				<button type="submit" class="btn btn-danger">Simpan</button>
				</form>
			</div>
		</div>
	</div>
@endsection