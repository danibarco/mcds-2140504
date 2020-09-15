<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
   protected $fillable = [
       'name', 'photo', 'description', 'user_id', 'category_id', 'slider', 'price'
   ];

    public function user(){
        return $this->belonsTo('App\User');
    }

    public function category(){
        return $this->belonsTo('App\Category');
    }

}