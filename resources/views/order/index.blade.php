@extends('welcome')

@section('title')
    {{ __('Customer Orders') }}
@stop

@section('content')
    <!-- Page Content -->
    <div class="container pt-4">

        <h1>@yield('title')</h1>

        <div class="card-block">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>{{ __('Number') }}</th>
                    <th>{{ __('Ordered') }}</th>
                    <th>{{ __('Ship To') }}</th>
                    <th>{{ __('Status') }}</th>
                </tr>
                </thead>

                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>
                            <span class="font-lg mb-3 font-weight-bold">
                            @can('view orders')
                                    <a href="{{ route('order.show', $order) }}">{{ $order->number }}</a>
                                @else
                                    {{ $order->number }}
                                @endcan
                            </span>
                            <div class="text-muted">
                                {{ $order->billpayer->getName() }}
                            </div>
                        </td>
                        <td>
                            <span class="mb-3" title="{{ $order->created_at }}">
                                {{ $order->created_at->diffForHumans() }}
                            </span>
                            <div class="text-muted" title="{{ __('Order Total') }}">
                                {{ format_price($order->total()) }}
                            </div>
                        </td>
                        <td>
                            <?php $shippingAddress = $order->getShippingAddress(); ?>
                            @if($shippingAddress)
                                <span class="mb-3">
                                 {{ $shippingAddress->getCity() }}
                                </span>
                                <div class="text-muted">{{ $shippingAddress->country->name }}</div>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <div class="mt-2">
                                <span class="badge badge-pill badge-{{$order->status->is_completed ? 'success' : 'secondary'}}">
                                    {{ $order->status->label() }}
                                </span>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

            @if($orders->hasPages())
                <hr>
                <nav>
                    {{ $orders->links() }}
                </nav>
            @endif

        </div>

    </div>
    <!-- /.container -->
@endsection
