@extends('layouts.top')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <h2>Tambah Product</h2>
            <br/>
            @if(count($errors))
                <div class="form-group">
                    <div clas="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <br/>

            <form action="{{ route('admin.products.store') }}" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" name="name" class="form-control" placeholder="Nama Produk">
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="price" class="form-control" placeholder="Harga">
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Deskripsi"></textarea>
                </div>
                <div class="from-group mt-4">
                    <label for="category">Kategori</label>
                    <select name="category" class="form-control">
                        <option disabled selected>Choose category...</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
</div>
                <div class="form-group increment">
					<label>Image</label>
					<input required type="file" name="image_url" class="form-control">
				</div>
                <a href="{{ route('admin.products.index') }}" class="btn btn-warning">Back</a>
                <button type="submit" class="btn btn-danger">Submit</button>
            </form>        
        </div>
    </div>
</div>
@endsection