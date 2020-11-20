<?php

namespace Database\Factories;

use App\Models\Ads;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ads::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'photos' => [$this->faker->unique()->url, $this->faker->unique()->url],
            'user_id' => 1,
            'brand' => $this->faker->company,
            'color' => $this->faker->colorName,
            'price' => $this->faker->numberBetween(20000,100000),
            'kilometers' => $this->faker->numberBetween(10000, 200000),
            'condition' => Ads::getConditions()[$this->faker->numberBetween(0, 2)],
            'description' => $this->faker->sentence
        ];
    }
}
