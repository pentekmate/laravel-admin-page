<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        for ($i=0; $i <100 ; $i++) { 
            $user = $users->random();
            Order::factory()->create([
                'user_id'=>$user->id
            ]);

        }
    }
}
