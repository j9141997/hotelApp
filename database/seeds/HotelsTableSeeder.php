<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
          'id'            => 1000000000,
          'name'          => 'hotel1',
          'type_id'       => 1,
          'postal'        => '0000000',
          'address'       => '東京都千代田区千代田１－11',
          'checkin_time'  => '15:00',
          'checkout_time' => '10:00',
          'image'         => 'image.jpg',
          'hotel_exist'   => 1//'TRUE'
        ];
        DB::table('hotels')->insert($param);

        $param = [
          'name'          => 'hotel2',
          'type_id'       => '1',
          'postal'        => '0000000',
          'address'       => '東京都千代田区千代田１－11',
          'checkin_time'  => '15:00',
          'checkout_time' => '10:00',
          'image'         => 'image.jpg',
          'hotel_exist'   => 1//'TRUE'
        ];
        DB::table('hotels')->insert($param);

        $param = [
          'name'          => 'hotel3',
          'type_id'       => '1',
          'postal'        => '0000000',
          'address'       => '東京都千代田区千代田１－11',
          'checkin_time'  => '15:00',
          'checkout_time' => '10:00',
          'image'         => 'image.jpg',
          'hotel_exist'   => 1//'TRUE'
        ];
        DB::table('hotels')->insert($param);
    }
}
