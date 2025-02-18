<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empresa>
 */
class EmpresaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::where('tipo_conta', 'empresa')->first();
        return [
            'user_id' => $user->id,
            'cnpj' => $this->faker->numerify('##.###.###/####-##'),
            'descricao' => $this->faker->text(200),
        ];
    }
}
