<?php

namespace Oshaman\Publication\Http\Controllers;

use Illuminate\Http\Request;
use Oshaman\Publication\Repositories\ArticlesRepository;

class ArticlesController extends MainController
{
    protected $a_rep;
    
    public function __construct(ArticlesRepository $rep)
    {
        parent::__construct(new \Oshaman\Publication\Repositories\MenusRepository(new \Oshaman\Publication\Menu));
        $this->a_rep = $rep;
        $this->sidebar_vars = true;
    }
    
    public function index($alias=false)
    {
        if ($alias) {
            $article = $this->a_rep->one($alias, ['cat' => true]);
            // dd($article);
            if (isset($article->id)) {
                $this->title = $article->title;
                $this->keywords = $article->keywords;
                $this->meta_desc = $article->meta_desc;
                
                $this->content_vars = $article;
                
                $content = view('articles.content')->with('content', $this->content_vars)->render();
                $this->vars = array_add($this->vars, 'content', $content);
                
                
                $this->template = 'articles.index';
                return $this->renderOutput();
            }
        }
        
        
    }
    
    public function show($alias=false)
    {
        $this->title = 'Bad News';
        $this->meta_desc = 'Bad News';
        $this->keywords = 'Bad News';
        
        $this->template = 'articles.index';
        
        // dd($this->content_vars);
        
        $content = view('articles.content')->with('content', $this->content_vars)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        
        
        return $this->renderOutput();
    }
}
