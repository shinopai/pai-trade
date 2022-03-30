<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrimaryCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            'レディース',
            'メンズ',
            'ベビー・キッズ',
            'インテリア・住まい・小物',
            '本・音楽・ゲーム',
            'おもちゃ・ホビー・グッズ',
            'コスメ・香水・美容',
            '家電・スマホ・カメラ',
            'スポーツ・レジャー',
            'ハンドメイド',
            'チケット',
            '自動車・オートバイ',
            'その他'
        ];

        for($i = 0; $i < count($arr); $i++){
            DB::table('primary_categories')->insert([
                'name' => $arr[$i]
            ]);
        }
    }
}
