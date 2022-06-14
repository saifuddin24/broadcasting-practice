<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        UserRole::factory(5)->create();

        UserRole::query()->get()->each(function ( $userRole ){
            User::factory(3)->create(['user_role_id' => $userRole->id ]);
        });


    }
}
