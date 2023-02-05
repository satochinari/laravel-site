<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stocks')->truncate(); //2回目実行の際にシーダー情報をクリア
        DB::table('stocks')->insert([
           'name' => '木の剣',
           'detail' => '片手装備で攻撃速度が速いが攻撃力は低い',
           'fee' => 10,
           'imgpath' => 'kinoken.jpg',
        ]);

        DB::table('stocks')->insert([
           'name' => '鉄の剣',
           'detail' => '片手装備で木の剣より攻撃力が高い',
           'fee' => 20,
           'imgpath' => 'tetunoken.jpg',
        ]);

        DB::table('stocks')->insert([
           'name' => '木の盾',
           'detail' => '防御力を増やせるが、すぐに壊れてしまう',
           'fee' => 10,
           'imgpath' => 'kinotate.jpg',
        ]);


        DB::table('stocks')->insert([
           'name' => '鉄の盾',
           'detail' => '木の盾よりも防御力を増やせる',
           'fee' => 20,
           'imgpath' => 'tetunotate.jpg',
        ]);

        DB::table('stocks')->insert([
           'name' => 'ポーション',
           'detail' => 'HPを少しだけ回復する',
           'fee' => 10,
           'imgpath' => 'posyon.jpg',
        ]);

        DB::table('stocks')->insert([
           'name' => 'フルポーション',
           'detail' => 'HPを完全に回復する',
           'fee' => 30,
           'imgpath' => 'huruposyon.jpg',
        ]);

        DB::table('stocks')->insert([
           'name' => '金の剣',
           'detail' => '攻撃力が最大になる',
           'fee' => 1000,
           'imgpath' => 'kinnoken.jpg',
        ]);

        DB::table('stocks')->insert([
           'name' => '金の盾',
           'detail' => '防御力が最大になる',
           'fee' => 1000,
           'imgpath' => 'kinnotate.jpg',
        ]);
    }
}
