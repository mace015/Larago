<?php namespace App\Processors;

use App;

class BaseProcessor {

	static public function init($processor = '', $options = array()){

		if (empty($processor)){
			App::error('Processor is undefined!');
		}
		
		$processor = str_replace(' ', '', '\App\Processors\ ').$processor;

		return new $processor($options);

	}

}