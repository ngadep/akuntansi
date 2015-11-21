<?php

use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
    $groups = [
          	[
			"category_id"		=> "1",
			"name"				=> "Kas dan Setara Kas"
			],
			[
			"category_id"		=> "1",
			"name"				=> "Piutang Dagang"
			],
			[
			"category_id"		=> "1",
			"name"				=> "Persediaan"
			],
			[
			"category_id"		=> "1",
			"name"				=> "Biaya Dibayar Dimuka"
			],
			[
			"category_id"		=> "1",
			"name"				=> "Harta Tetap Berwujud"
			],
			[
			"category_id"		=> "1",
			"name"				=> "Harta Lainnya"
			],
			[
			"category_id"		=> "2",
			"name"				=> "Hutang Lancar"
			],
			[
			"category_id"		=> "2",
			"name"				=> "Pendapatan yang diterima di muka"
			],
			[
			"category_id"		=> "2",
			"name"				=> "Hutang Jangka Panjang"
			],
			[
			"category_id"		=> "2",
			"name"				=> "Hutang Lain"
			],
			[
			"category_id"		=> "3",
			"name"				=> "Modal"
			],
			[
			"category_id"		=> "3",
			"name"				=> "Laba"
			],
			[
			"category_id"		=> "4",
			"name"				=> "Pendapatan Usaha"
			],
			[
			"category_id"		=> "4",
			"name"				=> "Pendapatan Lain"
			],
			[
			"category_id"		=> "5",
			"name"				=> "Biaya Produksi"
			],
			[
			"category_id"		=> "5",
			"name"				=> "Biaya Lain"
			],
			[
			"category_id"		=> "6",
			"name"				=> "Biaya Operasional"
			],
			[
			"category_id"		=> "6",
			"name"				=> "Biaya Non Operasional"
			],
			[
			"category_id"		=> "8",
			"name"				=> "Pendapatan Luar Usaha"
			],
			[
			"category_id"		=> "9",
			"name"				=> "Pengeluaran Luar Usaha"
          	]          
    	];

    	DB::table('groups')->insert($groups);
	}

}