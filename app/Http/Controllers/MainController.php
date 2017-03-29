<?php

namespace Oshaman\Publication\Http\Controllers;

use Illuminate\Http\Request;
use Menu;

class MainController extends Controller
{
    protected $m_rep;
    
    protected $keywords;
	protected $meta_desc;
	protected $title;
    
    protected $template = 'index';
    protected $content_vars;
    protected $sidebar_vars = false;
    protected $footer_vars;
    
    
    protected $vars = array();

    /* public function __construct(MenusRepository $m_rep) {
		$this->m_rep = $m_rep;
	} */
	
	
	 protected function renderOutput() {
		
		
		// $menu = $this->getMenu();
		$menu = '';
		
		//dd($menu);
		
		
		$this->vars = array_add($this->vars, 'keywords', $this->keywords);
		$this->vars = array_add($this->vars, 'meta_desc', $this->meta_desc);
		$this->vars = array_add($this->vars, 'title', $this->title);
		
		$topbar = view('layouts.topbar')->render();
		$this->vars = array_add($this->vars, 'topbar', $topbar);
        
		$header = view('layouts.header')->with('menu', $menu)->render();
		$this->vars = array_add($this->vars, 'header', $header);
        
        $content = view('layouts.content')->with('content', $this->content_vars)->render();
		$this->vars = array_add($this->vars, 'content', $content);
        
        if($this->sidebar_vars){
            $sidebar = view('layouts.sidebar')->with('sidebar', $this->sidebar_vars)->render();
            $this->vars = array_add($this->vars, 'sidebar', $sidebar);
        }
        
        $footer = view('layouts.footer')->with('footer', $this->footer_vars)->render();
		$this->vars = array_add($this->vars, 'footer', $footer);
        

		
		
		
		return view($this->template)->with($this->vars);
	}
	/*
	public function getMenu() {
		
		$menu = $this->m_rep->get();
		
		
		
		$mBuilder = Menu::make('MyNav', function($m) use ($menu) {
			
			foreach($menu as $item) {
				
				if($item->parent == 0) {
					$m->add($item->title,$item->path)->id($item->id);
				}
				else {
					if($m->find($item->parent)) {
						$m->find($item->parent)->add($item->title,$item->path)->id($item->id);
					}
				}
			}
			
		});
		
		//dd($mBuilder);
		
		return $mBuilder;
	} */	
}
