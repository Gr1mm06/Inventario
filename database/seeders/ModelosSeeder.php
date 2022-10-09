<?php

namespace Database\Seeders;

use App\Models\Modelos;
use Illuminate\Database\Seeder;

class ModelosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modelos::factory(5)->create();
    }
}
