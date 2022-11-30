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
            'user_id'=>$this->faker->random_int(1,10),
            'restaurant_id'=>$this->faker->random_int(1,10),
            'reservation_id'=>$this->faker->random_int(1,10),
            'payment_amount'=>$this->faker->randomFloat(2,10000,60000),
            'payment_status'=>$this->faker->random_int(0,1),
            'payment_date_at'=>$this->faker->dateTimeBetween("-1 years","now")
        ];
    }
}
