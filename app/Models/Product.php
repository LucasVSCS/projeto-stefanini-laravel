<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function getAllProducts()
    {
        $products = Product::select('products.*', 'categories.name as category_name')
            ->where('order_available', 'S')
            ->join('categories', 'products.category_id', 'categories.id')
            ->orderBy('products.stock_quantity', 'desc')
            ->paginate(6);

        return $products;
    }

    public function verifyAvailableStock(String $productCode, int $productQuantity)
    {
        $product = Product::select('id', 'price', 'stock_quantity', 'name', 'image_url')
            ->where('product_code', $productCode)
            ->where('stock_quantity', '>=', $productQuantity)
            ->first();

        return $product;
    }

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
