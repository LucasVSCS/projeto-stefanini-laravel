@extends('layout')

@section('title', 'Ecommerce')

@section('card-header', 'Estoque disponível')

@section('body')

@include('includes.errors')

<div class="row row-cols-1 row-cols-md-3">
    @foreach ($products as $product)
    <div class="col mb-4">
        <div class="card h-100">
            <img class="card-img-top mx-auto img-fluid card-image" src="{{asset('images/' . $product->image_url)}}">
            <div class="card-body">
                <h6 class="card-title font-weight-bold">
                    {{$product->name}}
                </h6>
                <h6 class="card-title font-weight-light">
                    <small>
                        {{$product->category_name}}
                    </small>
                </h6>
                <h5 class="text-left font-weight-bold">
                    R$ {{$product->price}}
                </h5>

                @if ($product->stock_quantity > 0)
                <h6 class="text-right font-weight-bold">
                    {{$product->stock_quantity}} disponível (eis)
                </h6>
                @else
                <h6 class="text-right font-weight-bold">
                    Produto indisponível
                </h6>
                @endif
                <hr>
                <p class="card-text">{{$product->description}}</p>
            </div>
            <div class="card-footer">
                @if ($product->stock_quantity > 0)
                <form action="{{route('orders.checkout')}}" method="post">
                    <div class="input-group mb-3">
                        @csrf
                        <input type="hidden" name="product-code" value="{{$product->product_code}}">
                        <input type="number" min="1" max="{{$product->stock_quantity}}" class="form-control"
                            placeholder="Quantidade" name="product-quantity" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit">
                                Realizar compra
                            </button>
                        </div>
                    </div>
                </form>
                @else
                <button type="button" class="btn btn-warning btn-lg btn-block" disabled>
                    Estoque esgotado
                </button>
                @endif
            </div>
        </div>

    </div>
    @endforeach

</div>
<div class="mx-auto">
    {{$products->links()}}
</div>
@endsection