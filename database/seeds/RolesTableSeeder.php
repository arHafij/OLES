<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'title'=>'admin',
            'slug'=>'admin',
        ]);
        DB::table('roles')->insert([
            'title'=>'teacher',
            'slug'=>'teacher',
        ]);
        DB::table('roles')->insert([
            'title'=>'student',
            'slug'=>'student',
        ]);
    }
}
