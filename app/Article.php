<?php

namespace Oshaman\Publication;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'img', 'alias', 'text', 'desc', 'keywords', 'meta_desc', 'category_id', 'created_at'];
    
    public function user() {
		return $this->belongsTo('Corp\User');
	}
	
	public function category() {
		return $this->belongsTo('Oshaman\Publication\Category');
	}
	
	/* public function comments()
    {
        return $this->hasMany('Oshaman\Publication\Comment');
    } */
}
