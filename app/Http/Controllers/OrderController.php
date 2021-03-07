<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\User;
use App\Models\UserAddress;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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

        $validator = Validator::make($request->all(), [
            'product-code' => ['required'],
            'product-quantity' => ['required', 'numeric'],
            'order-price' => ['required', 'numeric'],
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'zip' => ['required', 'string'],
            'address' => ['required', 'string'],
            'address2' => ['nullable', 'string'],
            'state' => ['required', 'string'],
            'city' => ['required', 'string'],
            'number' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('products.index')
                ->with('error', 'Erro ao registrar o pedido, verifique todos os dados e tente novamente.');
        }

        DB::transaction(function () use ($request) {
            // Armazenando os dados do usuário
            $userData = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ];
            $user = new User();
            $userResponse = $user->insertUser($userData);

            // Armazenando os dados do endereço do usuário
            $userAddressData = [
                'zip' => $request->input('zip'),
                'address' => $request->input('address'),
                'second_address' => $request->input('address2'),
                'number' => $request->input('number'),
                'city' => $request->input('city'),
                'state' => $request->input('state'),
                'user_id' => $userResponse->id,
            ];
            $userAddress = new UserAddress();
            $userAddressResponse = $userAddress->insertUserAddress($userAddressData);

            // Armazenando os dados do produto
            $productData = [
                'product_code' => $request->input('product-code'),
                'product_quantity' => $request->input('product-quantity'),
            ];
            $product = new Product();
            $productResponse = $product->updateAvailableStock($productData);

            // Armazenando os dados do pedido
            $orderData = [
                'date' => Carbon::now()->toDateTimeString(),
                'final_price' => $request->input('order-price'),
                'user_id' => $userResponse->id,
            ];
            $order = new Order();
            $orderResponse = $order->insertOrder($orderData);

            // Armazenando os dados do produto no pedido
            $orderDetailsData = [
                'order_id' => $orderResponse->id,
                'product_id' => $productResponse->id,
                'product_quantity' => $request->input('product-quantity'),
                'product_unity_price' => $productResponse->price,
            ];
            $orderDetails = new OrderDetails();
            $orderDetailsResponse = $orderDetails->insertOrderDetails($orderDetailsData);

        });

        return redirect()
            ->route('products.index')
            ->with('success', 'Sucesso ao registrar o pedido!');

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
            return redirect()
                ->route('products.index')
                ->with('error', 'Erro ao registrar o carrinho de compras, verifique todos os dados e tente novamente.');
        }

    }

}
