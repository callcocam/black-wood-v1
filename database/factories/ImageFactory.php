<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Image;

class ImageFactory extends Factory
{
         /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name"=>$this->faker->name,
            "cover"=>'https://dummyimage.com/580x480/edeef7/1d29cf',
        ];
    }
}
