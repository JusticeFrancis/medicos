<?php

namespace Modules\Education\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Education\Entities\Course;

class CourseController extends Controller
{
    
    public function index(Request $request, $id = null, $action = null)
    {
                /* get all courses */
                $courses = Course::all();
                return response(['courses'=> $courses]);

    }
    
    public function store(Request $request)
    {
        /* store course */

        $validated = $request->validate([
            'name' => 'required|string',
        ]);
        $name = $validated['name'];


        $courses = Course::where('name',$name)->get();
            if ($courses->count() == 0) {
                $course = new Course();
                $course->name = $name;
                $course->save();
            }
            else {
                return response()->json(['message' => 'Course with name already exist']);
            }
            return response()->json(['course'=> $course,'message'=>'course saved successfully']);
    }


    public function show($id)
    {
        $course = Course::find($id);
        if (!$course) {
            return response(['message'=> 'course not found']);
        }
        return response(['course'=> $course]);
    }

    

    
    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'name' => 'required|string',
        ]);
        $name = $validated['name'];

        $course = Course::find($id);
        if (!$course) {
            return response(['message'=> 'course not found']);
        }
        $course->name = $name;
        $course->save();
        return response()->json(['course'=> $course, 'message' => 'course name updated']);
    }

    
    public function destroy($id)
    {
        $course = Course::find($id);
        if (!$course) {
            return response(['message'=> 'course not found']);
        }
        $course->delete();
        return response()->json(['course'=> $course, 'message' => 'course deleted']);
    }
}
