<?php

namespace App\Http\Controllers;

use App\Course;
use App\Group;
use App\User;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $user = \Auth::user();
        if($user->isAdmin()){
            $groups = Group::with(['course', 'teacher'])->get()->sortBy('begin_date');
            return view('admin.groups.index', ['groups' => $groups]);
        } else {
            $groups = $user->groups()->get();
            return view('groups.index', ['groups' => $groups]);
        }

    }

    public function show(Group $group){
        $user = \Auth::user();
        $students = $group->students()->get();
        $lectures = $group->lectures()->with('files')->orderBy('lecture_date')->get();
        if($user->isAdmin()){
            return view('admin.groups.show', [
                'group' => $group,
                'students' => $students,
                'lectures' => $lectures,
            ]);
        }else {
            return view('groups.show', [
                'group' => $group,
                'lectures' => $lectures,

            ]);
        }

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $courses = Course::all();
        $teachers = \DB::table('users')->where('type', '=', '1')->get();
        return view('admin.groups.create', [
            'courses' => $courses,
            'teachers' => $teachers,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'course_id' => 'required',
            'teacher_id' => 'required',
            'begin_date' => 'required',
            'end_date' => 'required',
        ],
            [
                'required' => 'Laukas privalomas'
            ]);

        $group = new Group();

        $group->name = $request->name;
        $group->course_id = $request->course_id;
        $group->teacher_id = $request->teacher_id;
        $group->begin_date = $request->begin_date;
        $group->end_date = $request->end_date;
        $group->save();

        return redirect()->route('groups');

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Group $group){
        $courses = Course::all();
        $teachers = \DB::table('users')->where('type', '=', '1')->get();
        return view('admin.groups.edit', [
            'courses' => $courses,
            'teachers' => $teachers,
            'group' => $group,
        ]);
    }


    /**
     * @param Request $request
     * @param Group $group
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Group $group){
        $this->validate($request, [
            'name' => 'required',
            'course_id' => 'required',
            'teacher_id' => 'required',
            'begin_date' => 'required',
            'end_date' => 'required',
        ],
            [
                'required' => 'Laukas privalomas'
            ]);

        $group->name = $request->name;
        $group->course_id = $request->course_id;
        $group->teacher_id = $request->teacher_id;
        $group->begin_date = $request->begin_date;
        $group->end_date = $request->end_date;
        $group->save();

        return redirect()->route('groups');

    }

    /**
     * @param Group $group
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Group $group){
        $group->delete();
        return redirect()->route('groups');
    }
}
