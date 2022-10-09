<?php

namespace Database\Factories;

use App\Models\Marcas;
use App\Models\Modelos;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ZapatosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_modelo' => Modelos::all()->random()->id_modelo,
            'id_marca' => Marcas::all()->random()->id_marca,
            'foto' => 'unisex.jpg',
            'cantidad' => $this->faker->randomDigit(),
            'numero' => $this->faker->numberBetween(5,30),
            'precio' => $this->faker->randomFloat(2,1,100),
        ];
    }
}
