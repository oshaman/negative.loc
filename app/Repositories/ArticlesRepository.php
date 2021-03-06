<?php

namespace Oshaman\Publication\Repositories;

use Oshaman\Publication\Article;
use Gate;
use File;

use Image;
use Config;
use Validator;

class ArticlesRepository extends Repository {
	
	

	public function __construct(Article $articles) {
		$this->model = $articles;
	}
	
	public function one($alias, $attr = array()) {
		$article = parent::one($alias, $attr);
		
		if($article && !empty($attr)) {
			$article->load('category');
			// $article->load('comments');
			// $article->comments->load('user');
		}
		
		return $article;
	}
    
	public function addArticle($request) {

		if (Gate::denies('create', $this->model)) {
			abort(404);
		}
		
		$data = $request->except('_token','img');
		
		if (empty($data)) {
			return array('error' => trans('admin.no_data'));
		}
		
		if (empty($data['alias'])) {
			$data['alias'] = $this->transliterate($data['title']) . '-' .date('Ymd');
		} else {
			$data['alias'] = $this->transliterate($data['alias']) . '-' .date('Ymd');
        }
        
		if ($this->one($data['alias'],FALSE)) {
			$request->merge(array('alias' => $data['alias']));
			$request->flash();
			
			return ['error' => trans('admin.alias_in_use')];
		}
        
        if (!empty($data['outputtime'])) {
            $data['created_at'] = $data['outputtime'];
        }
        
        if (empty($data['source'])) {
            $data['source'] = 'www.' . config('app.name');
        }
        
        if (empty($data['keywords'])) {
            $data['keywords'] = preg_replace("#[^a-zA-zа-яА-Яї0-9]+#u", ', ', $data['title']);
        }
        
        if (empty($data['meta_desc'])) {
            $data['meta_desc'] = preg_replace("#[^a-zA-zа-яА-Яї0-9]+#u", ', ', $data['title']);
        }
        
        if (empty($data['description'])) {
            $data['description'] = str_limit($data['text'], 320);
        }
        
        if (!empty($data['approved'])) {
            if (Gate::denies('CONFIRMATION_DATA')) {
                array_forget($data, 'approved');
            } else {
                $data['approved'] = true;
            }
        }
		
		if ($request->hasFile('img')) {
			$image = $request->file('img');
			
			if($image->isValid()) {
				
				$str = substr($data['alias'], 0, 32) . '-' . time();

				$obj = new \stdClass;
				
				$obj->micro = $str.'_micro.jpg';
				$obj->mini = $str.'_mini.jpg';
				$obj->max = $str.'_max.jpg';
				$obj->path = $str.'.jpg';
                
				$img = Image::make($image);
				
				$img->save(public_path().'/'.config('settings.theme').'/images/articles/'.$obj->path, 100); 
				 
				$img->widen(Config::get('settings.articles_img')['max']['width'])->save(public_path().'/'.config('settings.theme').'/images/articles/'.$obj->max, 100); 
				
				$img->fit(Config::get('settings.articles_img')['mini']['width'],
						Config::get('settings.articles_img')['mini']['height'])->save(public_path().'/'.config('settings.theme').'/images/articles/'.$obj->mini, 100);
                        
                $img->fit(Config::get('settings.articles_img')['micro']['width'],
                        Config::get('settings.articles_img')['micro']['height'])->save(public_path().'/'.config('settings.theme').'/images/articles/'.$obj->micro, 100);
						
				
				$data['img'] = json_encode($obj);
			}
		}
        
        $this->model->fill($data);
        // dd($this->model);
        $id = $request->user()->articles()->save($this->model)->id;
        if($id) {
            return ['status' => trans('admin.material_added'), 'id' => $id];
        }
	}
    
    
	public function updateArticle($request, $article) {

		if (Gate::denies('update', $article)) {
			abort(404);
		}
		
		$data = $request->except('_token','img','_method');
		
		if (empty($data)) {
			return array('error' => trans('admin.no_data'));
		}
		
        if (empty($data['alias'])) {
			$data['alias'] = $this->transliterate($data['title']) . '-' .date('Ymd');
		} elseif ($data['alias'] != $article->alias) {
			$data['alias'] = $this->transliterate($data['alias']) . '-' .date('Ymd');
        }
		
		$result = $this->one($data['alias'],FALSE);
		
		if(isset($result->id) && ($result->id != $article->id)) {
			$request->merge(array('alias' => $data['alias']));
			$request->flash();
			
			return ['error' => trans('admin.alias_in_use')];
		}
        
        if (!empty($data['outputtime'])) {
            $data['created_at'] = $data['outputtime'];
        }
        
        if (empty($data['source'])) {
            $data['source'] = 'www.' . config('app.name');
        }
        
        if (empty($data['description'])) {
            $data['description'] = str_limit($data['text'], 320);
        }
        
        if (empty($data['keywords'])) {
            $data['keywords'] = preg_replace("#[^a-zA-zа-яА-Яїі0-9\()]+#u", ', ', $data['title']);
        }
        
        if (empty($data['meta_desc'])) {
            $data['meta_desc'] = preg_replace("#[^a-zA-zа-яА-Яїі0-9\()]+#u", ', ', $data['title']);
        }
        
        if (!empty($data['approved'])) {
            if (Gate::denies('CONFIRMATION_DATA')) {
                array_forget($data, 'approved');
            } else {
                $data['approved'] = true;
            }
        } else {
            $data['approved'] = false;
        }
        
		if ($request->hasFile('img')) {
            
			$image = $request->file('img');

			if($image->isValid()) {
				
				$str = substr($data['alias'], 0, 32) . '-' . time();

				$obj = new \stdClass;
				
				$obj->micro = $str.'_micro.jpg';
				$obj->mini = $str.'_mini.jpg';
				$obj->max = $str.'_max.jpg';
				$obj->path = $str.'.jpg';
                
				$img = Image::make($image);
				
				$img->save(public_path().'/'.config('settings.theme').'/images/articles/'.$obj->path, 100); 
				 
				$img->widen(Config::get('settings.articles_img')['max']['width'])->save(public_path().'/'.config('settings.theme').'/images/articles/'.$obj->max, 100); 
				
				$img->fit(Config::get('settings.articles_img')['mini']['width'],
						Config::get('settings.articles_img')['mini']['height'])->save(public_path().'/'.config('settings.theme').'/images/articles/'.$obj->mini, 100);
                        
                $img->fit(Config::get('settings.articles_img')['micro']['width'],
                        Config::get('settings.articles_img')['micro']['height'])->save(public_path().'/'.config('settings.theme').'/images/articles/'.$obj->micro, 100);
                
                if (is_string($article->img) && is_object(json_decode($article->img)) && (json_last_error() ==    JSON_ERROR_NONE)) {
                    $old_img = json_decode($article->img);
                    // dd($old_img);
                    foreach ($old_img as $pic) {
                        if (File::exists(config('settings.theme').'/images/articles/'.$pic)) {
                            File::delete(config('settings.theme').'/images/articles/'.$pic);
                        }
                    }
                }
                
				$data['img'] = json_encode($obj);  
			}
		}
		
		$article->fill($data); 
				
		if($article->update()) {
			return ['status' => trans('admin.material_updated')];
		} 

	}
    
    public function deleteArticle($article)
    {
		// $article->comments()->delete();
		$old_img = '';
        
        if (is_string($article->img) && is_object(json_decode($article->img)) && (json_last_error() ==    JSON_ERROR_NONE)) {
            $old_img = json_decode($article->img);
        }
        
		if($article->delete()) {
            if ($old_img) {              
                foreach ($old_img as $pic) {
                    if (File::exists(config('settings.theme').'/images/articles/'.$pic)) {
                        File::delete(config('settings.theme').'/images/articles/'.$pic);
                        }
                }
            }
            return ['status' => trans('admin.deleted')];
		}
		
	}
    
    public function selectArticles($request)
    {
        $data = $request->only('selection', 'param');
        
        switch ($data['selection']) {
            case 'unapproved':
                $res = $this->get(['id', 'title', 'description', 'alias', 'img', 'category_id', 'approved'],
                                    false,
                                    true,
                                    ['approved', false],
                                    ['created_at', 'desc']);
                return $res;
            case 'id':
                $data['param'] = (int)$data['param'];
                $res = $this->get(['id', 'title', 'description', 'alias', 'img', 'category_id', 'approved'],
                                    false,
                                    true,
                                    ['id', $data['param']],
                                    ['created_at', 'desc']);
                return $res;
            case 'author':
                if (empty($data['param'])) return false;
                $data['param'] = \Oshaman\Publication\User::select('id')->where('name', $data['param'])->firstOrFail()->id;
                $res = $this->get(['id', 'title', 'description', 'alias', 'img', 'category_id', 'approved'],
                                    false,
                                    true,
                                    ['user_id', $data['param']],
                                    ['created_at', 'desc']);
                return $res;
            case 'alias':
                $res = $this->get(['id', 'title', 'description', 'alias', 'img', 'category_id', 'approved'],
                                    false,
                                    true,
                                    ['alias', $data['param']],
                                    ['created_at', 'desc']);
                return $res;
            default:
                return false;
        }
        
       return false;
    }
	
}

?>