<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('dashboard.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        // Overwrite password with hashed value
        $validatedData = $request->merge([
            'password' => Hash::make($request->password)
        ]);
        // Persisting data
        DB::transaction(function () use ($validatedData) {
            $employee = Employee::create($validatedData->all());
            if (!$employee) {
                throw new \Exception('Error ocurred!', 500);
            }
        });

        return redirect(route('employee.index'))->with('msg', _('Employee Added successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('dashboard.employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('dashboard.employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeRequest  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        // In case the password was changed
        $validatedData = $request->password ?
            $request->merge(['password' => Hash::make($request->password)])->all()
            :
            $request->except('password');

        DB::transaction(
            function () use ($validatedData, $employee) {
                if (!$employee->update($validatedData)) {
                    throw new \Exception('Error ocurred!', 500);;
                }
            }
        );
        return redirect(route('employee.index'))->with('msg', _('Employee Edited successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        DB::transaction(
            function () use ($employee) {
                if (!$employee->delete()) {
                    throw new \Exception('Error ocurred!', 500);;
                }
            }
        );
        return redirect(route('employee.index'))->with('msg', _('Employee Deleted successfully'));
    }
}