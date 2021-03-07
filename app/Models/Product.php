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

    public function verifyAvailableStock($productCode, $productQuantity)
    {
        $product = Product::select('price', 'stock_quantity', 'name', 'image_url')
            ->where('product_code', $productCode)
            ->where('stock_quantity', '>=', $productQuantity)
            ->first();

        return $product;
    }

}
