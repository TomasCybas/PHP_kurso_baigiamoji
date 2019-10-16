<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        $students = User::all()->where('type', '=', 0);
        $groups = Group::all();
        return view('admin.students.index', ['students' => $students, 'groups' => $groups]);
    }

    public function edit(User $user){
        return view('edit_user', ['user' => $user]);
    }

    public function update(Request $request, User $user){
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', "unique:users,email,$user->id"],
            'phone_number' => ['max:12'],
            'type' => ['integer', 'max:11'],
        ],
            [
                'required' => 'Laukas privalomas',
                'unique' => 'Vartotojas su tokiu el. pašto adresu jau egzistuoja'
            ]);
        $user->fill($request->all());
        $user->save();

        return redirect()->route('groups');
    }
}
