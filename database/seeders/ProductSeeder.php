<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('products')->insert([
            ['name' => 'Espuma de barbear', 'price' => '18.99', 'image_url' => 'espuma-image.png', 'product_code' => bin2hex(random_bytes(20)), 'description' => 'Espuma Barbear Prestobarba Pele Normal 200ml', 'stock_quantity' => 12, 'order_available' => 'S', 'category_id' => 1],
            ['name' => 'Absorvente intimo', 'price' => '6.99', 'image_url' => 'absorvente-image.png', 'product_code' => bin2hex(random_bytes(20)), 'description' => 'Macio, eficiente e com formato anatômico contendo 8 unidades', 'stock_quantity' => 15, 'order_available' => 'S', 'category_id' => 1],
            ['name' => 'Desodorante aerosol', 'price' => '10.99', 'image_url' => 'desodorante-image.png', 'product_code' => bin2hex(random_bytes(20)), 'description' => 'Unidade de desodorante aerosol 150ml', 'stock_quantity' => 1, 'order_available' => 'S', 'category_id' => 1],
            ['name' => 'Pacote de cotonetes', 'price' => '5.99', 'image_url' => 'cotonete-image.png', 'product_code' => bin2hex(random_bytes(20)), 'description' => 'Caixa de cotonetes contendo 75 unidades', 'stock_quantity' => 2, 'order_available' => 'S', 'category_id' => 1],
            ['name' => 'Condicionador capilar', 'price' => '13.99', 'image_url' => 'condicionador-image.png', 'product_code' => bin2hex(random_bytes(20)), 'description' => 'Unidade do condicionador capilar de 175ml', 'stock_quantity' => 18, 'order_available' => 'S', 'category_id' => 1],
            ['name' => 'Creme para pentear', 'price' => '15.99', 'image_url' => 'creme-image.png', 'product_code' => bin2hex(random_bytes(20)), 'description' => 'Creme de pentear para cabelos secos de 300ml', 'stock_quantity' => 15, 'order_available' => 'S', 'category_id' => 1],
            ['name' => 'Shampoo capilar', 'price' => '12.99', 'image_url' => 'shampoo-image.png', 'product_code' => bin2hex(random_bytes(20)), 'description' => 'Unidade do shampoo capilar para cabelos crespos de 200ml', 'stock_quantity' => 9, 'order_available' => 'S', 'category_id' => 1],
            ['name' => 'Sabonete em barra', 'price' => '1.99', 'image_url' => 'sabonete-image.png', 'product_code' => bin2hex(random_bytes(20)), 'description' => 'Sabonete em barra com aroma de coco', 'stock_quantity' => 5, 'order_available' => 'S', 'category_id' => 1],
            ['name' => 'Escova dental', 'price' => '5.99', 'image_url' => 'escova-image.png', 'product_code' => bin2hex(random_bytes(20)), 'description' => 'Unidade da escova dental com cerdas grossas', 'stock_quantity' => 2, 'order_available' => 'S', 'category_id' => 1],
        ]);
    }
}
