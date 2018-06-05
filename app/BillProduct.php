<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillProduct extends Model
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
   // protected $connection = 'connection-name';

    public $products;


    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function bill()
    {
        return $this->belongsTo('App\Bill');
    }




}