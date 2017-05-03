<?php

namespace Oshaman\Publication\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->canDo('ADD_ARTICLES');
    }

    protected function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();
    	
        // $model = $this->route()->parameter('article');
    	// dd($model);
    	
    	$validator->sometimes('alias','unique:articles|max:255', function($input) {
        	
        	
        	if($this->route()->hasParameter('article')) {
				$model = $this->route()->parameter('article');
				
				return ($model->alias !== $input->alias)  && !empty($input->alias);
			}
        	
        	return !empty($input->alias);
        	
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
                'category_id' => 'required|integer'
            ];
        }
        
        return [
              //
              ];
    }
}
