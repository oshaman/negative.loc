<?php

namespace Oshaman\Publication\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Oshaman\Publication\Http\Controllers\Controller;

use Gate;

class IndexController extends AdminController
{
	public function index()
    {	
        $this->content = view('admin.content')->with('content', $this->content)->render();
		
        $this->title = trans('ua.admin_panel');
        
        return $this->renderOutput();
    }
}
