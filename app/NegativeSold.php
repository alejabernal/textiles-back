<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class NegativeSold extends Eloquent
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
   // protected $connection = 'connection-name';
    protected $connection ='mongodb';

    public function products()
    {
       // return $this->belongsToMany('App\User');
    }
}