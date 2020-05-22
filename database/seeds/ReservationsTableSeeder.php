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

     /*
       ・user_idが２は２つ、５は３つ予約履歴がある
       ・既に日程が終わった予約（user_id 2と7）
       ・同じ日付で同じプランを予約してる人がいる（user_id 3,4）
       ・同じプランを複数人が予約
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
          'count'           => 3,
          //'reservation_day' => '2020/5/19',
          'checkin_day'     => '2020/5/1',
          'checkout_day'    => '2020/5/4',
        ];
        DB::table('reservations')->insert($param);

        $param = [
          'user_id'         => 2,
          'plan_id'         => 3,
          'count'           => 2,
          //'reservation_day' => '2020/5/19',
          'checkin_day'     => '2020/6/11',
          'checkout_day'    => '2020/6/13',
        ];
        DB::table('reservations')->insert($param);

        $param = [
          'user_id'         => 3,
          'plan_id'         => 4,
          'count'           => 3,
          //'reservation_day' => '2020/5/19',
          'checkin_day'     => '2020/6/11',
          'checkout_day'    => '2020/6/14',
        ];
        DB::table('reservations')->insert($param);

        $param = [
          'user_id'         => 4,
          'plan_id'         => 4,
          'count'           => 5,
          //'reservation_day' => '2020/5/19',
          'checkin_day'     => '2020/6/11',
          'checkout_day'    => '2020/6/16',
        ];
        DB::table('reservations')->insert($param);

        $param = [
          'user_id'         => 5,
          'plan_id'         => 5,
          'count'           => 1,
          //'reservation_day' => '2020/5/19',
          'checkin_day'     => '2020/5/28',
          'checkout_day'    => '2020/5/29',
        ];
        DB::table('reservations')->insert($param);

        $param = [
          'user_id'         => 5,
          'plan_id'         => 6,
          'count'           => 3,
          //'reservation_day' => '2020/5/19',
          'checkin_day'     => '2020/6/12',
          'checkout_day'    => '2020/6/15',
        ];
        DB::table('reservations')->insert($param);

        $param = [
          'user_id'         => 5,
          'plan_id'         => 7,
          'count'           => 2,
          //'reservation_day' => '2020/5/19',
          'checkin_day'     => '2020/6/20',
          'checkout_day'    => '2020/6/22',
        ];
        DB::table('reservations')->insert($param);

        $param = [
          'user_id'         => 6,
          'plan_id'         => 8,
          'count'           => 3,
          //'reservation_day' => '2020/5/19',
          'checkin_day'     => '2020/6/1',
          'checkout_day'    => '2020/6/4',
        ];
        DB::table('reservations')->insert($param);

        $param = [
          'user_id'         => 7,
          'plan_id'         => 9,
          'count'           => 2,
          //'reservation_day' => '2020/5/19',
          'checkin_day'     => '2020/2/15',
          'checkout_day'    => '2020/2/17',
        ];
        DB::table('reservations')->insert($param);
    }
}
