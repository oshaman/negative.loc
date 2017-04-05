<?php

namespace Oshaman\Publication\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends MainController
{
    public function index($alias=false)
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
