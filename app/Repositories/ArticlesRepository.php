<?php

namespace Oshaman\Publication\Repositories;

use Oshaman\Publication\Article;
use Gate;

use Image;
use Config;

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
		}
        
		if ($this->one($data['alias'],FALSE)) {
			$request->merge(array('alias' => $data['alias']));
			$request->flash();
			
			return ['error' => trans('admin.alias_in_use')];
		}
        
        if (!empty($data['delay'])) {
            $data['created_at'] = date("Y-m-d H:i:s", time()+$data['delay']*60);
        }
        
        if (empty($data['source'])) {
            $data['source'] = 'www.' . config('app.name');
        }
        
        if (empty($data['keywords'])) {
            $data['keywords'] = $data['title'];
        }
        
        if (empty($data['meta_desc'])) {
            $data['meta_desc'] = $data['title'];
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
				
				$str = str_limit($data['alias'], 56) . '-' . time();
				// dd($str);
				$obj = new \stdClass;
				
				$obj->mini = $str.'_mini.jpg';
				$obj->max = $str.'_max.jpg';
				$obj->path = $str.'.jpg';
                
				$img = Image::make($image);
				
				$img->fit(Config::get('settings.image')['width'],
						Config::get('settings.image')['height'])->save(public_path().'/'.config('settings.theme').'/images/articles/'.$obj->path); 
				
				$img->fit(Config::get('settings.articles_img')['max']['width'],
						Config::get('settings.articles_img')['max']['height'])->save(public_path().'/'.config('settings.theme').'/images/articles/'.$obj->max); 
				
				$img->fit(Config::get('settings.articles_img')['mini']['width'],
						Config::get('settings.articles_img')['mini']['height'])->save(public_path().'/'.config('settings.theme').'/images/articles/'.$obj->mini); 
						
				
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
    
    
	/* public function updateArticle($request, $article) {

		if(Gate::denies('edit', $this->model)) {
			abort(403);
		}
		
		$data = $request->except('_token','image','_method');
		
		if(empty($data)) {
			return array('error' => 'Нет данных');
		}
		
		if(empty($data['alias'])) {
			$data['alias'] = $this->transliterate($data['title']);
		}
		
		$result = $this->one($data['alias'],FALSE);
		
		if(isset($result->id) && ($result->id != $article->id)) {
			$request->merge(array('alias' => $data['alias']));
			$request->flash();
			
			return ['error' => 'Данный псевдоним уже успользуется'];
		}
		
		if($request->hasFile('image')) {
			$image = $request->file('image');
			
			if($image->isValid()) {
				
				$str = str_random(16);
				
				$obj = new \stdClass;
				
				$obj->mini = $str.'_mini.jpg';
				$obj->max = $str.'_max.jpg';
				$obj->path = $str.'.jpg';
				
				$img = Image::make($image);
				
				$img->fit(Config::get('settings.image')['width'],
						Config::get('settings.image')['height'])->save(public_path().'/'.config('settings.theme').'/images/articles/'.$obj->path); 
				
				$img->fit(Config::get('settings.articles_img')['max']['width'],
						Config::get('settings.articles_img')['max']['height'])->save(public_path().'/'.config('settings.theme').'/images/articles/'.$obj->max); 
				
				$img->fit(Config::get('settings.articles_img')['mini']['width'],
						Config::get('settings.articles_img')['mini']['height'])->save(public_path().'/'.config('settings.theme').'/images/articles/'.$obj->mini); 

				$data['img'] = json_encode($obj);  
							
			}	
		}
		
		$article->fill($data); 
				
		if($article->update()) {
			return ['status' => 'Материал обновлен'];
		} 

	}
    
    public function deleteArticle($article) {
		
		if(Gate::denies('destroy', $article)) {
			abort(403);
		}
		
		$article->comments()->delete();
		
		if($article->delete()) {
			return ['status' => 'Материал удален'];
		}
		
	} */
	
}

?>