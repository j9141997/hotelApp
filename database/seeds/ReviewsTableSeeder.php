<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
          'user_id'  => 1,
          'hotel_id' => 1000000000,
          'text'     => 'あいうえお',
        ];
        DB::table('reviews')->insert($param);

        $param = [
          'user_id'  => 2,
          'hotel_id' => 1000000001,
          'text'     => 'あいうえお',
        ];
        DB::table('reviews')->insert($param);

        $param = [
          'user_id'  => 3,
          'hotel_id' => 1000000002,
          'text'     => 'あいうえお',
        ];
        DB::table('reviews')->insert($param);
    }
}
