<?php

namespace Oshaman\Publication\Repositories;

use Oshaman\Publication\Event;
use Gate;

class EventsRepository extends Repository {
	
	
	public function __construct(Event $event) {
		$this->model = $event;
	}
    
}