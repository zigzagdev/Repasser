<?php

namespace Tests\Unit;

use App\Models\Admin;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Hash;


class ExampleTest extends TestCase
{
    use DatabaseTransactions;
    private $connectionsToTransact = [ 'repasser' ];

    public function test_管理者作成が出来るかどうか()
    {
        $datas = new Admin;
        $datas -> user_name = "yamada";
        $datas -> password = Hash::make($datas->password);
        $datas -> email = "test123@hoge.com";
        $datas -> save();

        return redirect('admin/deedAccountShow/'.$datas->id);
    }
}
