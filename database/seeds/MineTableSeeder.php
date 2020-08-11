<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //追記


class MineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mine')->truncate(); //2回目実行の際にシーダー情報をクリア
        DB::table('mine')->insert([
            'name' => 'フィルムカメラ',
            'detail' => '1960年式のカメラです',
            'fee' => 200000,
            'imgpath' => 'filmcamera.jpg',
        ]);
    }
}
