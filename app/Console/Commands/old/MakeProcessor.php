<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use \App\Console\Commands\Handlers\MakeProcessorHandler;

class MakeProcessor extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'make:processor';

	protected $handler;

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new processor class';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(MakeProcessorHandler $handler)
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
		$name = $this->argument('name');
		$this->handler->makeProcessor($name);
		$this->info('Processor created successfully.');
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			['name', InputArgument::REQUIRED, 'Name of the processor class.'],
		];
	}

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
