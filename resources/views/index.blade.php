@extends('welcome')

@section('content')
  <!-- Page Content -->
  <div class="container pt-4">

    <div class="row">

      <div class="col-lg-12">

        <div class="row">
        
         <div class="col-lg-3 col-md-3 col-xs-4 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">Item Two</a>
                </h4>
                <h5>$24.99</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor sit amet.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>
          @foreach($products as $product)  
          <div class="col-lg-3 col-md-3 col-xs-4 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="{{ asset('img/lg.jpg') }}" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="product/{{$product->id}}-{{$product->slug}}">{{$product->name}}</a>
                </h4>
                <h5>${{$product->price}}</h5>
                <p class="card-text">{{$product->description}}</p>
              </div>
              <div class="card-footer">
                <a class="btn btn-warning btn-sm">add cart</a>
              </div>
            </div>
          </div>
          @endforeach

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-12 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

@endsection