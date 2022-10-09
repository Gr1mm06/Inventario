<?php

namespace Database\Factories;

use App\Models\Categorias;
use App\Models\Zapatos;
use Illuminate\Database\Eloquent\Factories\Factory;

class ZapatosCategoriasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_zapato' => Zapatos::all()->random()->id_zapato,
            'id_categoria' => Categorias::all()->random()->id_categoria,
        ];
    }
}
