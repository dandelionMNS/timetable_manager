<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Course;
use App\Models\Day;
use App\Models\Schedule;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        return view("admin.schedule", compact("schedules"));
    }

    public function tableCourse($c_id)
    {
        DB::enableQueryLog();
        $schedules = Schedule::where('course_id', $c_id)->get();
        $course = Course::findOrFail($c_id);
        $queries = DB::getQueryLog();

        return view("table.course", compact("schedules", 'course'));
    }

    public function tableCourseAddPage($c_id)
    {
        $schedules = Schedule::where('course_id', $c_id)->get();
        $course = Course::findOrFail($c_id);

        return view("admin.scheduleAdd", compact("schedules", 'course'));
    } 

    public function tableTeacher($u_id)
    {
        $schedules = Schedule::where('user_id', $u_id);
        return view("admin.schedule", compact("schedules"));
    }

    public function scheduleAddPage()
    {

        $courses = Course::orderBy('code', 'asc')->get();
        $subjects = Subject::orderBy('code', 'asc')->get();
        $instructors = User::where("user_type", "teacher")->get();
        $locations = Classroom::orderBy('name', 'asc')->get();
        $days = Day::all();

        return view("admin.scheduleAdd", compact("courses", "subjects", "instructors", "locations", "days"));
    }


    public function scheduleUpdatePage($id)
    {

        $courses = Course::orderBy('code', 'asc')->get();
        $subjects = Subject::orderBy('code', 'asc')->get();
        $instructors = User::where("user_type", "teacher")->get();
        $locations = Classroom::orderBy('name', 'asc')->get();
        $days = Day::all();
        $schedule = Schedule::findOrFail($id);

        return view("admin.scheduleUpdate", compact("courses", "subjects", "instructors", "locations", "days", "schedule"));
    }

    public function scheduleAdd(Request $request)
    {

        $schedule = new Schedule();
        $schedule->course_id = $request->input("course_id");
        $schedule->subject_id = $request->input("subject_id");
        $schedule->instructor_id = $request->input("instructor_id");
        $schedule->location_id = $request->input("location_id");
        $schedule->day_id = $request->input("day_id");
        $schedule->start = $request->input("start");
        $schedule->end = $request->input("end");
        $schedule->save();

        return redirect()->route('schedule.index');
    }

    public function scheduleUpdate(Request $request, $id)
    {
        $schedule = Schedule::find($id);
        $schedule->course_id = $request->input("course_id");
        $schedule->subject_id = $request->input("subject_id");
        $schedule->instructor_id = $request->input("instructor_id");
        $schedule->location_id = $request->input("location_id");
        $schedule->day_id = $request->input("day_id");
        $schedule->start = $request->input("start");
        $schedule->end = $request->input("end");
        $schedule->save();

        return redirect()->route('schedule.index');
    }
    public function scheduleDelete($id)
    {

        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return redirect()->route('schedule.index');
    }

    public function scheduleDeletefromCourse($s_id, $id)
    {

        $schedule = Schedule::findOrFail($s_id);
        $schedule->delete(); 

        return redirect()->route('schedule.tableCourse', ['c_id' => $id]);
    }

}
