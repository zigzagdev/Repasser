<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->truncate();

        $datas = [
            [
                'item_name'=>'iPhoneX','category_name'=>'周辺機器','recommend_flag'=>'0',
                'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')
            ],
        ];

        foreach ($datas as $data) {
            DB::table('items')->insert($data);
        }
    }
}
