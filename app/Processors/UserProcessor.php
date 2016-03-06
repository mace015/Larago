<?php namespace App\Processors;

use \App\Processors\Processor as Processor;

use \App\Models\User as User;

use Input, Redirect, Session, Mail, URL, Hash, Auth;

class UserProcessor extends Processor {

	public function register(){

		Input::flashOnly('Email', 'Name', 'Country');

		$name = Input::get('Name');
		$hash = str_random(12);
		$activationUrl = URL::route('activate', $hash);

		$user = User::create(array(
			'email'	=> Input::get('Email'),
			'name' => Input::get('Name'),
			'country' => Input::get('Country'),
			'password' => Hash::make(Input::get('Password')),
			'activation' => $hash
		));

		Mail::send('emails.register', compact('name', 'activationUrl'), function($message)
		{
		    $message->to(Input::get('Email'), Input::get('Name'))->subject('Welcome to Larago.com!');
		});

		Session::flash('message', 'Registration has been succesfull! Check your inbox to verify your email!');
		Session::flash('type', 'notice');

		return $this->success();

	}

	public function activate($hash){

		$user = User::activated($hash)->first();

		if($user) {

			$user->activation = 'OK';
			$user->save();

			Session::flash('message', 'Activation has been succesfull! You can now login!');
			Session::flash('type', 'notice');

			return $this->success();

		} else {

			Session::flash('message', 'An error has occured while activating user!');
			Session::flash('type', 'error');

			return $this->fail(array('Activation error!'));

		}

	}

	public function login(){

		$remember_me = (Input::get('remember_me') == 'yes')? true : false ;

		//Make an login attempt
		$auth = Auth::attempt(array(
			'email' => Input::get('Email'),
			'password' => Input::get('Password')
		), $remember_me);

		if(!$auth){ return Redirect::back()->withErrors('You cannot login with these credentials!')->withInput(Input::all()); }

		//If user is not activated
		if(Auth::User()->activation != 'OK'){

			Auth::logout();
			$this->fail(array('Your account has not been activated yet!'));

		}

		Session::flash('message', 'Welcome back to larago!');
		Session::flash('type', 'notice');

		return $this->success();

	}

	public function updateProfile(){

		$user = Auth::user();
		$user->name = Input::get('Name');
		$user->country = Input::get('Country');
		$user->save();

		if (!empty(Input::get('Password')) && !empty(Input::get('RepeatPassword')) && Input::get('Password') == Input::get('RepeatPassword')){

			$user->password = Hash::make(Input::get('Password'));
			$user->save();
			Auth::logout();

			$this->options(array('next' => 'login'));
			return $this->success(array('Your password has been changed, for security reasons, you must login again!'));

		}

		Session::flash('message', 'Your profile details have been changed!');
		Session::flash('type', 'notice');

		return $this->success();

	}

}
