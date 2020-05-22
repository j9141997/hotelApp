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

     /*
       ・user_id４と７が異なるホテルに対して口コミ
       ・hotel_idが1000000002、1000000005に２つの口コミ
       ・少し長めのコメント（hotel_id 1000000001）
     */
    public function run()
    {
        $param = [
          'user_id'  => 1,
          'hotel_id' => 1000000000,
          'text'     => 'またぜひ利用したいです！',
        ];
        DB::table('reviews')->insert($param);

        $param = [
          'user_id'  => 2,
          'hotel_id' => 1000000001,
          'text'     => '仕事帰りの定宿です。ベッドも広く今回は料金が妥当でありがたかったです。翌日朝が早いので、短い時間で利用できるプランがあればなおいいです。',
        ];
        DB::table('reviews')->insert($param);

        $param = [
          'user_id'  => 3,
          'hotel_id' => 1000000002,
          'text'     => '室内はすっきり整備されていて過不足なく過ごせました。',
        ];
        DB::table('reviews')->insert($param);

        $param = [
          'user_id'  => 4,
          'hotel_id' => 1000000002,
          'text'     => 'お部屋はとても清潔感があって綺麗で安心してすごせました。また利用させて頂きたいと思います。',
        ];
        DB::table('reviews')->insert($param);

        $param = [
          'user_id'  => 4,
          'hotel_id' => 1000000003,
          'text'     => 'また宿泊したいホテルです。',
        ];
        DB::table('reviews')->insert($param);

        $param = [
          'user_id'  => 5,
          'hotel_id' => 1000000004,
          'text'     => 'ポットが水垢ついてたのと、誰かの充電器の忘れ物？みたいなの置いてあってちょっと不安になった…',
        ];
        DB::table('reviews')->insert($param);

        $param = [
          'user_id'  => 6,
          'hotel_id' => 1000000005,
          'text'     => '来月も出張予定なので、タイミング合えば利用させていただきます。',
        ];
        DB::table('reviews')->insert($param);

        $param = [
          'user_id'  => 7,
          'hotel_id' => 1000000005,
          'text'     => '場所は分かりにくいですが綺麗で、最新の設備が整ってます。',
        ];
        DB::table('reviews')->insert($param);

        $param = [
          'user_id'  => 7,
          'hotel_id' => 1000000006,
          'text'     => 'コストパフォーマンスはかなり良いと思います。',
        ];
        DB::table('reviews')->insert($param);

        $param = [
          'user_id'  => 8,
          'hotel_id' => 1000000007,
          'text'     => '立地やサービス等総合的に見てとてもコスパのいい、良いホテルだと思います',
        ];
        DB::table('reviews')->insert($param);
    }
}
