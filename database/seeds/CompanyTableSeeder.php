<?php

use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder{

    public function run()
    {
        $companies = [
            [
                "name"            => "DUTA SWALAYAN",
                "address"         => "sengonagung purwosari pasuruan",
                "telephone"       => "0343-613882",
                "email"           => "swalayan.duta@gmail.com",
                "npwp"            => "8712349",
                "month_period"    => "11",
                "year_period"     => "2015"
            ]
        ];

        DB::table('companies')->insert($companies);
    }
} 