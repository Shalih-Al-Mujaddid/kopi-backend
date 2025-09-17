<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Elektronik', 'slug' => 'elektronik', 'description' => 'Barang elektronik terbaru', 'image' => null],
            ['name' => 'Fashion', 'slug' => 'fashion', 'description' => 'Pakaian & aksesoris', 'image' => null],
            ['name' => 'Peralatan', 'slug' => 'peralatan', 'description' => 'Peralatan rumah tangga', 'image' => null],
        ]);
    }
}
