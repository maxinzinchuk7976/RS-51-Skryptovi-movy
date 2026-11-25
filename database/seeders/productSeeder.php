<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class productSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('product')->upsert([
            ['id' => 1, 'name' => "Джинси", 'cost' => 1000, 'photo_path' => "images/product/1.jpg", 'brand' => "Colin's", 'material' => "Денім"],
            ['id' => 2, 'name' => "Сорочка", 'cost' => 1350, 'photo_path' => "images/product/2.webp", 'brand' => "Tommy Hilfiger", 'material' => "Бавовна"],
            ['id' => 3, 'name' => "Худі", 'cost' => 2400, 'photo_path' => "images/product/3.webp", 'brand' => "Nike", 'material' => "Бавовна з поліестером"],
            ['id' => 4, 'name' => "Брюки", 'cost' => 1800, 'photo_path' => "images/product/4.jpg", 'brand' => "Zara", 'material' => "Віскоза"],
            ['id' => 5, 'name' => "Куртка", 'cost' => 4200, 'photo_path' => "images/product/5.jpg", 'brand' => "The North Face", 'material' => "Нейлон"],
            ['id' => 6, 'name' => "Светр", 'cost' => 1600, 'photo_path' => "images/product/6.webp", 'brand' => "H&M", 'material' => "Вовна"],
            ['id' => 7, 'name' => "Штани карго", 'cost' => 1900, 'photo_path' => "images/product/7.webp", 'brand' => "Levi's", 'material' => "Твіл"],
            ['id' => 8, 'name' => "Сорочка в клітинку", 'cost' => 1500, 'photo_path' => "images/product/8.webp", 'brand' => "Ralph Lauren", 'material' => "Фланель"],
            ['id' => 9, 'name' => "Кофта на блискавці", 'cost' => 2100, 'photo_path' => "images/product/9.jpg", 'brand' => "Adidas", 'material' => "Фліс"],
            ['id' => 10,'name' => "Куртка-бомбер", 'cost' => 3300, 'photo_path' => "images/product/10.webp", 'brand' => "Pull&Bear", 'material' => "Поліестер"],
        ], 'id');
    }
}
