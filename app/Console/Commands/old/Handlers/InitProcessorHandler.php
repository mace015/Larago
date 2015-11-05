<?php namespace App\Console\Commands\Handlers;

use Illuminate\Filesystem\Filesystem;

class InitProcessorHandler {

	protected $file;

	public function __construct(Filesystem $file){
		$this->file = $file;
	}

	public function initProcessor(){

		if (!$this->file->exists(app_path().'/Processors')){
			$this->file->makeDirectory(app_path().'/Processors');
		}

		if (!$this->file->exists(app_path().'/Processors/BaseProcessor.php')){
			$template = $this->getTemplate('BaseProcessor');
			$path = app_path().'/Processors/BaseProcessor.php';
			$this->file->put($path, $template);
		}

		if (!$this->file->exists(app_path().'/Processors/Processor.php')){
			$template = $this->getTemplate('Processor');
			$path = app_path().'/Processors/Processor.php';
			$this->file->put($path, $template);
		}

	}

	public function getTemplate($file){

		return $this->file->get(__DIR__.'/../Templates/'.$file.'.txt');

	}

}