<?php

namespace Oshaman\Publication\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->canDo('UPDATE_EVENTS');
    }

    protected function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();
    	
        $validator->sometimes('keywords',array('string', 'max:255', 'regex:#^[a-zA-zа-яА-Яї0-9_\,\-\s!\']+$#u'), function($input) {
        	
        	return !empty($input->keywords);
        	
        });
        
        $validator->sometimes('meta_desc',array('string', 'max:255', 'regex:#^[a-zA-zа-яА-Яї0-9_\,\-\s!\']+$#u'), function($input) {
        	
        	return !empty($input->meta_desc);
        	
        });
        
        $validator->sometimes('day',array('required', 'integer', 'between:1,31'), function($input) {
        	
        	return !(empty($input->day) && empty($input->month));
        	
        });
        
        $validator->sometimes('month',array('required', 'integer', 'between:1,12'), function($input) {
        	
        	return !(empty($input->day) && empty($input->month));
        	
        });
        
        return $validator;
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->isMethod('post')) {
            return [
                'title' => 'required|max:255',
                'text' => 'required',
                'alias' => 'unique:events|max:246|nullable|alpha_dash',
                'img' => 'image|max:5120',
            ];
        }
        
        return [
              //
              ];
    }
    
    /* public function messages()
    {
        return [
            'category_id.required' => 'Поле <strong>Категорія</strong> є обов\'язковим до заповнення.',
        ];
    } */
}
