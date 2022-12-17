<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Petugas;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Petugas::query()->create(
            [
            "nama" => "Obito 12",
            "email" => "obito12@gmail.com",
            "password" => "obito123"
            ]
        );
    }
}
