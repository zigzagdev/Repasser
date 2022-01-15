<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Psy\Util\Str;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        $datas = [
            [
              'item_category_cd'=>'1','category_name'=>'本','content'=>'I have a pen .',
                'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')
            ],
        ];

        foreach ($datas as $data) {
            DB::table('categories')->insert($data);
        }
    }
}
