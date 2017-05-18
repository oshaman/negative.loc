<?php

namespace Oshaman\Publication\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Oshaman\Publication\Http\Requests\EventRequest;

use Oshaman\Publication\Http\Controllers\Controller;
use Oshaman\Publication\Http\Controllers\Admin\AdminController;

use Oshaman\Publication\Repositories\EventsRepository;

use Gate;

class EventsController extends AdminController
{
    protected $e_rep;
    
    public function __construct(EventsRepository $rep)
    {
        $this->e_rep = $rep;
    }
    
    
    
    public function index(Request $request)
    {
        if (Gate::denies('UPDATE_EVENTS')) {
            abort(404);
        }
        
        $this->title = trans('admin.events_manager');
        $day = date("nd");
        
        if ($request->isMethod('post')) {
            
            $rules = [
                'day' => 'integer|between:1,31',
                'month' => 'integer|between:1,12',
            ];
            $this->validate($request, $rules);
            
            
            $day = $request->month . str_pad($request->day, 2, 0, STR_PAD_LEFT);
        }
         
        
        $events = $this->e_rep->get(['id', 'title', 'description', 'img', 'alias'], false, true, ['day', $day], false);
        
        $this->content = view('admin.events.content')->with(['events' => $events, 'day' => $day])->render();
        
        return $this->renderOutput();
    }
    
    public function create()
    {
        dd('create');
    }
    
    public function edit()
    {
        dd('edit');
    }

    public function del()
    {
        dd('del');
    }
}
