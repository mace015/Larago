<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\MeRequest;

use View, Auth, Redirect, Processor;

class UserController extends BaseController {

	public function getMe(){

		return View::make('user.myProfile');

	}

	public function postMe(MeRequest $request){

		return Processor::init('UserProcessor', array('next' => 'me'))->updateProfile();

	}


	public function getLogin(){

		return View::make('user.login');

	}

	public function postLogin(LoginRequest $request){

		return Processor::init('UserProcessor', array('next' => 'home'))->login();

	}

	public function getRegister(){

		return View::make('user.register');

	}

	public function postRegister(RegisterRequest $request){

		return Processor::init('UserProcessor', array('next' => 'home'))->register();

	}

	public function getActivation($hash){

		return Processor::init('UserProcessor', array('next' => 'login', 'back' => 'home'))->activate($hash);

	}

	public function logout(){

		Auth::logout();
		return Redirect::route('home');

	}

}
?>