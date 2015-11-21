<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "name"      => "sanjaya.cebe",
                "email"     => "9c96b6@gmail.com",
                "password"  => bcrypt("123")
            ]
        ];


        foreach ($users as $user) {
	        DB::table('users')->insert($user);
        }

        DB::table('company_user')->insert([
            "company_id" => "1",
            "user_id"       => "1"
        ]);
    }
}
