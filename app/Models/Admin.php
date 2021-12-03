<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
   protected $table = 'admins';

   protected $guarded = ['id'];
   protected $fillable = ['user_name','password','email','item_name','description','recommend_flag','item_category'];

}


//
