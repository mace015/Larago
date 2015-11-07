<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use \App\Http\Requests\AddSnippetRequest;
use \App\Http\Requests\AddCommentRequest;

use Auth, View, URL, Redirect, Validator, Input, Session, Processor;

use \App\Models\Snippet as Snippet;
use \App\Models\Comment as Comment;

class SnippetController extends BaseController {

	public function getSnippets(){

		$snippets = Snippet::with('author', 'likes')->paginate(9);
		return View::make('snippet.list', compact('snippets'));

	}

	public function getSnippet($id){

		$snippet = Snippet::with('author', 'likes', 'comments')->find($id);
		if (!$snippet){
			return Redirect::route('snippets');
		}
		return View::make('snippet.snippet', compact('snippet'));

	}

	public function likeSnippet($id){

		$snippet = Snippet::find($id);
		if (!$snippet){
			return Redirect::route('snippets');
		}
		$snippet->like();
		return Redirect::route('snippet', array($snippet->id));

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

	public function addComment($id, AddCommentRequest $request){

		Comment::create(array(
			'id_snippet' => $id,
			'id_user' => Auth::user()->id,
			'comment' => Input::get('comment')
		));

		return Redirect::route('snippet', array($id));

	}

}
?>