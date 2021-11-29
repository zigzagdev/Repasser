<?php

namespace Database\Seeders;

use Faker\Provider\Text;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\Cast\Int_;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'user_name'      => Str::random(10),
            'password'       => Str::random(30),
            'email'          => Str::random(40),
            'item_name'      => Str::random(10),
            'description'    => Str::random(10),
            'recommend_flag' => 0,
            'item_category'  => 1
        ]);
    }
}
