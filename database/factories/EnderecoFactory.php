<?php

namespace Database\Factories;

use App\Models\Cidade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Endereco>
 */
class EnderecoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bairro' => $this->faker->address(),
            'rua' => $this->faker->address(),
            'numero' => $this->faker->numerify('###'),
            'complemento' => $this->faker->text(50),
            'cidade_id' => Cidade::find(1), 
        ];
    }
}
