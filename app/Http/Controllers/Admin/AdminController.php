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
    
    public function renderOutput()
    {
        $this->vars = array_add($this->vars, 'title', $this->title);
		
        $this->topbar_vars = $this->title;
		$topbar = view('admin.topbar')->with('top', $this->topbar_vars)->render();
		$this->vars = array_add($this->vars, 'topbar', $topbar);
        
		$menu = $this->getMenu();
		// dd($menu);
		$navigation = view('admin.header')->with('menu', $menu)->render();
		$this->vars = array_add($this->vars, 'header', $navigation);
		
		if($this->content) {
			$this->vars = array_add($this->vars, 'content', $this->content);
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
            
            /* 
            if(Gate::allows('VIEW_ADMIN_MENU')){
                $menu->add('Меню',  array('route'  => 'menus.index'));
            }
            
            if(Gate::allows('EDIT_USERS')){
                $menu->add('Привилегии',  array('route'  => 'permissions.index'));
            }
            
            if(Gate::allows('EDIT_USERS')){
                $menu->add('Пользователи',  array('route'  => 'users.index'));
            } */
            
            
            		
		});
	}
}
