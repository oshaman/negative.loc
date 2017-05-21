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
    
    public function articles()
    {
		return $this->hasMany('Oshaman\Publication\Article');
	}
	
    public function events()
    {
		return $this->hasMany('Oshaman\Publication\Event');
	}
	
	public function roles()
    {
		return $this->belongsToMany('Oshaman\Publication\Role','role_user');
	}
    
    //  set $requre = true if all of permissions has to be checked
	public function canDo($permission, $require = FALSE)
    {
		if(is_array($permission)) {
			foreach($permission as $permName) {
				
				$permName = $this->canDo($permName);
				if($permName && !$require) {
					return TRUE;
				}
				else if(!$permName && $require) {
					return FALSE;
				}				
			}
			// dd($require);
			return  $require;
		}
		else {
			foreach($this->roles as $role) {
				foreach($role->perms as $perm) {
					if(str_is($permission,$perm->name)) {
						return TRUE;
					}
				}
			}
		}
	}
	
	// string  ['role1', 'role2']
	public function hasRole($name, $require = false)
    {
        if (is_array($name)) {
            foreach ($name as $roleName) {
                $hasRole = $this->hasRole($roleName);

                if ($hasRole && !$require) {
                    return true;
                } elseif (!$hasRole && $require) {
                    return false;
                }
            }
            return $require;
        } else {
            foreach ($this->roles as $role) {
                if ($role->name == $name) {
                    return true;
                }
            }
        }

        return false;
    }
}
