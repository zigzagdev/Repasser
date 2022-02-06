<?php

namespace Tests\Unit;

use App\Models\Admin;
use App\Models\Item;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;


class CreateTest extends TestCase
{
    use DatabaseTransactions;
    private $connectionsToTransact = [ 'repasser' ];

    public function test_管理者作成が出来るかどうか()
    {
        $this->artisan('db:seed', ['--class' => 'AdminTableSeeder']);

        $datas = new Admin;
        $datas -> user_name = "yamada";
        $datas -> password = Hash::make($datas->password);
        $datas -> email = "test123@hoge.com";
        $datas -> save();

        return redirect('admin/deedAccountShow/'.$datas->id);
    }

    public function test_管理者更新が出来るかどうか()
    {
        $admins = Admin::where('name', 'yamada')->first();
        $admins -> user_name = "sato";
        $admins -> email = "test999@hoge.com";
        $admins -> save();

        return redirect('admin/deedAccountShow/'.$admins->id);
    }

    public function test_商品登録が出来るかどうか()
    {

       $items = new Item;
       $items -> item_name = 'Test太郎';
       $items -> item_category = '2';
       $items -> item_content = 'あいうえお';
       $items -> recommend_flag = '2';
       $items -> image = 'test';
       $items -> price = 2000;
       $items -> admin_id = '1';
       $items -> save();

       return redirect('admin/deedShowItem/' . $items->id);
    }

}
