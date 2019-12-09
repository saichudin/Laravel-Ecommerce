@extends('welcome')

@section('content')
  <!-- Page Content -->
  <div class="container pt-4">

    <div class="row">

      <div class="col-lg-12">

        <div class="row">

          @foreach($products as $product)  
          <div class="col-lg-3 col-md-3 col-xs-4 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="{{ asset('img/lg.jpg') }}" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="viewproduct/{{$product->id}}">{{$product->name}}</a>
                </h4>
                <h5>${{$product->price}}</h5>
                <p class="card-text">{{$product->description}}</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
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