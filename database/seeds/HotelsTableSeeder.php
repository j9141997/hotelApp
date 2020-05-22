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

     /*
       ・名前が同じホテル（「変なホテル」）
       ・無駄に長い名前
       ・タイプが同じで異なるホテル
     */
    public function run()
    {
        $param = [
          'id'            => 1000000000,
          'name'          => 'シェラトン都ホテル東京',
          'type_id'       => 1,
          'postal'        => '1080071',
          'address'       => '東京都港区白金台1-1-50',
          'checkin_time'  => '15:00',
          'checkout_time' => '12:00',
          'image'         => 'hotel1.jpg',
          'hotel_exist'   => 1//'TRUE'
        ];
        DB::table('hotels')->insert($param);

        $param = [
          'name'          => '変なホテル東京',
          'type_id'       => '1',
          'postal'        => '1070052',
          'address'       => '東京都港区赤坂２－６－１４',
          'checkin_time'  => '15:00',
          'checkout_time' => '11:00',
          'image'         => 'hotel2.jpg',
          'hotel_exist'   => 1//'TRUE'
        ];
        DB::table('hotels')->insert($param);

        $param = [
          'name'          => 'ＡＮＡインターコンチネンタルホテル東京',
          'type_id'       => '2',
          'postal'        => '1070052',
          'address'       => '東京都港区赤坂１－１２－３３',
          'checkin_time'  => '15:00',
          'checkout_time' => '11:00',
          'image'         => 'hotel3.jpg',
          'hotel_exist'   => 1//'TRUE'
        ];
        DB::table('hotels')->insert($param);

        $param = [
          'name'          => 'ホテルウィングインターナショナルセレクト名古屋栄',
          'type_id'       => '3',
          'postal'        => '4600008',
          'address'       => '愛知県名古屋市中区栄３丁目１２－２３－２',
          'checkin_time'  => '15:30',
          'checkout_time' => '11:30',
          'image'         => 'hotel4.jpg',
          'hotel_exist'   => 1//'TRUE'
        ];
        DB::table('hotels')->insert($param);

        $param = [
          'name'          => '箱根上の湯',
          'type_id'       => '4',
          'postal'        => '2500405',
          'address'       => '神奈川県足柄下郡箱根町大平台５３５－１',
          'checkin_time'  => '15:30',
          'checkout_time' => '11:30',
          'image'         => 'hotel5.jpg',
          'hotel_exist'   => 1//'TRUE'
        ];
        DB::table('hotels')->insert($param);

        $param = [
          'name'          => 'ファミリーペンション　アースルーフ',
          'type_id'       => '6',
          'postal'        => '4130234',
          'address'       => '静岡県伊東市池６１５－８７',
          'checkin_time'  => '14:45',
          'checkout_time' => '10:30',
          'image'         => 'hotel6.jpg',
          'hotel_exist'   => 1//'TRUE'
        ];
        DB::table('hotels')->insert($param);

        $param = [
          'name'          => '阿蘇乃やまぼうし',
          'type_id'       => '5',
          'postal'        => '8692305',
          'address'       => '熊本県阿蘇市湯浦７１８－１',
          'checkin_time'  => '16:00',
          'checkout_time' => '12:00',
          'image'         => 'hotel7.jpg',
          'hotel_exist'   => 1//'TRUE'
        ];
        DB::table('hotels')->insert($param);

        $param = [
          'name'          => 'ホテルマイステイズプレミア堂島',
          'type_id'       => '3',
          'postal'        => '5300002',
          'address'       => '大阪府大阪市北区曽根崎新地２－４－１',
          'checkin_time'  => '13:00',
          'checkout_time' => '10:00',
          'image'         => 'hotel8.jpg',
          'hotel_exist'   => 1//'TRUE'
        ];
        DB::table('hotels')->insert($param);

        $param = [
          'name'          => '変なホテル東京',
          'type_id'       => '3',
          'postal'        => '5180865',
          'address'       => '三重県伊賀市上野魚町２８７４',
          'checkin_time'  => '15:00',
          'checkout_time' => '11:00',
          'image'         => 'hotel9.jpg',
          'hotel_exist'   => 1//'TRUE'
        ];
        DB::table('hotels')->insert($param);

        $param = [
          'name'          => '神戸みなと温泉　蓮',
          'type_id'       => '4',
          'postal'        => '6500041',
          'address'       => '兵庫県神戸市中央区新港町１－１',
          'checkin_time'  => '15:00',
          'checkout_time' => '11:00',
          'image'         => 'hotel10.jpg',
          'hotel_exist'   => 1//'TRUE'
        ];
        DB::table('hotels')->insert($param);
    }
}
