<?php

namespace Oshaman\Publication\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Oshaman\Publication\Http\Controllers\Controller;

use Auth;
use Gate;
use Oshaman\Publication\Category;
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
        if (Gate::denies('UPDATE_ARTICLES')) {
            abort(404);
        }
        
        $this->title = trans('admin.articles_manager');
        
        $articles = $this->a_rep->get(['id', 'title', 'description', 'alias', 'img', 'category_id', 'approved'], false, true, ['user_id', Auth::id()], ['created_at', 'desc']);

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
        if (Gate::denies('create', new \Oshaman\Publication\Article)) {
            abort(404);
		}
		
        $this->title = trans('admin.add');
		
		$categories = Category::select(['title','parent_id','id'])->get();
		
		$lists = array();
		
		foreach($categories as $category) {
			if($category->parent_id == 0) {
				$lists[$category->title] = array();
			}
			else {
				$lists[$categories->where('id',$category->parent_id)->first()->title][$category->id] = trans('categories.' . $category->title);    
			}
		}
		
		$this->content = view('admin.articles.add_content')->with('categories', $lists)->render();
		
		return $this->renderOutput();
        
    }
    
    public function edit()
    {
        if (Gate::denies('UPDATE_ARTICLES')) {
            abort(404);
        }
        dd('edit');
    }
    
    public function del()
    {
        if (Gate::denies('DELETE_ARTICLES')) {
            abort(404);
        }
        dd('del');
    }
}
