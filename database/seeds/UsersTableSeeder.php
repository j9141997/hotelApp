<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     //田中太郎が２人います

    public function run()
    {
        // 10人文テストデータ作成
        $params = [
            [
                'name'              => '山田花子',
                'postal'            => '1880004',
                'address'           => '東京都西東京市西原町1-816-6',
                'tel'               => '0823287315',
                'email'             => 'yamada_hanako@example.com',
                'birthday'          => '1982/11/16',
                'password'          => Hash::make('12345678'),
                'remember_token'    => Str::random(10),
            ],
            [
                'name'              => '妹尾哲平',
                'postal'            => '5160023',
                'address'           => '三重県伊勢市宇治館町367-15',
                'tel'               => '09061373448',
                'email'             => 'seo_teppei@example.com',
                'birthday'          => '1957/12/28',
                'password'          => Hash::make('12345678'),
                'remember_token'    => Str::random(10),
            ],
            [
                'name'              => '水川礼子',
                'postal'            => '9813109',
                'address'           => '宮城県仙台市泉区鶴が丘2-112-13',
                'tel'               => '09049925850',
                'email'             => 'mizukawa_reiko@example.com',
                'birthday'          => '1989/7/7',
                'password'          => Hash::make('12345678'),
                'remember_token'    => Str::random(10),
            ],
            [
                'name'              => '益岡彩',
                'postal'            => '8100025',
                'address'           => '福岡県福岡市中央区薬院伊福町455-7',
                'tel'               => '08015314606',
                'email'             => 'masuoka_aya@example.com',
                'birthday'          => '1980/11/18',
                'password'          => Hash::make('12345678'),
                'remember_token'    => Str::random(10),
            ],
            [
                'name'              => '松山さとみ',
                'postal'            => '6168207',
                'address'           => '京都府京都市右京区宇多野長尾町194-5',
                'tel'               => '09075105753',
                'email'             => 'matsuyama_satomi@example.com',
                'birthday'          => '1956/6/6',
                'password'          => Hash::make('12345678'),
                'remember_token'    => Str::random(10),
            ],
            [
                'name'              => '奥野莉央',
                'postal'            => '3570213',
                'address'           => '埼玉県飯能市坂石町分428-17',
                'tel'               => '09041318550',
                'email'             => 'okuno_rio@example.com',
                'birthday'          => '1995/2/17',
                'password'          => Hash::make('12345678'),
                'remember_token'    => Str::random(10),
            ],
            [
                'name'              => '三浦遥',
                'postal'            => '9880247',
                'address'           => '宮城県気仙沼市波路上内沼566-20',
                'tel'               => '08093222805',
                'email'             => 'miura_haruka@example.com',
                'birthday'          => '1955/12/20',
                'password'          => Hash::make('12345678'),
                'remember_token'    => Str::random(10),
            ],
            [
                'name'              => '高木雅功',
                'postal'            => '3260068',
                'address'           => '栃木県足利市月谷町407-19',
                'tel'               => '08067705132',
                'email'             => 'takagi_masatoshi@example.com',
                'birthday'          => '1996/4/30	',
                'password'          => Hash::make('12345678'),
                'remember_token'    => Str::random(10),
            ],
            [
                'name'              => '田中太郎',
                'postal'            => '1231234',
                'address'           => '高知県吾川郡仁淀川町大尾518-2',
                'tel'               => '08040904891',
                'email'             => 'tanaka_taro1@example.com',
                'birthday'          => '1955/8/17',
                'password'          => Hash::make('12345678'),
                'remember_token'    => Str::random(10),
            ],
            [
                'name'              => '田中太郎',
                'postal'            => '6360217',
                'address'           => '奈良県磯城郡三宅町屏風954-14',
                'tel'               => '08046836681',
                'email'             => 'tanaka_taro2@example.com',
                'birthday'          => '1992/11/29',
                'password'          => Hash::make('12345678'),
                'remember_token'    => Str::random(10),
            ],
        ];
        foreach($params as $param)
        {
            DB::table('users')->insert($param);
        }
    }
}
