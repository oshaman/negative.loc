<?php

namespace Oshaman\Publication;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title','img','alias','text','desc','keywords','meta_desc','day'];
    
    public function user() {
		return $this->belongsTo('Oshaman\Publication\User');
	}
}
