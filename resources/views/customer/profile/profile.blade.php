@extends('welcome')

@section('content')
    <!-- Page Content -->
    <div class="container pt-4">
        <h1>User Profile</h1>
        <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title mb-4">
                        <div class="d-flex justify-content-start">
                            <div class="image-container">
                                <img src="http://placehold.it/150x150" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                            </div>


                            <div class="userData ml-3">
                                <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold">{{ $user->name }}</h2>
                                <h6 class="d-block">0 Products</h6>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Products</a>
                                </li>
                            </ul>
                            <div class="tab-content ml-1" id="myTabContent">
                                <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">

                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Name</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{ $user->name }}
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Email</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{ $user->email }}
                                        </div>
                                    </div>
                                    <hr />

                                </div>
                                <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                    Facebook, Google, Twitter Account that are connected to this account
                                    <div class="row">
                                    @foreach($products as $product)
                                        <div class="col-lg-3 col-md-3 col-xs-4 mb-4">
                                            <div class="card h-100">
                                                <a href="#"><img class="card-img-top" src="{{ asset('img/lg.jpg') }}" alt=""></a>
                                                <div class="card-body">
                                                    <h4 class="card-title">
                                                        <a href="{{ route('product.show', $product) }}">{{$product->name}}</a>
                                                    <!-- <a href="viewproduct/{{$product}}">{{$product->name}}</a> -->
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
                                </div>

                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
        </div>
    </div>
    <!-- /.container -->
@endsection
