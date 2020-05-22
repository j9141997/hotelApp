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

     /*
       ・名前が同じプラン（「日帰りプラン」「素泊まりプラン」）
       ・hotel_idが1000000001は３つ、1000000005と1000000008は２つプランがある
       ・宿は存在してるが、プランは存在していない
       ・無駄に長いプラン名
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
          'name'       => '【女子＆女子旅】プラチナレディースプラン',
          'price'      => 80000,
          'room'       => 3,
          'plan_exist' => 1//'TRUE'
        ];
        DB::table('plans')->insert($param);

        $param = [
          'hotel_id'   => 1000000001,
          'name'       => '日帰りプラン',
          'price'      => 5000,
          'room'       => 9,
          'plan_exist' => 1//'TRUE'
        ];
        DB::table('plans')->insert($param);

        $param = [
          'hotel_id'   => 1000000001,
          'name'       => '山の幸プラン',
          'price'      => 9000,
          'room'       => 10,
          'plan_exist' => 1//'TRUE'
        ];
        DB::table('plans')->insert($param);

        $param = [
          'hotel_id'   => 1000000003,
          'name'       => '素泊まりプラン',
          'price'      => 9000,
          'room'       => 10,
          'plan_exist' => 1//'TRUE'
        ];
        DB::table('plans')->insert($param);

        $param = [
          'hotel_id'   => 1000000005,
          'name'       => '朝食付きプラン',
          'price'      => 12000,
          'room'       => 5,
          'plan_exist' => 1//'TRUE'
        ];
        DB::table('plans')->insert($param);

        $param = [
          'hotel_id'   => 1000000005,
          'name'       => 'のんびりおこもりステイ',
          'price'      => 10000,
          'room'       => 20,
          'plan_exist' => 1//'TRUE'
        ];
        DB::table('plans')->insert($param);

        $param = [
          'hotel_id'   => 1000000006,
          'name'       => '【朝食なし】迷ったらコレ！特典なしシンプルステイ',
          'price'      => 50000,
          'room'       => 6,
          'plan_exist' => 1//'TRUE'
        ];
        DB::table('plans')->insert($param);

        $param = [
          'hotel_id'   => 1000000008,
          'name'       => 'スタンダードプラン',
          'price'      => 10000,
          'room'       => 20,
          'plan_exist' => 1//'TRUE'
        ];
        DB::table('plans')->insert($param);

        $param = [
          'hotel_id'   => 1000000008,
          'name'       => '素泊まりプラン',
          'price'      => 3000,
          'room'       => 5,
          'plan_exist' => 1//'TRUE'
        ];
        DB::table('plans')->insert($param);
    }
}
