<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fullname'   => 'Jeremias Springfield',
            'email'      => 'jeremias@gmail.com',
            'phone'      => 3107898986,
            'birthdate'  => '1970-08-07',
            'gender'     => 'Male',
            'address'    => 'Avd Siempre Viva',
            'password'   => bcrypt('admin'),
            'role'       => 'Admin',
            'created_at' => now()       
        ]);

        $usr = new User;
        $usr->fullname   = 'Homero Simpson';
        $usr->email      = 'homer@gmail.com';
        $usr->phone      = 3208765456;
        $usr->birthdate  = '1976-02-12';
        $usr->gender     = 'Male';
        $usr->address    = 'Avd Siempre Viva';
        $usr->password   = bcrypt('customer');
        $usr->save();

        // Factory
        
        factory(User::class, 100)->create();
    }
}