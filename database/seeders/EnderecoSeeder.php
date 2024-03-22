<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cidade;
use App\Models\Endereco;
use App\Models\Estado;

class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Estado::factory(1)->create();
        Cidade::factory(1)->create();
        Endereco::factory(1)->create();
    }
}
