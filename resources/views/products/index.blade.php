@extends('layouts.top')

@section('content')
<div class="container">
<br>
    <div class="panel panel-default">
        <div class="panel-heading">
            <b>Produk</b>
        </div>
        <div class="panel-body">
    <div class="row mt-4">
        <div class="col-md-4 offset-md-8">
            <div class="form-group">
                <select id="order_field" class="form-control">
                    <option value="" disabled selected>Urutkan</option>
                    <option value="best_seller" >Best Seller</option>
                    <option value="terbaik" >Terbaik (Berdasarkan Rating)</option>
                    <option value="termurah" >Termurah</option>
                    <option value="termahal" >Termahal</option>
                    <option value="terbaru" >Terbaru</option>
                    <option value="best_viewer" >Best Viewer</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="mr-sm-2">Category</label>
                <select class="custom-select mr-sm-2" id="category_field">
                    <option disabled selected>Choose category...</option>
                    <option value="naruto">naruto</option>
                    <option value="onepunchman">onepunchman</option>
                    <option value="uncategorized">Uncategorized</option>
                </select>
            </div>
        </div>
    </div>

<div id="product-list">
    @foreach($products as $idx => $product)
        @if ($idx == 0 || $idx % 4 == 0)
            <div class="row mt-4">
        @endif
        
        <div class="col-md-3">
            <div class="card"> 
                <img src="{{ asset('image_files/'.$product->image_url) }}" class="card-img-top" alt="..." width="230px" height="150px">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('products.show', ['id' => $product->id]) }}">
                            {{ $product->name }}
                        </a>
                    </h5>
                    <p class="card-text">
                        {{ $product->price }}
                    </p>
                    <a href="{{ route('carts.add', ['id' => $product->id]) }}" class="btn btn-danger">membeli</a>
                </div>
            </div>
        </div>

        @if ($idx > 0 && $idx % 4 == 3)
            </div>
        @endif
    @endforeach
    </div>
    </div>
</div>

<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#order_field').change(function(){    
        // window.location.href='/?order_by' + $(this).val();
        $.ajax({
            type:'GET',
            url:'/products',
            data:{
                order_by: $(this).val(),
            },
            dataType:'json',
            success:function(data){
                var products ='';
                $.each(data,function(idx,product){
                    if(idx == 0 || idx % 4 == 0){
                        products += '<div class="row mt-4">';
                    }
                    products += '<div class="col-md-3">'+
                    '<div class="card">'+'<img src="/image_files/'+ product.image_url+'" class="card-img-top" alt="..." width="230px" height="150px">'+
                    '<div class="card-body">'+
                        '<h5 class="card-title">'+
                            '<a href="/products/'+product.id+'">'+
                            product.name+
                            '</a>'+
                        '</h5>'+
                        '<p class="card-text">'+
                        product.price+
                        '</p>'+
                        '<a href="/carts/add'+product.id+'" class="btn btn-danger">Beli</a>'+
                    '</div>'+
                '</div>'+
            '</div>';
            if(idx > 0 && idx % 4 == 3){
                products += '</div>';
                }
            });
        // update element
        $('#product-list').html(products);
            },
            error:function(data){
                alert('Unable to handle request');
            }
        });
    });
});    
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#category_field').change(function(){    
        // window.location.href='/?order_by' + $(this).val();
        $.ajax({
            type:'GET',
            url:'/products',
            data:{
                order_by: $(this).val(),
            },
            dataType:'json',
            success:function(data){
                var products ='';
                $.each(data,function(idx,product){
                    if(idx == 0 || idx % 4 == 0){
                        products += '<div class="row mt-4">';
                    }
                    products += '<div class="col-md-3">'+
                    '<div class="card">'+'<img src="/image_files/'+ product.image_url+'" class="card-img-top" alt="..." width="230px" height="150px">'+
                    '<div class="card-body">'+
                        '<h5 class="card-title">'+
                            '<a href="/products/'+product.id+'">'+
                            product.name+
                            '</a>'+
                        '</h5>'+
                        '<p class="card-text">'+
                        product.price+
                        '</p>'+
                        '<a href="/carts/add'+product.id+'" class="btn btn-danger">Beli</a>'+
                    '</div>'+
                '</div>'+
            '</div>';
            if(idx > 0 && idx % 4 == 3){
                products += '</div>';
                }
            });
        // update element
        $('#product-list').html(products);
            },
            error:function(data){
                alert('Unable to handle request');
            }
        });
    });
});
</script>
@endsection