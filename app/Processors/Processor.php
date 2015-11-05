<?php namespace App\Processors;

use Redirect;

class Processor {

	public $next = null;
	public $back = true;

	public function __construct($options){
		$this->options($options);
	}

	public function options($options){
		foreach ($options as $property => $option){
			if (property_exists($this, $property)){
				$this->{$property} = $option;
			}
		}
	}
	
	public function success($bag = null){

		$succesBag = $this->fillBag($bag);

		if (!is_null($this->next)){
			return Redirect::route( $this->next )->withSuccess($succesBag);
		} else {
			return true;
		}

	}

	public function fail($bag = null){

		$errorBag = $this->fillBag($bag);

		if (!is_null($this->back)){
			if (is_bool($this->back)){
				if ($this->back === true){
					return Redirect::back()->withErrors($errorBag);
				} else {
					return false;
				}
			} else {
				return Redirect::route($this->back)->withErrors($errorBag);
			}
		} else {
			return false;
		}

	}

	public function fillBag($bag){

		$messageBag = array();

		if (!is_null($bag)){
			if (is_array($bag)){
				foreach ($bag as $message){
					$messageBag[] = $message;
				}
			} else {
				$messageBag[] = $bag;
			}
		}

		return $messageBag;

	}

}