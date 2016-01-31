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

	public function getAddSnippet(){

		return View::make('snippet.addSnippet');

	}

	public function postAddSnippet(AddSnippetRequest $request){

		return Processor::init('SnippetProcessor', array('next' => 'snippets'))->storeSnippet();

	}

	public function getEditSnippet($id){

		$snippet = Snippet::where('id_user', Auth::user()->id)->find($id);
		if ($snippet){
			return View::make('snippet.editSnippet', compact('snippet'));
		} else {
			return Redirect::route('home');
		}

	}

	public function postEditSnippet(AddSnippetRequest $request, $id){

		$snippet = Snippet::where('id_user', Auth::user()->id)->find($id);
		if ($snippet){
			$snippet->name = Input::get('name');
			$snippet->short_desc = Input::get('short_desc');
			$snippet->long_desc = Input::get('long_desc');
			$snippet->code = Input::get('code');
			$snippet->save();

			Session::flash('message', 'Your snippet has been edited!');
			Session::flash('type', 'notice');

			return Redirect::route('mysnippets');
		} else {
			return Redirect::route('home');
		}

	}

	public function getMySnippets(){

		$snippets = Auth::user()->snippets()->with('author', 'likes')->paginate(9);
		return View::make('snippet.mySnippets', compact('snippets'));

	}

	public function addComment(AddCommentRequest $request, $id){

		Comment::create(array(
			'id_snippet' => $id,
			'id_user' => Auth::user()->id,
			'comment' => Input::get('comment')
		));

		return Redirect::route('snippet', array($id));

	}

	public function editComment(){

		if (Auth::check()){
			$comment = Comment::where('id_user', Auth::user()->id)->find(Input::get('id'));
			if ($comment){
				$comment->comment = Input::get('comment');
				$comment->save();

				return 'true';
			}
		}

		return 'false';

	}

	public function deleteComment(){

		if (Auth::check()){
			$comment = Comment::where('id_user', Auth::user()->id)->find(Input::get('id'));
			if ($comment){
				$comment->delete();

				return 'true';
			}
		}

		return 'false';

	}

}
?>