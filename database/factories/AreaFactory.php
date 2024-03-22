<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Area>
 */
class AreaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     */
    public function definition(): array
    {
        $lista = ['Tecnologia', 'Administração', 'Logistica', 'Direito'];
        return [
            'nome' => $lista[rand(0,3)],
        ];
    }
}
