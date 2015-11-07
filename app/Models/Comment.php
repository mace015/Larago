<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

	protected $table = 'comments';

	protected $guarded = array('id');

	public function author(){

		return $this->belongsTo('\App\Models\User', 'id_user');

	}

}
