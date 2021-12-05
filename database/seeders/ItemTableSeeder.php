<?php

namespace Database\Seeders;

use App\Models\Admin;
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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('admins')->truncate();
        $this->call([AdminTableSeeder::class]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        $admin = Admin::find(1);
        for($i=1 ; $i<=5 ; $i++)

        $datas = [
            [
                'item_name'=>'iPhoneX','category_name'=>'周辺機器','item_content'=>'iPhoneXです。','recommend_flag'=>'0',
                'admin_id'=>$admin->id,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')
            ],
        ];

        foreach ($datas as $data) {
            DB::table('items')->insert($data);
        }
    }
}
