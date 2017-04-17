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
    protected $articles_rep;
    
    public function __construct(ArticlesRepository $a_rep)
    {
    	
    	parent::__construct(new \Oshaman\Publication\Repositories\MenusRepository(new \Oshaman\Publication\Menu));
    	
    	$this->articles_rep = $a_rep;
        $this->sidebar_vars = true;
		
	}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->content_vars = $this->articles_rep->get(
                ['title', 'created_at', 'desc', 'img', 'alias', 'category_id'],
                false, true, false, false
                );
        if ($this->content_vars) {
            $this->content_vars->load('category');
        }
        // dd($this->content_vars);
        $content = view('layouts.content')->with('content', $this->content_vars)->render();
		$this->vars = array_add($this->vars, 'content', $content);
        
        return $this->renderOutput();
    }
}
