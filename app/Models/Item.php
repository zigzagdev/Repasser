<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = ['id', 'admin_id'];
    protected $fillable = ['item_name', 'item_category', 'item_content', 'price', 'category_name', 'recommend_flag', 'image'];

    public function admins()
    {
        return $this->belongsTo(Admin::class, 'admin_id','id');
    }
}
