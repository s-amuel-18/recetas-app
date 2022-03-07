<?php

namespace Database\Seeders;

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
        DB::table("users")->insert([
            "name" => "Samuel Graterol",
            "email" => "samuelgraterol12@gmail.com",
            "pagina_web" => "https://music.youtube.com/",
            "password" => Hash::make("12345678"),
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s")
        ]);
        DB::table("users")->insert([
            "name" => "Pedro Perez",
            "email" => "pedro@gmail.com",
            "pagina_web" => "https://music.youtube.com/",
            "password" => Hash::make("12345678"),
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s")
        ]);
    }
}
