<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function getRoleIdBySlug( $slug ) {
    	return DB::table('roles')->where('slug',$slug)->value('id');
    }
}
