<?php

namespace App\Models;

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

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function aboutUser()
    {
        return $this->hasOne('App\Models\AboutUser');
    }

	 /**
     * Get the roles associated with the given user.
	 *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
	public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'user_role');
    }
    /**
     * A user can have a many orders.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
	    
		
	/**
     * Get a role id s associated with current user
     *
     * @return array
     */

    public function getRoleListAttribute()
    {
        return $this->roles->pluck('id')->toArray();
    }
	
	 /**
     * @param $roleName
     * @return bool
     */
    public function isThe($roleName)
    {
		foreach($this->roles()->get() as $role){
			if($role->name == $roleName){
				return true;
			}
		}
        return false;
    }

    /**
     * @param $comments
     * @return array
     */
    public static function usersForComments($comments)
    {
        $users = array();
        foreach($comments as $comment){
            $user = self::where('id', $comment->user_id)->get();
            $users[$comment->id] = $user;
        }

        return $users;
    }
}
