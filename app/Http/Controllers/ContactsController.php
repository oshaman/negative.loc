<?php

namespace Oshaman\Publication\Http\Controllers;

use Illuminate\Http\Request;

class ContactsController extends MainController
{
    public function __construct()
    {    	
    	parent::__construct(new \Oshaman\Publication\Repositories\MenusRepository(new \Oshaman\Publication\Menu));
    	
    	// $this->sidebar_vars = true;
		
	}
    
    public function index()
    {
        $this->keywords = 'Contacts';
        $this->meta_desc = 'Contacts';
        $this->title = 'Contact Us';
        $this->template = 'contacts.index';
        
        $content = view('contacts.content')->with('content', $this->content_vars)->render();
		$this->vars = array_add($this->vars, 'content', $content);
        
        return $this->renderOutput();
    }
}
