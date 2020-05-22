<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
          'user_id'         => 1,
          'plan_id'         => 2,
          'count'           => 4,
          //'reservation_day' => '2020/5/19',
          'checkin_day'     => '2020/5/28',
          'checkout_day'    => '2020/5/29',
        ];
        DB::table('reservations')->insert($param);

        $param = [
          'user_id'         => 1,
          'plan_id'         => 3,
          'count'           => 2,
          //'reservation_day' => '2020/5/19',
          'checkin_day'     => '2020/5/28',
          'checkout_day'    => '2020/5/29',
        ];
        DB::table('reservations')->insert($param);

        $param = [
          'user_id'         => 1,
          'plan_id'         => 1,
          'count'           => 1,
          //'reservation_day' => '2020/5/19',
          'checkin_day'     => '2020/5/28',
          'checkout_day'    => '2020/5/29',
        ];
        DB::table('reservations')->insert($param);

        $param = [
          'user_id'         => 1,
          'plan_id'         => 3,
          'count'           => 1,
          //'reservation_day' => '2020/5/19',
          'checkin_day'     => '2020/5/28',
          'checkout_day'    => '2020/5/29',
        ];
        DB::table('reservations')->insert($param);

        $param = [
          'user_id'         => 1,
          'plan_id'         => 2,
          'count'           => 5,
          //'reservation_day' => '2020/5/19',
          'checkin_day'     => '2020/5/28',
          'checkout_day'    => '2020/5/29',
        ];
        DB::table('reservations')->insert($param);

        $param = [
          'user_id'         => 1,
          'plan_id'         => 2,
          'count'           => 2,
          //'reservation_day' => '2020/5/19',
          'checkin_day'     => '2020/5/28',
          'checkout_day'    => '2020/5/29',
        ];
        DB::table('reservations')->insert($param);

        $param = [
          'user_id'         => 2,
          'plan_id'         => 2,
          'count'           => 1,
          //'reservation_day' => '2020/5/19',
          'checkin_day'     => '2020/5/28',
          'checkout_day'    => '2020/5/29',
        ];
        DB::table('reservations')->insert($param);

        $param = [
          'user_id'         => 3,
          'plan_id'         => 3,
          'count'           => 5,
          //'reservation_day' => '2020/5/19',
          'checkin_day'     => '2020/5/28',
          'checkout_day'    => '2020/5/29',
        ];
        DB::table('reservations')->insert($param);
    }
}
