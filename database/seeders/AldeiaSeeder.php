<?php

namespace Database\Seeders;

use App\Models\Aldeia;
use Illuminate\Database\Seeder;
use App\Models\Personagem;

class AldeiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        /*$aldeia = new Aldeia();
        $aldeia->nome = "Aldeia da folha";

        $aldeia->save();*/

        Aldeia::factory()->count(10)->create(); 
    }
}
