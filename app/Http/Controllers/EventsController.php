<?php

namespace Oshaman\Publication\Http\Controllers;

use Illuminate\Http\Request;
use Oshaman\Publication\Repositories\EventsRepository;

class EventsController extends MainController
{
    protected $events_rep;
    
    public function __construct(EventsRepository $rep)
    {
        parent::__construct(new \Oshaman\Publication\Repositories\MenusRepository(new \Oshaman\Publication\Menu));
        $this->events_rep = $rep;
    }
    
    public function index($alias = FALSE)
    {
        $this->title = 'History';
        $this->meta_desc = 'This Day In History';
        $this->keywords = 'This Day In History';
        
        $this->template = 'events.index';
        
        $this->content_vars = $this->events_rep->get(
            ['title', 'desc', 'alias', 'img', 'user_id'],
                false, true, ['day', date("nd")], false);
        // dd($this->content_vars);
        
        $content = view('events.content')->with('content', $this->content_vars)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        
        
        return $this->renderOutput();
    }
    
    public function getEvents($alias = FALSE)
    {
        
    }
}
