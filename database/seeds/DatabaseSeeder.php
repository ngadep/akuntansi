<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * if change the strukture
     * run composer dump-autoload to generate new class map
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(CompanyTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(GroupTableSeeder::class);
        $this->call(AccountTableSeeder::class);

        Model::reguard();
    }
}
