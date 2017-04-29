<?php

namespace Oshaman\Publication\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Oshaman\Publication\Http\Controllers\Controller;

use Auth;
use Oshaman\Publication\Repositories\ArticlesRepository;

class ArticlesController extends AdminController
{
    protected $a_rep;
    
    public function __construct(ArticlesRepository $rep)
    {
        $this->a_rep = $rep;
    }

    public function index()
    {
        $this->title = trans('ua.articles_manager');
        
        $articles = $this->a_rep->get(['id', 'title', 'description', 'alias', 'img', 'category_id'], false, true, ['user_id', Auth::id()], ['created_at', 'desc']);
        
        if ($articles) {
            $articles->load('category');
        }
        
        $this->content = view('admin.articles.content')->with('articles', $articles)->render();
       
        return $this->renderOutput();
    }
    
    public function sorted()
    {
        dd('sorted');
    }
    
    public function create()
    {
        dd('create');
    }
    
    public function edit()
    {
        dd('edit');
    }
    
    public function destroy()
    {
        dd('del');
    }
}
