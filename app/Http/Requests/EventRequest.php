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
    	
    	$validator->sometimes('alias','unique:articles|max:246|alpha_dash', function($input) {
        	
        	if($this->route()->hasParameter('id')) {
				$model = $this->route()->parameter('id');
				return ($model->alias !== $input->alias)  && !empty($input->alias);
			}
        	
        	return !empty($input->alias);
        	
        });
        
        $validator->sometimes('keywords',array('string', 'max:255', 'regex:#^[a-zA-zа-яА-Яї0-9_\,\-\s!\']+$#u'), function($input) {
        	
        	return !empty($input->keywords);
        	
        });
        
        $validator->sometimes('meta_desc',array('string', 'max:255', 'regex:#^[a-zA-zа-яА-Яї0-9_\,\-\s!\']+$#u'), function($input) {
        	
        	return !empty($input->meta_desc);
        	
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
                'title' => 'string|required|max:255',
                'text' => 'string|required',
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
