<?php

namespace Oshaman\Publication\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Oshaman\Publication\Http\Requests\EventRequest;

use Oshaman\Publication\Http\Controllers\Controller;
use Oshaman\Publication\Http\Controllers\Admin\AdminController;

use Oshaman\Publication\Repositories\EventsRepository;
use Oshaman\Publication\Event;

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
        $day = session('d') ? : date("nd");
        
        if ($request->isMethod('post')) {
            
            $rules = [
                'day' => 'integer|between:1,31',
                'month' => 'integer|between:1,12',
            ];
            $this->validate($request, $rules);
            
            $request->flashOnly(['month', 'day']);
            $day = $request->month . str_pad($request->day, 2, 0, STR_PAD_LEFT);
            session(['d' => $day]);
        }
         
        
        $events = $this->e_rep->get(['id', 'title', 'description', 'img', 'alias'], false, true, ['day', $day], false);
        
        $this->content = view('admin.events.content')->with(['events' => $events, 'day' => $day])->render();
        
        return $this->renderOutput();
    }
    
    public function create(EventRequest $request)
    {
        if (Gate::denies('create', new Event)) {
            abort(404);
        }
        /**
        * Store a newly created resource in storage.
        *
        */
        if ($request->isMethod('post')) {
            $result = $this->e_rep->addEvent($request);
		
            if(is_array($result) && !empty($result['error'])) {
                return back()->with($result);
            }
            
            return redirect('/admin/events/edit/'. $result['id'])->with($result);
        }
        
        /**
        * Show the form for creating a new resource.
        *
        */
        $this->title = trans('admin.add');
        $this->content = view('admin.events.add_content')->render();
        
        return $this->renderOutput();
    }
    
    public function edit(EventRequest $request, Event $event)
    {
        if ($request->isMethod('post')) {
            $result = $this->e_rep->updateEvent($request, $event);
            
            if(is_array($result) && !empty($result['error'])) {
                return back()->with($result);
            }
            
            return redirect('/admin/events')->with($result);
        }
        
        if (Gate::denies('update', $event)) {
			abort(404);
		}
        
        $this->title = trans('admin.edit');
        
        if($event) {
			$event->img = json_decode($event->img);
		}
        
        $this->content = view('admin.events.edit_content')->with('event', $event)->render();
        return $this->renderOutput();
    }

    public function del(Event $event)
    {
        if (Gate::denies('delete', $event)) {
            abort(404);
        }
        
        $result = $this->e_rep->deleteEvent($event);
		
        return back()->with($result);
    }
}
