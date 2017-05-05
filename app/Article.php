<?php

namespace Oshaman\Publication;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'img', 'alias', 'text', 'description', 'source', 'keywords', 'meta_desc', 'category_id', 'created_at', 'approved'];
    
    public function user() {
		return $this->belongsTo('Oshaman\Publication\User');
	}
	
	public function category() {
		return $this->belongsTo('Oshaman\Publication\Category');
	}
	
	/* public function comments()
    {
        return $this->hasMany('Oshaman\Publication\Comment');
    } */
}
