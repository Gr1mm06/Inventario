<?php

namespace Database\Seeders;

use App\Models\ZapatosCategorias;
use Illuminate\Database\Seeder;

class ZapatosCategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ZapatosCategorias::factory(50)->create();
    }
}
