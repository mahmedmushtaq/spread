<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'=>"M Ahmed Mushtaq",
            'email'=>'injurdlion332@gmail.com',
            'password'=>bcrypt('shine123')
        ]);

    }
}
