<?php

namespace App\Http\Controllers;

use App\Models\SalaryIncrement;
use Illuminate\Http\Request;

class SalaryIncrementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search = null;
        $salary_increments = SalaryIncrement::orderBy('id', 'asc');
        if ($request->has('search')){
            $sort_search = $request->search;
            $salary_increments = $salary_increments->where('employee_id', 'like', '%'.$sort_search.'%');
        }
        $salary_increments = $salary_increments->paginate(10);
        return view('hr_management.salary_increment.index', compact('salary_increments', 'sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hr_management.salary_increment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $salary_increment = new SalaryIncrement;

        $salary_increment->employee_id = $request->employee_id;
        $salary_increment->gross_salary = $request->gross_salary;
        $salary_increment->basic_salary = $request->basic_salary;
        $salary_increment->house_rent = $request->house_rent;
        $salary_increment->medical_allowance = $request->medical_allowance;
        $salary_increment->transport_allowance = $request->transport_allowance;
        $salary_increment->food_allowance = $request->food_allowance;
        $salary_increment->increment_month = $request->increment_month;
        $salary_increment->increment_year = $request->increment_year;
        $salary_increment->effective_date = $request->effective_date;
        $salary_increment->remarks	 = $request->remarks;
        $salary_increment->status	 = $request->status;

        $salary_increment->save();

        flash('Salary increment has been inserted successfully')->success();
        return redirect()->route('salary_increments.index');
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
        $department = SalaryIncrement::findOrFail($id);

        return view('hr_management.salary_increment.edit', compact('department'));
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
        $salary_increment = SalaryIncrement::findOrFail($id);

        $salary_increment->employee_id = $request->employee_id;
        $salary_increment->gross_salary = $request->gross_salary;
        $salary_increment->basic_salary = $request->basic_salary;
        $salary_increment->house_rent = $request->house_rent;
        $salary_increment->medical_allowance = $request->medical_allowance;
        $salary_increment->transport_allowance = $request->transport_allowance;
        $salary_increment->food_allowance = $request->food_allowance;
        $salary_increment->increment_month = $request->increment_month;
        $salary_increment->increment_year = $request->increment_year;
        $salary_increment->effective_date = $request->effective_date;
        $salary_increment->remarks	 = $request->remarks;
        $salary_increment->status	 = $request->status;

        $salary_increment->save();

        flash('Salary increment has been updated successfully')->success();
        return redirect()->route('salary_increments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SalaryIncrement::find($id)->delete();
        flash('Salary increment has been deleted successfully')->success();

        return redirect()->route('salary_increments.index');
    }
}