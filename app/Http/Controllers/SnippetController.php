<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use \App\Http\Requests\AddSnippetRequest as AddSnippetRequest;

use Auth, View, URL, Redirect, Validator, Input, Session, Processor;

use \App\Models\Snippet as Snippet;

class SnippetController extends BaseController {

	public function getSnippets(){

		$snippets = Snippet::with('author', 'likes')->paginate(9);
		return View::make('snippet.list', compact('snippets'));

	}

	public function getSnippet($id){

		$snippet = Snippet::findOrFail($id);
		return View::make('snippet.snippet', compact('snippet'));

	}

	public function getAddSnippet(){

		return View::make('snippet.addSnippet');

	}

	public function postAddSnippet(AddSnippetRequest $request){

		return Processor::init('SnippetProcessor', array('next' => 'snippets'))->storeSnippet();

	}

	public function getMySnippets(){

		$snippets = Auth::user()->snippets()->with('author', 'likes')->paginate(9);
		return View::make('snippet.mySnippets', compact('snippets'));

	}

}
?>