<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
   protected $fillable = [
       'name', 'photo', 'description', 'user_id', 'category_id', 'slider', 'price'
   ];
}