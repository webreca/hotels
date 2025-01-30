<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Prashant Singh',
            'email' => 'webreca@gmail.com',
            'iso2' => 'IN',
            'dialcode' => '+91',
            'phone' => '9555108968'
        ]);

        User::factory()->create([
            'name' => 'Neha Chauhan',
            'email' => 'adv.neha0943@gmail.com',
            'iso2' => 'IN',
            'dialcode' => '+91',
            'phone' => '9818415815'
        ]);

        User::factory()->create([
            'name' => 'Kirti Chauhan',
            'email' => 'chauhan.jagriti98@gmail.com',
            'iso2' => 'IN',
            'dialcode' => '+91',
            'phone' => '9319314471'
        ]);

        User::factory()->create([
            'name' => 'Daksh Chauhan',
            'email' => 'singh.dakshchauhan@gmail.com',
            'iso2' => 'IN',
            'dialcode' => '+91',
            'phone' => '8766217929'
        ]);

        User::factory()->create([
            'name' => 'Barkha Chauhan',
            'email' => 'barkha1970@gmail.com',
            'iso2' => 'IN',
            'dialcode' => '+91',
            'phone' => '8800622260'
        ]);
        $this->call(CitySeeder::class);
        $this->call(PlanSeeder::class);
    }
}
