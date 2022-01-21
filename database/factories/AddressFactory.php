<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'zip' => $this->faker->postcode,
            'state' => substr($this->faker->countryCode,0,2),
            'city' => $this->faker->city,
            'street' => $this->faker->streetAddress,
            'district' => $this->faker->streetName,
            'number' => $this->faker->randomNumber(),
            'complement' => $this->faker->sentence,
            "status_id"=>Status::all()->random()->id
        ];
    }
}
