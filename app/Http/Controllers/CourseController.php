<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index',
            [
                'courses' => $courses
            ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('admin.courses.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ],
            [
                'required' => 'Laukas privalomas'
            ]);
        $course = new Course();
        $course->name = $request->name;
        $course->description = $request->description;
        $course->save();
        return redirect()->route('courses');

    }

    /**
     * @param Course $course
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Course $course){

        return view('admin.courses.edit', ['course' => $course]);
    }

    /**
     * @param Request $request
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Course $course){
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ],
            [
                'required' => 'Laukas privalomas'
            ]);
        $course->name = $request->name;
        $course->description = $request->description;
        $course->save();

        return redirect()->route('courses');

    }

    /**
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Course $course){
        $course->delete();
        return redirect()->route('courses');
    }
}
