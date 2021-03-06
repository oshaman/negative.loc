<?php

namespace Oshaman\Publication\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Oshaman\Publication\Http\Controllers\Controller;

use Auth;
use Gate;
use Oshaman\Publication\Category;
use Oshaman\Publication\Article;
use Oshaman\Publication\Repositories\ArticlesRepository;
use Oshaman\Publication\Http\Requests\ArticleRequest;

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
    
    public function sorted(Request $request)
    {
        if (Gate::denies('CONFIRMATION_DATA')) {
            abort(404);
        }
        $articles = '';
        if ($request->isMethod('post')) {
            
            $rules = [
                    'selection' => 'required|alpha|max:10|min:2',
                    'param' => 'nullable|alpha_dash|max:255',
                ];
            $this->validate($request, $rules);
            $result = $this->a_rep->selectArticles($request);
            // dd($result);
            if (is_array($result) && !empty($result['error'])) {
                return back()->with($result);
            } else {
                $articles = $result;
            }
        }
        $this->title = trans('ua.selection');
        if (!empty($articles)) {
            $articles->load('category');
        }
        
        $this->content = view('admin.articles.selection')->with('articles', $articles)->render();
       
        return $this->renderOutput();
    }
    
    public function create(ArticleRequest $request)
    {
        if (Gate::denies('create', new Article)) {
            abort(404);
		}
        /**
        * Store a newly created resource in storage.
        *
        */
        if ($request->isMethod('post')) {

            $result = $this->a_rep->addArticle($request);
		
            if(is_array($result) && !empty($result['error'])) {
                return back()->with($result);
            }
            
            return redirect('/admin/articles/edit/'. $result['id'])->with($result);
        }
        
        /**
        * Show the form for creating a new resource.
        *
        */
        
        $this->title = trans('admin.add');
		
		$categories = Category::select(['title','parent_id','id'])->get();
		
		$lists = array();
		
		foreach($categories as $category) {
			if($category->parent_id == 0) {
				$lists[trans('categories.' . $category->title)] = array();
			}
			else {
				$lists[trans('categories.' . $categories->where('id',$category->parent_id)->first()->title)][$category->id] = trans('categories.' . $category->title);    
			}
		}
		
		$this->content = view('admin.articles.add_content')->with('categories', $lists)->render();
		
		return $this->renderOutput();
        
    }
    
    public function edit(ArticleRequest $request, Article $article)
    {
        
        // dd($article);
        if ($request->isMethod('post')) {
            $result = $this->a_rep->updateArticle($request, $article);
		
            if(is_array($result) && !empty($result['error'])) {
                return back()->with($result);
            }
            
            return redirect('/admin/articles')->with($result);
        }
        
        if (Gate::denies('update', $article)) {
			abort(404);
		}
        
        $this->title = trans('admin.edit');
        $categories = Category::select(['title','parent_id','id'])->get();
		
		$lists = array();
		
		foreach($categories as $category) {
			if($category->parent_id == 0) {
				$lists[trans('categories.' . $category->title)] = array();
			}
			else {
				$lists[trans('categories.' . $categories->where('id',$category->parent_id)->first()->title)][$category->id] = trans('categories.' . $category->title);    
			}
		}
		
        if($article) {
			$article->img = json_decode($article->img);
		}
        
		$this->content = view('admin.articles.edit_content')->with(['categories' => $lists, 'article' => $article])->render();
        
		return $this->renderOutput();
        
    }
    
    public function del(Article $article)
    {
        if (Gate::denies('destroy', $article)) {
            abort(404);
        }
        
        $result = $this->a_rep->deleteArticle($article);
		
        return back()->with($result);
    }
}
