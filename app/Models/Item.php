<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['item_name','item_description','category_name','recommend_flag'];

//    public function admins()
//    {
//        return $this->belongsTo(Admin::class);
//    }
}
