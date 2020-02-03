@extends('welcome')

@section('title')
    {{ __('Viewing order :no', ['no' => $order->number]) }}
@stop

@section('content')
<!-- Page Content -->
<div class="container pt-4">

    <h1>@yield('title')</h1>

    @include('customer.order.show.cards')
    <br>
    @include('customer.order.show.addresses')
    <br>
    @include('customer.order.show.items')
    <br>
    @include('customer.order.show.actions')
    <br>

</div>

@endsection
