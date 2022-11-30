<?php

namespace Database\Factories\Migrasi;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Migrasi\ReviewMigrasi>
 */
class ReviewMigrasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>$this->faker->random_int(1,10),
            'restaurant_id'=>$this->faker->random_int(1,10),
            'rating'=>$this->faker->random_int(3,5),
            'message'=>$this->faker->sentence()
        ];
    }
}
