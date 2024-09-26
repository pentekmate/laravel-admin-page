<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   
    public function definition(): array
    {   
        $products =[
            "Laptop",
            "Okostelefon",
            "Tablet",
            "Bluetooth hangszóró",
            "Okosóra",
            "Füles (vezeték nélküli)",
            "Játékkonzol",
            "Monitor",
            "Digitális fényképezőgép",
            "Hordozható töltő (power bank)"
        ];
        $orderStatus = ['shipped','completed','return','pending'];
        return [
            'product'=>$products[rand(0,count($products)-1)],
            'quantity'=>rand(1,5),
            'total'=>rand(200,6000),
            'status'=>$orderStatus[rand(0,count($orderStatus)-1)],
        ];
    }
}
