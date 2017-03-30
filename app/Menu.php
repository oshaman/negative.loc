<?php

namespace Oshaman\Publication;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'title', 'path','parent', 'ico'
    ];
    
    public function delete(array $options = []) {
    	
    	// $this
    	self::where('parent',$this->id)->delete();
		
		
		return parent::delete($options);
	}
}
