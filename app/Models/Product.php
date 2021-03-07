<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    /*
     * Função para retornar todos os produtos disponíveis para venda do estoque da loja
     *
     * Retorna: Uma collection com os produtos armazenados no BD
     */

    public function getAllProducts()
    {
        $products = Product::select('products.*', 'categories.name as category_name')
            ->where('order_available', 'S')
            ->join('categories', 'products.category_id', 'categories.id')
            ->orderBy('products.stock_quantity', 'desc')
            ->paginate(6);

        return $products;
    }

    /*
     * Função para verificar a disponibilidade de um produto no estoque pelo seu código único
     *
     * Recebe: Uma string com o código do produto e um inteiro da quantidade solicitada
     * Retorna: Uma collection com os dados do produto selecionado
     */

    public function verifyAvailableStock(String $productCode, int $productQuantity)
    {
        $product = Product::select('id', 'price', 'stock_quantity', 'name', 'image_url')
            ->where('product_code', $productCode)
            ->where('stock_quantity', '>=', $productQuantity)
            ->first();

        return $product;
    }

    /*
     * Função para atualizar os dados do estoque do produto no BD
     *
     * Recebe: Array com dados do produto
     * Retorna: Uma instância do produto atualizado no BD
     */

    public function updateAvailableStock(array $productDetails)
    {
        $product = $this->verifyAvailableStock(
            $productDetails['product_code'],
            $productDetails['product_quantity']
        );

        $product->stock_quantity -= $productDetails['product_quantity'];
        $product->save();

        return $product;

    }

}
