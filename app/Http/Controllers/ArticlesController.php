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
    /**
    *   View current article
    * 
    */
    public function index($alias=false)
    {
        if ($alias) {
            $article = $this->a_rep->one($alias, ['cat' => true]);
            if (isset($article->id)) {
                
                $article->img = json_decode($article->img);
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
    /**
    *   View articles by category or view all categories
    * 
    */
    public function show($alias=false)
    {
        $where = FALSE;
    	//  articles by selected category
    	if ($alias) {
			$id = Category::select('*')->where('title', $alias)->first();
            if (!$id) {                
                abort(404);
            }
            $where = array(['category_id', $id->id], ['approved', true]);
            
            $this->content_vars = $this->a_rep->get(
                    ['title', 'created_at', 'description', 'img', 'alias', 'source'],
                    false, true, $where, ['created_at', 'desc']
            );
		
            $this->title = trans('categories.title_' . $id->title);
            $this->meta_desc = trans('categories.title_' . $id->title);
            $this->keywords = trans('categories.title_' . $id->title);

            $this->template = 'articles.index';
            
            $content = view('articles.content_category')->with(['content' => $this->content_vars, 'title' => $this->title])->render();
            $this->vars = array_add($this->vars, 'content', $content);
            
            return $this->renderOutput();
        }
        
        $cats = Category::select('*')->whereNotIn('parent_id', [0])->get();
        
        foreach ($cats as $cat) {
            $where = array(['category_id', $cat->id], ['approved', true]);
            
            $this->content_vars[$cat->title] = $this->a_rep->get(['title', 'created_at','alias'], 5, false, $where, ['created_at', 'desc']);
            
        }
        
        $this->title = trans('ua.latest_news');
        $this->meta_desc = trans('ua.latest_news');
        $this->keywords = trans('ua.latest_news');

        $this->template = 'articles.index';
        
        $content = view('articles.content_by_categories')->with(['content' => $this->content_vars, 'title' => $this->title])->render();
        $this->vars = array_add($this->vars, 'content', $content);
        
        return $this->renderOutput(); 
    }
}
