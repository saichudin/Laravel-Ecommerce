@extends('welcome')

@section('content')

    <div class="container pt-4">
    <h1>Wonderful {{ $order->getBillpayer()->firstname }}!</h1>
        <hr>

        <div class="alert alert-success">Your order has been registered with number
            <strong>{{ $order->getNumber() }}</strong>.
        </div>

        <h3>Next Steps</h3>

        <ol>
            <li>Your order will be prepared in the next 24 hours.</li>
            <li>Your package will be handed over to the courier.</li>
            <li>You'll receive an E-mail with the Shipment Information.</li>
        </ol>

        <div>
            <a href="/" class="btn btn-info">Continue Shopping</a>
        </div>
    </div>
@endsection
