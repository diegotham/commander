<?php namespace Laracasts\Commander;

use Illuminate\Foundation\Application;

class DefaultCommandBus implements CommandBus {

	/**
	 * @var  Application [description]
	 */

	private $app;

	/**
	 * @var   [description]
	 */

	protected $commandTranslator;

	/**
	 * @param  Application $app [varname] [description]
	 * @param  Command Translator $commandTranslator [varname] [description]
	 */

	function __construct(Application $app, CommandTranslator $commandTranslator)
	{
		$this->app = $app;
		$this->commandTranslator = $commandTranslator;
	}

	/**
	 * @param  $comand [varname] [description]
	 * @return  mixed [description]
	 */

	public function execute($command)
	{
		$handler = $this->commandTranslator->toCommandHandler($command);

		return $this->app->make($handler)->handle($command);
	}
}