<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'huong',
            'email'=>'huong3@gmail.com',
            'password'=>'345678'
        ]);
    }
}
