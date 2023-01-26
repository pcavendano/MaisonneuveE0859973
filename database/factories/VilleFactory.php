<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ville;

class VilleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => rand(1,1000), //Generates a Ville from factory and extracts id...
            'nom' => $this->faker->city() //Generates a fake sentence
        ];
    }
}
