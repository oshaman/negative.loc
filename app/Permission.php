<?php

namespace Oshaman\Publication;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function roles()
    {
		return $this->belongsToMany('Oshaman\Publication\Role','permission_role');
	}
}
