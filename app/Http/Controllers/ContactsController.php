<?php

namespace Oshaman\Publication\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Oshaman\Publication\Weather;

use Oshaman\Publication\Console\Commands\Currency;

class ContactsController extends MainController
{
    public function __construct()
    {    	
    	parent::__construct(new \Oshaman\Publication\Repositories\MenusRepository(new \Oshaman\Publication\Menu));
    	
    	$this->sidebar_vars = true;
		
	}
    
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
		    
			$this->validate($request, [
		        'name' => 'required|max:25',
		        'email' => 'required|email',
				'message' => 'required|max:1024'
		    ]);
			
			$data = $request->only(['name', 'email', 'message']);
			
            Mail::send('contacts.email', ['data' => $data], function ($m) use ($data) {
				$mail_admin = env('MAIL_ADMIN');
				
	            $m->from($data['email'], $data['name']);

	            $m->to($mail_admin, 'Mr. Admin')->subject('Question');
	        });
			
            if( count(Mail::failures()) === 0 ) {
                return redirect()->route('contacts')->with('status', 'message_sent');
            }
        }
        
        $weather = new Weather;
        
        dd(is_object($weather->renew()));
        
        $this->keywords = 'Contacts';
        $this->meta_desc = 'Contacts';
        $this->title = trans('ua.contacts');
        $this->template = 'contacts.index';
        
        $content = view('contacts.content')->with('content', $this->content_vars)->render();
		$this->vars = array_add($this->vars, 'content', $content);
        
        return $this->renderOutput();
    }
}
