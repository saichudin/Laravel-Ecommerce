@extends('welcome')

@section('content')
<section class="htc__category__area ptb--100">
            <div class="container">

                <div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30">
                            <!-- Start Single Category -->
                            @foreach($products as $product) 
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="product/{{$product->id}}-{{$product->slug}}">
                                            <img src="{{ asset('images/product/1.jpg') }}" alt="product images">
                                        </a>
                                    </div>
                                    <div class="fr__hover__info">
                                        <ul class="product__action">
                                            <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                            <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                            <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="fr__product__inner">
                                        <h4><a href="product-details.html">{{$product->name}}</a></h4>
                                        <ul class="fr__pro__prize">
                                            <li>${{$product->price}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            
                            <!-- End Single Category -->
                        </div>
                    </div>
                </div>
            </div>
</section>
@endsection