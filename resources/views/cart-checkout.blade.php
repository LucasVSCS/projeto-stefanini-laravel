@extends('layout')

@section('title', 'Carrinho de compras')

@section('card-header', 'Finalizar compra')


@section('body')

<div class="row pt-4 pl-4 pr-4 pb-4">
    <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Seu carrinho</span>
        </h4>
        <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed flex-fill align-items-center">
                <img class="card-img-top img-fluid card-image" src="{{asset('images/' . $productImage)}}">
                <div class="align-items-end text-muted">
                    Qtnd: x{{$productQuantityOrder}}
                </div>
                <div>
                    <div>
                        <h6 class="my-0">{{$productName}}</h6>
                    </div>
                    <span class="text-muted">{{'R$'.$productPrice}}</span>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <span>Total (R$)</span>
                <strong>R${{$finalOrderPrice}}</strong>
            </li>
        </ul>
    </div>
    <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Dados de cobrança</h4>
        <form action="{{route('orders.store')}}" method="POST">
            @csrf
            <input type="hidden" name="product-code" value="{{$productCode}}">
            <input type="hidden" name="order-price" value="{{$finalOrderPrice}}">
            <input type="hidden" name="product-quantity" value="{{$productQuantityOrder}}">
            <div class="mb-3">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="zip">CEP</label>
                    <input type="text" class="form-control" id="zip" name="zip" required>
                    <small id="zip-warning" class="form-text text-muted font-weight-bold">Digite um CEP válido</small>
                </div>

                <div class="col-md-3 pt-4 mt-2">
                    <button id="zip-check" class="btn btn-info" type="button">
                        Consultar CEP
                    </button>
                </div>
            </div>
            <div class="mb-3">
                <label for="address">Endereço</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="mb-3">
                <label for="address2">Complemento <span class="text-muted">(Opcional)</span></label>
                <input type="text" class="form-control" id="address2" name="address2">
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="state">Estado</label>
                    <input type="text" class="form-control" id="state" name="state" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="city">Cidade</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="number">Número</label>
                    <input type="number" class="form-control" id="number" name="number" required>
                </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Finalizar compra</button>
            <a class="btn btn-secondary btn-lg btn-block" href="{{ url()->previous() }}">Voltar</a>
        </form>
    </div>
</div>

@endsection