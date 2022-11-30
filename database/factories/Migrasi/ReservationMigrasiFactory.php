<?php

namespace Database\Factories\Migrasi;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Migrasi\ReservationMigrasi>
 */
class ReservationMigrasiFactory extends Factory
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
            'table_id'=>$this->faker->random_int(1,20),
            'reservation_date_time'=>$this->faker->dateTimeBetween("-1 years","now"),
            'reservation_status'=>$this->faker->randomElement(['0','1'])
        ];
    }
}
