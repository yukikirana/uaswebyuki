@extends('layouts.top')

@section('content')

  
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <h3>
                {{ $product->name}}
            </h3>
            <div class="col-md-3">
                <img src="{{ asset('image_files/'.$product['image_url']) }}" class="card-img-top" alt="..." width=300>
            </div>
            <br>
            <br>
            <br>
            <br>    
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h4>
            Rp.{{ $product->price }}
            </h4>
            @for($i = 1; $i<=5; $i++)
                @if($i <= $rating)
                <span class="fa fa-star checked"></span>
                @else
                <span class="fa fa-star"></span>
                @endif
            @endfor
            
            <div class="mt-4">
               <a href="{{ route('carts.add', ['id' => $product['id']]) }}" class="btn btn-danger"> Beli</a>
            </div>
            
            <div class="mt-4">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#description" role="tab" data-toggle="tab">Deskripsi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#review" role="tab" data-toggle="tab">Review</a>
                    </li>
                </ul>

                
                <!-- Tab panes -->
                <div class="tab-content mt-2">
                
                    <div class="tab-pane fade in active show" id="description" role="tabpanel">
                        {!! $product->description !!}
                    </div>
                    <div class="tab-pane fade" role="tabpanel" id="review">
                        <form action="{{ route('products.store', ['id' => $product->id]) }}" method="POST">
                        @csrf
                            <div class="form-group">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <label>Rating</label><br>
                                <!-- rating radio -->
                                <input type="radio" name="rating" value="1">1 <br> 
                                <input type="radio" name="rating" value="2">2 <br>
                                <input type="radio" name="rating" value="3">3 <br>
                                <input type="radio" name="rating" value="4">4 <br>
                                <input type="radio" name="rating" value="5">5 <br>
                                <div class="form-group">
                                <br/>
                                    <label>Komentar</label>
                                    <textarea name="description" class="form-control" rows="3" placeholder="Deskripsi" id="ckview"></textarea>
                                </div>
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </form>
                        <div>
                        <h3>Semua Komentar</h3> <br/>
                        @foreach($reviews as $review)
                                <div class="col-md-12" style="background-color: #ecf0f1;margin-bottom: 2%">
                                    <div class="container">
                                        <div class="row" style="padding : 2% 0">
                                            <div class="col-md-3 text-md-center">
                                                <img src="https://fortunedotcom.files.wordpress.com/2018/07/gettyimages-961697338.jpg" class="img-circle" width="100px" height="100px" >
                                                <br>
                                                {{$review->created_at->diffForHumans()}}
                                            </div>
                                            <div class="col-md-8" style="text-align: justify; text-justify: inter-word">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <b class="text text-primary">{{$review->user->name}}</b>
                                                    </div>
                                                    <div class="col-md-8 text-md-right">
                                                    Rating gived :
                                                    @for($i=1 ; $i <=5 ; $i++)
                                                        @if($i<=$review->rating)
                                                            <span class="fa fa-star checked"></span>
                                                        @endif
                                                    @endfor
                                                    </div>
                                                </div>
                                                {!! $review->description !!}
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="mt-2">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('products.show', ['id' => $product['id']]) }}" class="social-button" target="_blank">
                Share Facebook
            </a>|

            <a href="https://twitter.com/intent/tweet?text=my share text&amp:url={{ route('products.show', ['id' => $product['id']]) }}" class="social-button" target="_blank">
                Share Twitter
            </a>|

            <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('products.show', ['id' => $product['id']]) }}&amp;title=my share text&amp;summary=dit is de linkedin summary" class="social-button" target="_blank">
                Share Linkedin
            </a>|

            <a href="https://wa.me/?text={{route('products.show', ['id' => $product['id']]) }}" class="social-button" target="blank">
                Share Whatsapp
            </a>|
        </div>
        <br>
</div>
@endsection

<script src="{{url('plugins/tinymce/jquery.tinymce.min.js')}}"></script>
<script src="{{url('plugins/tinymce/tinymce.min.js')}}"></script>
<script>tinymce.init({ selector: '#ckview' });</script>