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
        $user = User::create([
            'name'=>"M Ahmed Mushtaq",
            'email'=>'injurdlion332@gmail.com',
            'password'=>bcrypt('shine123'),
            'admin'=>1,
            'account'=>'approved'
        ]);

        App\Profile::create([
           'user_id'=> $user->id,
            'avatar'=> 'uploads/avatars/1.jpg',
            'about'=>'all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and ex',
            'facebook'=>'',
            'youtube'=>'',
        ]);

    }
}
