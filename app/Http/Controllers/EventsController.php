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
        if ($alias) {
            $this->content_vars = $this->events_rep->one($alias);
            $this->title = $this->content_vars->title;
            $this->meta_desc = $this->content_vars->meta_desc;
            $this->keywords = $this->content_vars->keywords;
            
            $this->content_vars->events = $this->events_rep->get(
                ['title', 'alias', 'img'], 7, false, ['day', date("nd")], false);
            // dd($this->content_vars->events);
            $content = view('events.content_one')->with('content', $this->content_vars)->render();
            $this->vars = array_add($this->vars, 'content', $content);
        } else {
            
            $this->title = 'History';
            $this->meta_desc = 'This Day In History';
            $this->keywords = 'This Day In History';
            
            
            $this->content_vars = $this->events_rep->get(
            ['title', 'desc', 'alias', 'img', 'user_id'],
                false, true, ['day', date("nd")], false);
            $content = view('events.content')->with('content', $this->content_vars)->render();
            $this->vars = array_add($this->vars, 'content', $content);
        }
        
        $this->template = 'events.index';
        return $this->renderOutput();
    }
}
