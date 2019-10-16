<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupUsersController extends Controller
{
    public function store(Request $request){

        $group_id = $request->group_id;
        $students = $request->user_id;

        foreach ($students as $student){
            \DB::table('group_users')->insert(['group_id' => $group_id, 'user_id' => $student]);
        }
        return redirect()->route('students');
    }
}
