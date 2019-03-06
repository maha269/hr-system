<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Status;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeeAttendance = Attendance::all();
        return view('index',compact('employeeAttendance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $status = Status::all();
        return view('create_attendance',compact('users','status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->day . $request->working_hours);
        $insert_attendance = Attendance::insert([
            'day'=>  $request->day,
            'working_hours'=>$request->working_hours,
            'user_id'=>$request->user_id,
            'status_id'=>$request->status_id,
            'created_at'=>now()
        ]);
        if(!$insert_attendance){
//            Flash::error('error saving attendance');
            return redirect(route('home'));
        }else{
//            Flash::success('Attendance created successfully.');
            return redirect(route('home'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        dd($id);
        $attendance = Attendance::find($id);
        $users = User::all();
        $status = Status::all();
        if(!$attendance){
            return Redirect::back()->withErrors(['msg', 'attendance not found']);
        }
        return view('edit_attendance',compact('attendance' ,'users','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
//        dd($request->id);
        $attendance = Attendance::find($request->id);
        if(!$attendance){
            return Redirect::back()->withErrors(['msg', 'attendance not found']);
        }
        $update_attendance= $attendance->update([
            'day'=>  $request->day,
            'working_hours'=>$request->working_hours,
            'user_id'=>$request->user_id,
            'status_id'=>$request->status_id,
            'updated_at'=>now()
        ]);
        if(!$update_attendance){
            return Redirect::back()->withErrors(['msg', 'Error saving changes']);
        }else{
            return redirect(route('home'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd($id);
        $attendance = Attendance::find($id);
        if(!$attendance){
//            Flash::error(' attendance not found');
            return Redirect::back()->withErrors(['msg', 'attendance not found']);

        }
        $delete = $attendance->delete();
        if(!$delete){
            return Redirect::back()->withErrors(['msg', 'Error deleting attendance']);
        }
        return redirect()->back()->with('success', ['your message,here']);
    }
    public function showUserAttendance($id)
    {
        //dd($id);
        $users = User::all();
       return view('show_attendance',compact('users'));
    }
    public function display_user_attendance(Request $request)
    {

        $attendance = Attendance::where(['user_id'=>$request->user_id,
            'day'=>$request->day])->with(['user'])->get();
        if(!$attendance){
            return Redirect::back()->withErrors(['msg', 'attendance not found']);
        }
        return view('single_attendance',compact('attendance'));
    }
    public function show_attendance_report()
    {
        $users = User::all();
        return view('show_attendance_report',compact('users'));
    }
    public function display_report(Request $request)
    {
        $attendance = Attendance::where('user_id', $request->user_id)->whereBetween('day', [$request->dayFrom, $request->dayTo])->with(['user'])->get();
        if(!$attendance){
            return Redirect::back()->withErrors(['msg', 'attendance not found']);
        }
        return view('attendance_report',compact('attendance'));
    }
}
