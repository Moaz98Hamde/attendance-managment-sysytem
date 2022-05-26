<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = Attendance::orderBy('created_at', 'DESC')->get();
        return view('dashboard.attendance.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.attendance.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAttendanceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttendanceRequest $request)
    {
        $employee = Employee::where('PIN', $request->PIN)->first();


        $attendedToday = Attendance::whereDate('created_at', Carbon::today())
            ->where('employee_id', $employee->id)->first();

        if ($attendedToday) {
            return redirect(route('attendance.create'))->with('error', _('Attendance already submitted'));
        }

        DB::transaction(function () use ($employee) {
            $newRecord = $employee->attendances()->save(new Attendance());
            $employee->refresh();
            if (!$employee || !$newRecord) {
                throw new \Exception('Error ocurred!', 500);
            }
        });


        return response()->view('web.attendance.redirect')->header("Refresh", "5;url=" . route('attendance.create'));;
    }
}