<?php

namespace Database\Factories;
use App\Models\Ville;
use Illuminate\Database\Eloquent\Factories\Factory;

class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => rand(1,1000),
            'nom' => $this->faker->name(),
            'adresse' => $this->faker->unique()->address(),
            'phone' => $this->faker->unique()->phoneNumber(),
            'email' =>  $this->faker->unique()->safeEmail(),
            'date_de_naissance' =>  $this->faker->dateTimeThisCentury(),
            'villeId' => Ville::factory(),
            'updated_at' => $this->faker->time(), //Generates a fake sentence
            'created_at' => $this->faker->time()
        ];
    }
}
