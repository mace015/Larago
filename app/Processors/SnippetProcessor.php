<?php namespace App\Processors;

use \App\Processors\Processor as Processor;

use \App\Models\User as User;
use \App\Models\Snippet as Snippet;

use Input, Redirect, Session, Mail, URL, Hash, Auth;

class SnippetProcessor extends Processor {

	public function storeSnippet(){

		$snippet = new Snippet;
		$snippet->name = Input::get('name');
		$snippet->id_user = Auth::user()->id;
		$snippet->short_desc = Input::get('short_desc');
		$snippet->long_desc = Input::get('long_desc');
		$snippet->code = Input::get('code');
		$snippet->save();

		Session::flash('message', 'Your snippet has been added!');
		Session::flash('type', 'notice');

		return $this->success();

	}

}