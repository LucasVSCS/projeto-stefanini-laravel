<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderDetails extends Pivot
{

    protected $table = "orders_details";

    public $timestamps = false;

    protected $fillable = ['order_id', 'product_id', 'product_quantity', 'product_unity_price'];

    /*
     * Função para inserir os dados da tabela pivot do pedido no banco de dados
     *
     * Recebe: Array com dados do pedido e do produto
     * Retorna: Uma instância da tabela pivot dos pedidos
     */

    public function insertOrderDetails(array $orderDetailsData)
    {

        $orderDetails = OrderDetails::create([
            'order_id' => $orderDetailsData['order_id'],
            'product_id' => $orderDetailsData['product_id'],
            'product_quantity' => $orderDetailsData['product_quantity'],
            'product_unity_price' => $orderDetailsData['product_unity_price'],
        ]);

        return $orderDetails;

    }

}
