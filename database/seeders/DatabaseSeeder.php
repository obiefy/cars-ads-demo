<?php

namespace Database\Seeders;

use App\Models\Ads;
use App\Models\User;
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
         $user = User::factory()->create([
             'email' => 'user@obay-dev.com',
             'phone' => '+9715555544444',
             'password' => bcrypt('123456')
         ]);

         Ads::factory()->create();
    }
}
