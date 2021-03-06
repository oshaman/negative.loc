<?php

namespace Oshaman\Publication\Repositories;

use Oshaman\Publication\Event;
use Gate;
use Image;
use Config;
use File;

class EventsRepository extends Repository {
	
	
	public function __construct(Event $event)
    {
		$this->model = $event;
	}
    
    public function addEvent($request)
    {
        if (Gate::denies('create', $this->model)) {
			abort(404);
		}
        
        $data = $request->except('_token', 'img');
        
        if (empty($data)) {
			return array('error' => trans('admin.no_data'));
		}
        
        if (empty($data['alias'])) {
			$data['alias'] = $this->transliterate($data['title']);
		} else {
			$data['alias'] = $this->transliterate($data['alias']);
        }
        
		if ($this->one($data['alias'],FALSE)) {
			$request->merge(array('alias' => $data['alias']));
			$request->flash();
			
			return ['error' => trans('admin.alias_in_use')];
		}
        
        if (!empty($data['day']) && !empty($data['month'])) {
            $data['day'] = (int)($data['month']) . str_pad((int)$data['day'], 2, 0, STR_PAD_LEFT);
        } else {
            array_forget($data, 'day');
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
				
				$img->save(public_path().'/'.config('settings.theme').'/images/events/'.$obj->path, 100); 
				 
				$img->widen(Config::get('settings.events_img')['max']['width'])->save(public_path().'/'.config('settings.theme').'/images/events/'.$obj->max, 100); 
				
				$img->fit(Config::get('settings.events_img')['mini']['width'],
						Config::get('settings.events_img')['mini']['height'])->save(public_path().'/'.config('settings.theme').'/images/events/'.$obj->mini, 100);
                        
                $img->fit(Config::get('settings.events_img')['micro']['width'],
                        Config::get('settings.events_img')['micro']['height'])->save(public_path().'/'.config('settings.theme').'/images/events/'.$obj->micro, 100);
						
				
				$data['img'] = json_encode($obj);
			}
		}
        
        $this->model->fill($data);
        
        // dd($this->model);
        
        $id = $request->user()->events()->save($this->model)->id;
        if($id) {
            return ['status' => trans('admin.material_added'), 'id' => $id];
        }
    }
    
    public function updateEvent($request, $event)
    {
        if (Gate::denies('update', $event)) {
            abort(404);
        }
        
        $data = $request->except('_token', 'img');
        
        if (empty($data)) {
			return array('error' => trans('admin.no_data'));
		}
        
        if (empty($data['alias'])) {
			$data['alias'] = $this->transliterate($data['title']);
		} else {
			$data['alias'] = $this->transliterate($data['alias']);
        }
        
		$result = $this->one($data['alias'],FALSE);
		
		if(isset($result->id) && ($result->id != $event->id)) {
			$request->merge(array('alias' => $data['alias']));
			$request->flash();
			
			return ['error' => trans('admin.alias_in_use')];
		}
        
        if (!empty($data['day']) && !empty($data['month'])) {
            $data['day'] = (int)($data['month']) . str_pad((int)$data['day'], 2, 0, STR_PAD_LEFT);
        } else {
            array_forget($data, 'day');
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
				
				$img->save(public_path().'/'.config('settings.theme').'/images/events/'.$obj->path, 100); 
				 
				$img->widen(Config::get('settings.events_img')['max']['width'])->save(public_path().'/'.config('settings.theme').'/images/events/'.$obj->max, 100); 
				
				$img->fit(Config::get('settings.events_img')['mini']['width'],
						Config::get('settings.events_img')['mini']['height'])->save(public_path().'/'.config('settings.theme').'/images/events/'.$obj->mini, 100);
                        
                $img->fit(Config::get('settings.events_img')['micro']['width'],
                        Config::get('settings.events_img')['micro']['height'])->save(public_path().'/'.config('settings.theme').'/images/events/'.$obj->micro, 100);
						
				if (is_string($event->img) && is_object(json_decode($event->img)) && (json_last_error() ==    JSON_ERROR_NONE)) {
                    $old_img = json_decode($event->img);
                    // dd($old_img);
                    foreach ($old_img as $pic) {
                        if (File::exists(config('settings.theme').'/images/events/'.$pic)) {
                            File::delete(config('settings.theme').'/images/events/'.$pic);
                        }
                    }
                }
                
				$data['img'] = json_encode($obj);
			}
		}
        
        $event->fill($data); 
        
		if($event->update()) {
			return ['status' => trans('admin.material_updated')];
		}

    }
    
    public function deleteEvent($event)
    {
		$old_img = '';
        
        if (is_string($event->img) && is_object(json_decode($event->img)) && (json_last_error() == JSON_ERROR_NONE)) {
            $old_img = json_decode($event->img);
        }
        
		if($event->delete()) {
            if ($old_img) {                
                foreach ($old_img as $pic) {
                    if (File::exists(config('settings.theme').'/images/events/'.$pic)) {
                            File::delete(config('settings.theme').'/images/events/'.$pic);
                        }
                }
            }
            return ['status' => trans('admin.deleted')];
		}
		
	}
}