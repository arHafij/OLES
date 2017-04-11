<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	public function users(){
		
		return $this->hasMany('App\Models\User');
	}

    public function getRoleIdBySlug( $slug ) {
    	
    	return DB::table('roles')->where('slug', $slug)->value('id');
    }

    public function getRoleBySlug( $slug ) {

        return DB::table('roles')->where('slug', $slug)->value('slug');
    }


    public function getRoleByAuthenticatedUser( $user ){

    	return $user->role->slug;
    }
}
