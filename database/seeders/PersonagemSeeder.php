<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Personagem;

class PersonagemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$personagem = new Personagem();
        $personagem->nome = "Minato";
        $personagem->fk_aldeia_id = "1";

        $personagem->save();*/

        //factory(Personagem::class, 10)->create();
        Personagem::factory()->count(10)->create(); 

    }
}
