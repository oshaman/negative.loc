<?php

namespace Oshaman\Publication;

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
    
    public function articles() {
		return $this->hasMany('Oshaman\Publication\Article');
	}
	
	
	/* public function roles() {
		return $this->belongsToMany('Oshaman\Publication\Role','role_user');
	} */
}
