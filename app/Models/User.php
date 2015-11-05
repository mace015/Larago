<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	protected $table = 'users';

	protected $guarded = ['id'];

	protected $hidden = ['password', 'remember_token'];

	public function scopeActivated($query, $hash)
    {
        return $query->where('activation', '=', $hash);
    }

	public function snippets(){

		return $this->hasMany('\App\Models\Snippet', 'id_user');

	}

}
