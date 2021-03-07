<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderDetails extends Pivot
{

    protected $table = "orders_details";

    public $timestamps = false;

    protected $fillable = ['order_id', 'product_id', 'product_quantity', 'product_unity_price'];

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
