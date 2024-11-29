<?php

namespace Database\Seeders;

use App\Models\Habilidade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HabilidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //loop
        $quantidade = 10;

        for ($i = 0; $i < $quantidade; $i++) {
            Habilidade::create([
                'nome' => Str::random(10),
                'descricao' => Str::random(40),
                'nivel' => rand(1, 10), 
            ]);
        }
    }
}
