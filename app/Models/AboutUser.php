<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Contracts\Buyable;

class AboutUser extends Model implements Buyable
{
	protected $fillable =[
		'user_id',
		'first_name',
		'second_name',
		'phone_number',
		'city',
		'street',
		'house_number',
		'flat_number',
	];

    public function getBuyableIdentifier($options = null){
        return $this->id;
    }

    public function getBuyableDescription($options = null){
        return $this->name;
    }

    public function getBuyablePrice($options = null){
        return $this->price;
    }


	
}
