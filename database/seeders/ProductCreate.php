<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductCreate extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create(
            [
                "nama_produk" => "Paket Advance",
                "deskripsi_produk" => "Paket Advance",
                "harga_produk" => 1000000,
                "kategori_id" => 1,
                "image" => "http://127.0.0.1:8000/image_product/paket-advance.png"
            ]
        );
    }
}
