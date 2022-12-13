<?php

namespace Database\Factories\Migrasi;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Migrasi\TransactionMigrasi>
 */
class TransactionMigrasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>$this->faker->numberBetween(3,9),
            'restaurant_id'=>$this->faker->numberBetween(1,3),
            'reservation_id'=>$this->faker->numberBetween(1,10),
            'payment_amount'=>$this->faker->randomFloat(2,10000,60000),
            'payment_status'=>$this->faker->numberBetween(0,1),
            'payment_date_at'=>$this->faker->dateTimeBetween("-1 years","now"),
            'created_at'=>now(),
            'updated_at'=>now()
        ];
    }
}
