<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<6;){                // table number 1 2 3 4 5 win twr sy chin tar
            DB::table('tables')->insert([
                'number' => $i++,
            ]);
        }
    }
}
