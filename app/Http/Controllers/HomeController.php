<?php

namespace Oshaman\Publication\Http\Controllers;

use Illuminate\Http\Request;

use Oshaman\Publication\Repositories\ArticlesRepository;

class HomeController extends MainController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $a_rep;
    
    public function __construct(ArticlesRepository $a_rep)
    {
    	
    	parent::__construct(new \Oshaman\Publication\Repositories\MenusRepository(new \Oshaman\Publication\Menu));
    	
    	$this->a_rep = $a_rep;
        $this->sidebar_vars = true;
		
	}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->title = trans('ua.home');
        $this->content_vars = $this->a_rep->get(
                ['title', 'created_at', 'description', 'img', 'alias', 'category_id', 'source'],
                false, true, ['approved', true], ['created_at', 'desc']
                );
        if ($this->content_vars) {
            $this->content_vars->load('category');
        }
        $content = view('layouts.content')->with('content', $this->content_vars)->render();
		$this->vars = array_add($this->vars, 'content', $content);
        
        return $this->renderOutput();
    }
}
