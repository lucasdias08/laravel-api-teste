<?php

namespace Database\Factories;

use App\Models\Aldeia;
use Illuminate\Database\Eloquent\Factories\Factory;

class AldeiaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Aldeia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name
        ];
    }
}
