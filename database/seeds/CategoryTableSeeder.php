<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
    $categoies = [
          [
            "name"           => "Harta (Aktiva)",
            "balance_income" => "balance",
            "debit_credit"   => "debit"
          ],
          [
            "name"           => "Kewajiban (Pasiva)",
            "balance_income" => "balance",
            "debit_credit"   => "credit"
          ],
          [
            "name"           => "Ekuitas (Modal)",
            "balance_income" => "balance",
            "debit_credit"   => "credit"
          ],
          [
            "name"           => "Pendapatan",
            "balance_income" => "income",
            "debit_credit"   => "credit"
          ],
          [
            "name"           => "Biaya atas Pendapatan",
            "balance_income" => "income",
            "debit_credit"   => "debit"
          ],
          [
            "name"           => "Pengeluaran Operasional",
            "balance_income" => "income",
            "debit_credit"   => "debit"
          ],
          [
            "name"           => "Pengeluaran Non Operasional",
            "balance_income" => "income",
            "debit_credit"   => "debit"
          ],
          [
            "name"           => "Pendapatan Lain",
            "balance_income" => "income",
            "debit_credit"   => "credit"
          ],
          [
            "name"           => "Pengeluaran Lain",
            "balance_income" => "income",
            "debit_credit"   => "debit"
          ]
    	];

      DB::table('categories')->insert($categoies);
	}
}
