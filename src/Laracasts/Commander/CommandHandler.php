<?php namespace Laracasts\Commander;

interface CommandHandler {

	/**
	 * Handle the command
	 *
	 * @param  $command [varname] [description]
	 * @return  mixed [description]
	 */

	public function handle($command);
}