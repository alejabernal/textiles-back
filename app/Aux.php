<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use MongoDB\Client as Mongo;

class Bill extends Model
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
   // protected $connection = 'connection-name';


    public function products()
    {
       // return $this->belongsToMany('App\User');
    }
}