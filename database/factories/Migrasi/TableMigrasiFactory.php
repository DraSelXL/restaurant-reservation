<?php

namespace Database\Factories\Migrasi;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Migrasi\TableMigrasi>
 */
class TableMigrasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'restaurant_id'=>$this->faker->random_int(1,10),
            'seats'=>$this->faker->random_int(1,20),
            'status'=>$this->faker->randomElement(['0','1'])
        ];
    }
}
