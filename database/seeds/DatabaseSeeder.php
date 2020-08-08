<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // Clear out the users table
        User::truncate();

        // Prevent event listeners sending emails and so on
        User::flushEventListeners();

        // Create 1000 users
        $usersQuantity = 1000;
        factory(User::class, $usersQuantity)->create();
    }
}
