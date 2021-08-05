<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Un registro con datos reales y 99 con datos de prueba
        
        User::create([

            'name' => 'Desiree Rodriguez De La Rosa',
            'email' => 'desirerd@gmail.com',
            'password' =>bcrypt('12345678')

        ]);

        User::factory(99)->create();
    }
}
