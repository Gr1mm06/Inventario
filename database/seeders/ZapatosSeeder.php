<?php

namespace Database\Seeders;

use App\Models\Zapatos;
use Illuminate\Database\Seeder;

class ZapatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Zapatos::factory(50)->create();
    }
}
