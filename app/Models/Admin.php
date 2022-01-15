<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
   protected $table = 'admins';


    public function items()
    {
        return $this->hasMany(Item::class, 'admin_id','id');
    }

}
