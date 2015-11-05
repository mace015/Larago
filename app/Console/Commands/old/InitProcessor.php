<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use \App\Console\Commands\Handlers\InitProcessorHandler;

class InitProcessor extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'processor:init';

	protected $handler;

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create the folder and parent classes for the processor layer';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(InitProcessorHandler $handler)
	{
		parent::__construct();
		$this->handler = $handler;
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$this->handler->initProcessor();
		$this->info('Processor layer has been initialized.');
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	/*protected function getArguments()
	{
		return [
			['example', InputArgument::REQUIRED, 'An example argument.'],
		];
	}*/

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	/*protected function getOptions()
	{
		return [
			['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
		];
	}*/

}
