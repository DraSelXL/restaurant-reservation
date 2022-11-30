<?php

namespace Database\Factories\Migrasi;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Migrasi\UserMigrasi>
 */
class UserMigrasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $firstname = $this->faker->firstName();
        $lastname = $this->faker->lastName();
        return [
            'username'=>$this->faker->word(),
            'password'=>Hash::make('123'),
            'full_name'=>"$firstname $lastname",
            'date_of_birth'=>$this->faker->dateTimeBetween("-30 years","now"),
            'address'=>$this->faker->address(),
            'email'=>Str::lower($firstname)."@gmail.com",
            'phone'=>$this->faker->phoneNumber(),
            'gender'=>$this->faker->random_int(1,2),
            'balance'=>$this->faker->randomFloat(2,1000,100000),
            'role_id'=>$this->faker->random_int(1,3),
        ];
    }
}
