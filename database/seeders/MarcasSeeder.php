<?php

namespace Database\Seeders;

use App\Models\Marcas;
use Illuminate\Database\Seeder;

class MarcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Marcas::factory(5)->create();
    }
}
