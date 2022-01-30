<?php

namespace Tests\Unit;

use App\Models\Admin;
use Illuminate\Foundation\TestingRefreshDatabase;
use Database\Seeders\AdminTableSeeder;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use TestingRefreshDatabase;

    public function test_管理者作成が出来るかどうか()
    {
        $datas = new Admin;
        $datas -> user_name = "yamada";
        $datas -> password = Hash::make($datas->password);
        $datas -> email = "test123@hoge.com";
        $datas -> save();

        $response = $this->get(redirect('admin/deedAccountShow/'.$datas->id));

        $response->assertStatus(201);
    }
}
