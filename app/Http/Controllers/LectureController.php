<?php

namespace App\Http\Controllers;

use App\File;
use App\Group;
use App\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $groups = Group::all();
        return view('admin.lectures.create', [
            'groups' => $groups,
        ]);
    }


    public function store(Request $request){


        $lecture = new Lecture();
        $lecture->name = $request->name;
        $lecture->description = $request->description;
        $lecture->lecture_date = $request->lecture_date;
        $lecture->group_id = $request->group_id;
        $lecture->save();

        if($request->hasFile('files')){
            foreach ($request->file('files') as $file){
                $path = $file->store("/public");
                $lecture_file = new File();
                $lecture_file->file = $path;
                $lecture_file->name = $file->getClientOriginalName();
                $lecture_file->lecture_id = $lecture->id;
                $lecture_file->save();
            }

        }
        return redirect()->route('groups.show', $lecture->group_id);

    }

    public function edit(Lecture $lecture){

        $groups = Group::all();

        return view('admin.lectures.edit', [
            'lecture' => $lecture,
            'groups' => $groups,
            ] );
    }

    public function update(Request $request, Lecture $lecture){

        $lecture->name = $request->name;
        $lecture->description = $request->description;
        $lecture->lecture_date = $request->lecture_date;
        $lecture->group_id = $request->group_id;
        $lecture->save();

        if($request->hasFile('files')){
            foreach ($request->file('files') as $file){
                $path = $file->storeAs("/public", $file->getClientOriginalName());
                $lecture_file = new File();
                $lecture_file->file = $path;
                $lecture_file->name = $file->getClientOriginalName();
                $lecture_file->lecture_id = $lecture->id;
                $lecture_file->save();
            }

        }

        return redirect()->route('groups.show', $lecture->group_id);

    }

    /**
     * @param Lecture $lecture
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Lecture $lecture){
        $group = $lecture->group_id;
        $lecture->delete();
         return redirect()->route('groups.show', $group) ;
    }
}
