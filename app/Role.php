<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
   // protected $connection = 'connection-name';


    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}