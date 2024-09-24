<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            Buku::create([
                'judul' => fake()->sentence(3),
                //fake itu buat data palsu 
                'penulis' => fake()->name(),
                'harga' => fake()->numberBetween(10000, 50000),
                'tgl_terbit' => fake()->date,
            ]);
        }
    }
}
//seeder itu buat bikin database scara otomatis melalui laravel
//tanpa membuat manual di phpnya

