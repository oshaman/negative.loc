<?php

namespace Oshaman\Publication\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Oshaman\Publication\Http\Controllers\Controller;

use Auth;
use Menu;
use Gate;

class AdminController extends Controller
{
    protected $template = 'admin.index';
    protected $content = FALSE;
    protected $title;
    protected $vars;
    protected $sidebar_vars = false;
    
    
    public function renderOutput()
    {
        $this->vars = array_add($this->vars, 'title', $this->title);
		
        $this->topbar_vars = $this->title;
		$topbar = view('admin.topbar')->with('top', $this->topbar_vars)->render();
		$this->vars = array_add($this->vars, 'topbar', $topbar);
        
		$menu = $this->getMenu();

		$navigation = view('admin.header')->with('menu', $menu)->render();
		$this->vars = array_add($this->vars, 'header', $navigation);
		
		if($this->content) {
			$this->vars = array_add($this->vars, 'content', $this->content);
		}
        
        if($this->sidebar_vars){
            $sidebar = view('layouts.sidebar')->with('sidebar', $this->sidebar_vars)->render();
            $this->vars = array_add($this->vars, 'sidebar', $sidebar);
        }

		$footer = view('admin.footer')->render();
		$this->vars = array_add($this->vars, 'footer', $footer);
		
        return view($this->template)->with($this->vars);
    }
    
    public function getMenu() {
		return Menu::make('adminMenu', function($menu) {
			
			$menu->add(trans('ua.home'),  array('route'  => 'home'))->prepend('<i class="icon-home"></i>');
            
            if(Gate::allows('UPDATE_ARTICLES')) {
                $menu->add(trans('ua.articles'), array('route' => 'admin_articles'))->prepend('<i class="icon-file"></i>');
            }
            
            if(Gate::allows('UPDATE_EVENTS')) {
                $menu->add(trans('ua.history'), array('route' => 'admin_events'))->prepend('<i class="icon-calendar"></i>');
            }
            
            if(Gate::allows('ADMIN_USERS')){
                $menu->add(trans('ua.permissions'),  array('route'  => 'admin_permissions'))->prepend('<i class="icon-cogs"></i>');
            }
            
            if(Gate::allows('EDIT_USERS')){
                $menu->add(trans('ua.users'),  array('route'  => 'users'))->prepend('<i class="icon-user"></i>');
            }
            
            /* 
            if(Gate::allows('VIEW_ADMIN_MENU')){
                $menu->add('Меню',  array('route'  => 'menus.index'));
            }
            
             */
            
            
            		
		});
	}
}
