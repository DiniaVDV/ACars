<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * A user can have a many comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function comment()
    {
        return $this->hasMany('App\Models\Comment');
    }

    /**
     * A user can have a many orders.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }
}
