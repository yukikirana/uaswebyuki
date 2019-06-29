@extends('layouts.top')

@section('content')
<div class="container">
<br>
<div class="panel panel-default">
        <div class="panel-heading">
            <b>Cart</b>
        </div>
        <div class="panel-body">
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%">Option</th>
        </tr>
        </thead>
        <tbody>
        
        <?php $total = 0 ?>

        @if(session('cart'))
        @foreach(session('cart') as $id => $product)

        <?php $total += $product['price'] * $product['quantity'] ?>

        <tr>
            <td data-th="Product">
                <div class="row">
                    <div class="col-sm-3 hidden-xs"><img src="{{ asset('image_files/'.$product['image_url']) }}" width="100" height="100" class="img-responsive"/></div>
                    <div class="col-sm-9">
                        <h4 class="nomargin">{{ $product['name'] }}</h4>
                    </div>
                </div>
            </td>
        <td data-th="Price">Rp.{{ $product['price'] }}</td>
        <td data-th="Quantity">
            <input type="number" value="{{ $product['quantity'] }}" class="form-control quantity" />
        </td>
        <td data-th="Subtotal" class="text-center">Rp.{{ $product['price'] * $product['quantity'] }}</td>
        <td class="action">
            <button class="btn btn-warning btn-sm mt-2 update-cart" data-id="{{ $id }}">Update</button>
            <button class="btn btn-danger btn-sm mt-2 remove-from-cart" data-id="{{ $id }}">Remove</button>
        </td>
        </tr>
        @endforeach
        @endif
        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong>Total {{ $total }}</strong></td>
        </tr>
        <tr>
            <td>
            <br>
            <a href="{{ url('/products') }}" class="btn btn-danger"><i class="fa fa-angle-left"></i> Lanjutkan Belanja</a>
            <a href="{{ route('admin.orders.create') }}" class="btn btn-danger">Bayar <i class="fa fa-angle-right"></i></a>
            </td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total Rp.{{ $total }}</strong></td>
        </tr>
        </tfoot>
    </table>
    </div>
    </div>
</div>

<!-- Jquery -->
<script> src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".update-cart").click(function (e) {
            e.preventDefault();
            console.log('aaaa');
            var ele = $(this);

            $.ajax({
                url: '{{ route('carts.update') }}',
                method: "patch",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()}, success: function (response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ route('carts.remove') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")}, success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    });
</script>
@endsection