@extends('welcome')

@section('title')
    {{ __('Viewing order :no', ['no' => $order->number]) }}
@stop

@section('content')
    <!-- Page Content -->
    <div class="container pt-4">

        <h1>@yield('title')</h1>

        @include('order.show.cards')
        <br>
        @include('order.show.addresses')
        <br>
        @include('order.show.items')
        <br>

    </div>

@endsection
