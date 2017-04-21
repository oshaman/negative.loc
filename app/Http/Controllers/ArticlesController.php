<?php

namespace Oshaman\Publication\Http\Controllers;

use Illuminate\Http\Request;
use Oshaman\Publication\Repositories\ArticlesRepository;

use Oshaman\Publication\Category;

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
        abort(404);
    }
    
    public function show($alias=false)
    {
        $where = FALSE;
    	
    	if ($alias) {
			$id = Category::select('*')->where('title', $alias)->first();
            if (!$id) {                
                abort(404);
            }
            //WHERE `category_id` = $id
            $where = ['category_id',$id->id];
            $this->content_vars = $this->a_rep->get(
                    ['title', 'created_at', 'description', 'img', 'alias', 'source'],
                    false, true, $where, ['created_at', 'desc']
            );
		
            $this->title = trans('categories.title_' . $id->title);
            $this->meta_desc = trans('categories.title_' . $id->title);
            $this->keywords = trans('categories.title_' . $id->title);

            $this->template = 'articles.index';
            
            $content = view('articles.content_category')->with('content', $this->content_vars)->render();
            $this->vars = array_add($this->vars, 'content', $content);
            // dd($this->content_vars);
            
            return $this->renderOutput();
        }
        abort(404);
    }
}
