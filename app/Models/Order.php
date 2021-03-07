<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";

    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable = ['date', 'final_price', 'user_id'];

    /*
     * Função para inserir os dados do pedido no banco de dados
     *
     * Recebe: Array com dados do pedido
     * Retorna: Uma instância do pedido recém registrado
     */

    public function insertOrder(array $orderData)
    {

        $order = Order::create([
            'date' => $orderData['date'],
            'final_price' => $orderData['final_price'],
            'user_id' => $orderData['user_id'],
        ]);

        return $order;

    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
