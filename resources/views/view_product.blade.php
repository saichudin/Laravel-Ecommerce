@extends('welcome')

@section('content')
<!-- Page Content -->
<div class="container pt-4">

<div class="row">

  <div class="col-lg-12">

    <div class="card mt-4">
      <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">
      <div class="card-body">
        <h3 class="card-title">{{$product->name}}</h3>
          Seller : <a href="/profile/{{$product->id}}" class="btn-sm btn-primary">{{$seller->name}}</a>
        <h4>${{$product->price}}</h4>
        <p class="card-text">{{$product->description}}</p>
        <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
        4.0 stars
        <br><br>
        <form action="{{ route('cart.add', $product) }}" method="post" class="mb-4">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-warning btn-sm" >Add to cart</button>
        </form>
      </div>
    </div>
    <!-- /.card -->

    <div class="card card-outline-secondary my-4">
      <div class="card-header">
        Product Reviews
      </div>
      <div class="card-body">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
        <small class="text-muted">Posted by Anonymous on 3/1/17</small>
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
        <small class="text-muted">Posted by Anonymous on 3/1/17</small>
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
        <small class="text-muted">Posted by Anonymous on 3/1/17</small>
        <hr>
        <a href="#" class="btn btn-success">Leave a Review</a>
      </div>
    </div>
    <!-- /.card -->

  </div>
  <!-- /.col-lg-9 -->

</div>

</div>
<!-- /.container -->
@endsection
