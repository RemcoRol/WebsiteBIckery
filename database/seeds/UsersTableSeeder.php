<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name' => 'Remco Rol', 'email' => 'remco.rol@bickery.nl', 'password' => bcrypt('R0l#1018')]);
    }
}
