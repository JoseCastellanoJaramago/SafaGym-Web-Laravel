<?php

namespace Database\Seeders;

use App\Models\Profession;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$professions = DB::select('SELECT id FROM professions WHERE title = ? LIMIT 0,1', ['Desarrollador back-end']);

        $professionId = Profession::where('title', 'Desarrolador back-end')->value('id'); // se puede sustituir por ->first()

        //dd($professionId);

        User::factory()->create([
            'name' => 'Eva Marchena',
            'email' => 'emarchenamejias@safareyes.es',
            'password' => bcrypt('Laravel'), // bcrypt para encriptar la password
            'profession_id' => $professionId,
            'is_admin' => true
        ]);

        User::factory()->create([
            'profession_id' => $professionId
        ]);



        User::factory(48)->create();

//        User::create([
//            'name' => 'Another User',
//            'email' => 'another@user.com',
//            'password' => bcrypt('Laravel'), // bcrypt para encriptar la password
//            'profession_id' => $professionId
//        ]);
//
//        User::create([
//            'name' => 'Another User',
//            'email' => 'another2@user.com',
//            'password' => bcrypt('Laravel'), // bcrypt para encriptar la password
//            'profession_id' => null
//        ]);
    }
}
