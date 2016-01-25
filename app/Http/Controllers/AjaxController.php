<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use \App\Models\Snippet as Snippet;

use Auth, Input, Redirect, View;

class AjaxController extends Controller {

	public function postLikeSnippet(){

		$id = Input::get('id');

		if (Auth::check()){

			$snippet = Snippet::find($id);
			if (!$snippet){
				return Redirect::route('snippets');
			}
			$like = $snippet->like();
			return $like;

		}

	}

	public function postGetSnippets(){

		$search = Input::get('search');

		$snippets = Snippet::with('author', 'likes')->where(function($query) use ($search){
			return $query
				->where('name', 'like', '%'.$search.'%')
				->orWhere('short_desc', 'like', '%'.$search.'%')
				->orWhere('long_desc', 'like', '%'.$search.'%')
				->orWhere('code', 'like', '%'.$search.'%');
		})->get();

		$snippets = $snippets->all();

		return View::make('ajax.snippets', compact('snippets'));

	}

}
