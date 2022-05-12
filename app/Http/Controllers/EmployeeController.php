<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\SalaryInformation;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search = null;
        $employees = Employee::with(['department', 'designation', 'schedule'])->orderBy('id', 'asc');
        if ($request->has('search')){
            $sort_search = $request->search;
            $employees = $employees->where('employee_id_card', 'like', '%'.$sort_search.'%');
        }

        $employees = $employees->paginate(10);

        return view('employees.index', compact('employees', 'sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new Employee();

        $employee->employee_name = $request->employee_name;
        $employee->employee_id_card = $request->employee_id_card;
        $employee->status	 = $request->status;

        $employee->save();

        flash('Employee has been inserted successfully')->success();
        return redirect()->route('employees.index');
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
        $employee = Employee::with(['salary', 'education', 'bank', 'experience'])->findOrFail($id);

        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $employee->employee_name = $request->employee_name;
        $employee->employee_id_card = $request->employee_id_card;
        $employee->status	 = $request->status;

        $employee->save();

        flash('Employee has been updated successfully')->success();
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::find($id)->delete();
        flash('Employee has been deleted successfully')->success();

        return redirect()->route('employees.index');
    }
}
