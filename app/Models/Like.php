<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model {

	protected $table = 'snippets_likes';

	public function scopeFetch($query, $id_snippet, $id_user){

		return $query
			->where('id_snippet', '=', $id_snippet)
			->where('id_user', '=', $id_user);

	}

}
