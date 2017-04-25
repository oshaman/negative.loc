<?php

namespace Oshaman\Publication\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Oshaman\Publication\Http\Controllers\Controller;

use Auth;
use Menu;

class AdminController extends Controller
{
    protected $template = 'admin.index';
    protected $content = FALSE;
    protected $title;
    protected $vars;
    
    public function index()
    {
        
        
        $this->content = view('admin.content')->with('content', $this->content)->render();;
        
        
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
			
            /* if(Gate::allows('VIEW_ADMIN_ARTICLES')) {
                $menu->add('Статьи',array('route' => 'articles.index'));
            }
            
            if(Gate::allows('VIEW_ADMIN_MENU')){
                $menu->add('Меню',  array('route'  => 'menus.index'));
            }
            
            if(Gate::allows('EDIT_USERS')){
                $menu->add('Привилегии',  array('route'  => 'permissions.index'));
            }
            
            if(Gate::allows('EDIT_USERS')){
                $menu->add('Пользователи',  array('route'  => 'users.index'));
            } */
            
            
			$menu->add('Main',  array('route'  => 'home'));
            
			if(isset(Auth::user()->name)){
                $menu->add('Logout',array('route' => 'logout','class' => 'alert-danger'));
            }
			
			
		});
	}
}
