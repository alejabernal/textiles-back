<?php

namespace App;

use App\Category;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
   // protected $connection = 'connection-name';


    
   public function category()
    {
        return $this->belongsTo('App\Category');
    }


}