<?php

namespace App\Http\Controllers;

use App\Models\EmployeeLeave;
use Illuminate\Http\Request;

class EmployeeLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search = null;
        $employee_leaves = EmployeeLeave::orderBy('id', 'asc');
        if ($request->has('search')){
            $sort_search = $request->search;
            $employee_leaves = $employee_leaves->where('employee_id', 'like', '%'.$sort_search.'%');
        }
        $employee_leaves = $employee_leaves->paginate(10);
        return view('hr_management.employee_leave.index', compact('employee_leaves', 'sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hr_management.employee_leave.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee_leave = new EmployeeLeave;

        $employee_leave->department_name = $request->department_name;
        $employee_leave->status	 = $request->status;

        $employee_leave->save();

        flash('Employee leave has been inserted successfully')->success();
        return redirect()->route('employee_leaves.index');
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
        $employee_leave = EmployeeLeave::findOrFail($id);

        return view('hr_management.employee_leave.edit', compact('department'));
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
        $employee_leave = EmployeeLeave::findOrFail($id);

        $employee_leave->department_name = $request->department_name;
        $employee_leave->status	 = $request->status;

        $employee_leave->save();

        flash('Employee leave has been updated successfully')->success();
        return redirect()->route('employee_leaves.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EmployeeLeave::find($id)->delete();
        flash('Employee leave has been deleted successfully')->success();

        return redirect()->route('employee_leaves.index');
    }
}
