<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use \App\Models\Like as Like;

use Auth;

class Snippet extends Model {

	protected $table = 'snippets';

	protected $protected = ['id_user'];

	public function likes(){

		return $this->hasMany('\App\Models\Like', 'id_snippet');

	}

	public function author(){

		return $this->belongsTo('\App\Models\User', 'id_user');

	}

	public function like(){

		if (Auth::check()){
			$like = Like::fetch($this->id, Auth::user()->id)->first();
			if ($like){
				$like->delete();
			} else {
				Like::create(array(
					'id_snippet' => $this->id,
					'id_user' => Auth::user()->id
				));
			}
			return true;
		}

	}

}
