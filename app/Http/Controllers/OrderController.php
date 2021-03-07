<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function checkout(Request $request)
    {
        $product = new Product;

        $isAvailable = $product->verifyAvailableStock(
            $request->get('product-code'),
            $request->get('product-quantity')
        );

        if ($isAvailable) {

            return view('cart-checkout', [
                'productPrice' => $isAvailable->price,
                'productStock' => $isAvailable->stock_quantity,
                'productName' => $isAvailable->name,
                'productImage' => $isAvailable->image_url,
                'productCode' => $request->get('product-code'),
                'productQuantityOrder' => $request->get('product-quantity'),
                'finalOrderPrice' => ($isAvailable->price * $request->get('product-quantity')),
            ]);

        } else {
            dd('não tem nada');
        }

    }

}
