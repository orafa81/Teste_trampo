<?php

namespace Database\Factories;

use App\Models\Area;
use App\Models\Empresa;
use App\Models\Vinculo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vaga>
 */
class VagaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $value = $this->faker->numberBetween(100, 1000000) / 100;
        $formattedValue = number_format($value, 2, ',', '.');
        return [
            'empresa_id' => Empresa::find(1),
            'titulo' => $this->faker->text(10),
            'descricao' => $this->faker->text(200),
            'area' => $this->faker->text(10),
            'hierarquia' => $this->faker->text(10),
            'salario' => $formattedValue,
            'vinculo_id' => Vinculo::find(1),
        ];
    }
}
