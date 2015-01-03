<?php namespace Laracasts\Commander\Events;

use ReflectionClass;

class EventListener {

	public function handle($event)
	{
		$eventName = $this->getEventName($event);

		if($this->listenerIsRegistered($eventName))
		{
			return call_user_func([$this, 'when'.$eventName], $event);
		}
	}

	/**
	 * @param  $event [varname] [description]
	 * @return  string [description]
	 */

	protected function getEventName($event)
	{
		return (new ReflectionClass($event))->getShortName();
	}

	/**
	 * @param  method [varname] [description]
	 * @return  bool [description]
	 */
	
	protected function listenerIsRegistered($eventName)
	{

		$method = "when{$eventName}";

		return method_exists($this, $method);
	}
}

