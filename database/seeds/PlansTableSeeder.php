<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
          'hotel_id'   => 1000000000,
          'name'       => '日帰りプラン',
          'price'      => 4000,
          'room'       => 5,
          'plan_exist' => 1//'TRUE'
        ];
        DB::table('plans')->insert($param);

        $param = [
          'hotel_id'   => 1000000001,
          'name'       => '日帰りプラン',
          'price'      => 4000,
          'room'       => 5,
          'plan_exist' => 1//'TRUE'
        ];
        DB::table('plans')->insert($param);

        $param = [
          'hotel_id'   => 1000000002,
          'name'       => '日帰りプラン',
          'price'      => 4000,
          'room'       => 5,
          'plan_exist' => 1//'TRUE'
        ];
        DB::table('plans')->insert($param);
    }
}
