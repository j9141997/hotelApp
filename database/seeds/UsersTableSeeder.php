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
    public function run()
    {
        // 10人文テストデータ作成
        $params = [
            [
                'name'              => 'user1',
                'postal'            => '1231234',
                'address'           => '東京都新宿区新宿３丁目１−１３ 京王新宿追分ビル4F',
                'tel'               => '12312341234',
                'email'             => 'user1@example.com',
                'birthday'          => '2020/5/17',
                'password'          => Hash::make('111111'),
                'remember_token'    => Str::random(10),
            ],
            [
                'name'              => 'user2',
                'postal'            => '1231234',
                'address'           => '東京都新宿区新宿３丁目１−１３ 京王新宿追分ビル4F',
                'tel'               => '12312341234',
                'email'             => 'user2@example.com',
                'birthday'          => '2020/5/17',
                'password'          => Hash::make('222222'),
                'remember_token'    => Str::random(10),
            ],
            [
                'name'              => 'user3',
                'postal'            => '1231234',
                'address'           => '東京都新宿区新宿３丁目１−１３ 京王新宿追分ビル4F',
                'tel'               => '12312341234',
                'email'             => 'user3@example.com',
                'birthday'          => '2020/5/17',
                'password'          => Hash::make('333333'),
                'remember_token'    => Str::random(10),
            ],
            [
                'name'              => 'user4',
                'postal'            => '1231234',
                'address'           => '東京都新宿区新宿３丁目１−１３ 京王新宿追分ビル4F',
                'tel'               => '12312341234',
                'email'             => 'user4@example.com',
                'birthday'          => '2020/5/17',
                'password'          => Hash::make('444444'),
                'remember_token'    => Str::random(10),
            ],
            [
                'name'              => 'user5',
                'postal'            => '1231234',
                'address'           => '東京都新宿区新宿３丁目１−１３ 京王新宿追分ビル4F',
                'tel'               => '12312341234',
                'email'             => 'user5@example.com',
                'birthday'          => '2020/5/17',
                'password'          => Hash::make('55555'),
                'remember_token'    => Str::random(10),
            ],
            [
                'name'              => 'user6',
                'postal'            => '1231234',
                'address'           => '東京都新宿区新宿３丁目１−１３ 京王新宿追分ビル4F',
                'tel'               => '12312341234',
                'email'             => 'user6@example.com',
                'birthday'          => '2020/5/17',
                'password'          => Hash::make('666666'),
                'remember_token'    => Str::random(10),
            ],
            [
                'name'              => 'user7',
                'postal'            => '1231234',
                'address'           => '東京都新宿区新宿３丁目１−１３ 京王新宿追分ビル4F',
                'tel'               => '12312341234',
                'email'             => 'user7@example.com',
                'birthday'          => '2020/5/17',
                'password'          => Hash::make('777777'),
                'remember_token'    => Str::random(10),
            ],
            [
                'name'              => 'user8',
                'postal'            => '1231234',
                'address'           => '東京都新宿区新宿３丁目１−１３ 京王新宿追分ビル4F',
                'tel'               => '12312341234',
                'email'             => 'user8@example.com',
                'birthday'          => '2020/5/17',
                'password'          => Hash::make('888888'),
                'remember_token'    => Str::random(10),
            ],
            [
                'name'              => 'user9',
                'postal'            => '1231234',
                'address'           => '東京都新宿区新宿３丁目１−１３ 京王新宿追分ビル4F',
                'tel'               => '12312341234',
                'email'             => 'user9@example.com',
                'birthday'          => '2020/5/17',
                'password'          => Hash::make('999999'),
                'remember_token'    => Str::random(10),
            ],
            [
                'name'              => 'user10',
                'postal'            => '1231234',
                'address'           => '東京都新宿区新宿３丁目１−１３ 京王新宿追分ビル4F',
                'tel'               => '12312341234',
                'email'             => 'user10@example.com',
                'birthday'          => '2020/5/17',
                'password'          => Hash::make('000000'),
                'remember_token'    => Str::random(10),
            ],
        ];
        foreach($params as $param)
        {
            DB::table('users')->insert($param);
        }
    }
}
