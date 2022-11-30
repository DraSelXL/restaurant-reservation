<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->insert([
            ['name'=>"Laki"],
            ['name'=>"Perempuan"]
        ]);
        DB::table('roles')->insert([
            ['name'=>"Admin"],
            ['name'=>"Customer"],
            ['name'=>"Restaurant"]
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Migrasi\userMigrasi::factory(10)->create();
        \App\Models\Migrasi\transactionMigrasi::factory(20)->create();
        \App\Models\Migrasi\tableMigrasi::factory(50)->create();
        \App\Models\Migrasi\reviewMigrasi::factory(50)->create();
        \App\Models\Migrasi\restaurantMigrasi::factory(3)->create();
        \App\Models\Migrasi\reservationMigrasi::factory(20)->create();
    }
}
