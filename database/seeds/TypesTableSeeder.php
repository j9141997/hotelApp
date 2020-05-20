<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
          'name' => 'シティホテル',
        ];
        DB::table('types')->insert($param);

        $param = [
          'name' => 'リゾートホテル',
        ];
        DB::table('types')->insert($param);

        $param = [
          'name' => 'ビジネスホテル',
        ];
        DB::table('types')->insert($param);

        $param = [
          'name' => '旅館',
        ];
        DB::table('types')->insert($param);

        $param = [
          'name' => '民宿',
        ];
        DB::table('types')->insert($param);

        $param = [
          'name' => 'ペンション',
        ];
        DB::table('types')->insert($param);
    }
}
