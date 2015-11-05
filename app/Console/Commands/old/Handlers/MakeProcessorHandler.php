<?php namespace App\Console\Commands\Handlers;

use Illuminate\Filesystem\Filesystem;

class MakeProcessorHandler {

	protected $file;

	public function __construct(Filesystem $file){
		$this->file = $file;
	}

	public function makeProcessor($name){

		$name = ucwords($name);
		$path = app_path().'/Processors/'.$name.'.php';
		$template = $this->getTemplate($name);
		$this->file->put($path, $template);

	}

	public function getTemplate($name){

		return str_replace('{{PROCESSOR_NAME}}', $name, $this->file->get(__DIR__.'/../Templates/CustomProcessor.txt'));

	}

}