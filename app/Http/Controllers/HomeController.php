<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use View;

class HomeController extends BaseController {

	public function getIndex(){

		return View::make('index');
		
	}

}
