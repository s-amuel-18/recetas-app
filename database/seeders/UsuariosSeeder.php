<?php

namespace Database\Seeders;

// use App\Models\User;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            "name" => "Samuel Graterol",
            "email" => "samuelgraterol12@gmail.com",
            "pagina_web" => "https://music.youtube.com/",
            "password" => Hash::make("12345678"),

        ]);

        // $user->perfil()->create();

        $user2 = User::create([
            "name" => "pedro",
            "email" => "dasda12@gmail.com",
            "pagina_web" => "https://music.youtube.com/",
            "password" => Hash::make("12345678"),

        ]);

        // $user2->perfil()->create();


    }
}
