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
       
        User::factory()->withId(1)->create();
        User::factory(20)->create();

        User::factory()->create([
            'name'=> 'TestAdmin',
            'email'=>'Testadmin@gmail.com',
            'isAdmin'=>true
        ]);

        $this->call(OrderSeeder::class);
        $this->call(PostSeeder::class);

    }
}
