@extends('welcome')

@section('content')
<!-- Page Content -->
<div class="container pt-4">

<div class="row">
        <div class="col-sm-6 col-md-4">
            @component('appshell::widgets.card_with_icon', [
                    'icon' => $product->is_active ? 'layers' : 'layers-off',
                    'type' => $product->is_active ? 'success' : 'warning'
            ])
                {{ $product->name }}
                @if (!$product->is_active)
                    <small>
                        <span class="badge badge-secondary">
                            {{ __('inactive') }}
                        </span>
                    </small>
                @endif
                @slot('subtitle')
                    {{ $product->sku }}
                @endslot
            @endcomponent
        </div>

        <div class="col-sm-6 col-md-5">
            @component('appshell::widgets.card_with_icon', [
                    'icon' => 'time-restore',
                    'type' => 'info'
            ])
                {{ $product->state }}

                @slot('subtitle')
                    {{ __('Updated') }}
                    {{ $product->updated_at->diffForHumans() }}
                    |
                    {{ __('Created at') }}
                    {{ $product->created_at->format(__('Y-m-d H:i')) }}
                @endslot
            @endcomponent
        </div>

        <div class="col-sm-6 col-md-3">
            @component('appshell::widgets.card_with_icon', ['icon' => 'mall'])
                {{ $product->units_sold ?: '0' }}
                {{ __('units sold') }}
                @slot('subtitle')
                    @if ($product->last_sale_at)
                        {{ __('Last sale at') }}
                        {{ $product->last_sale_at->format(__('Y-m-d H:i')) }}
                    @else
                        {{ __('No sales were registered') }}
                    @endif
                @endslot
            @endcomponent
        </div>

        <div class="col-sm-6 col-md-9">
            @include('vanilo::product._show_categories')
            @include('vanilo::product._show_properties')
        </div>

        <div class="col-sm-6 col-md-3">
            @include('vanilo::product._show_images')
        </div>
    </div>

    <div class="card">
        <div class="card-block">
            @can('edit products')
            <a href="{{ route('customer.product.edit', $product) }}" class="btn btn-outline-primary">{{ __('Edit product') }}</a>
            @endcan

            @can('delete products')
                {!! Form::open(['route' => ['customer.product.destroy', $product], 'method' => 'DELETE', 'class' => "float-right"]) !!}
                <button class="btn btn-outline-danger">
                    {{ __('Delete product') }}
                </button>
                {!! Form::close() !!}
            @endcan

        </div>
    </div>

</div>
<!-- /.container -->
@endsection