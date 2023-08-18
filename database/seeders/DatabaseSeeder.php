<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'Rodrigo Severo',
            'email' => 'rodrigoseverodev@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        
        \App\Models\User::create([
            'name' => 'JOSEILTON DA COSTA NARDES NASCIMENTO',
            'email' => 'cadastro.imobprime@gmail.com',
            'password' => bcrypt('12345678')
        ]);

    }
}
