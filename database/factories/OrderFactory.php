<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition()
    {
        $arrayStatus = ['Enviado', 'Pendiente', 'Entregado'];
        return [
            "document_type" => 'CC',
            "document" => rand(1000000, 999999999),
            "name_customer" => $this->faker->name(),
            "order_code" => rand(1000000, 999999999),
            "address" => $this->faker->text(10),
            "status" => $arrayStatus[rand(0,2)],
            "delivery_date" => now()
        ];
    }
}
