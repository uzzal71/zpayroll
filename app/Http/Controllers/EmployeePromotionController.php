<?php

namespace App\Http\Controllers;

use App\Models\EmployeePromotion;
use Illuminate\Http\Request;

class EmployeePromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search = null;
        $employee_promotions  = EmployeePromotion::orderBy('id', 'asc');
        if ($request->has('search')){
            $sort_search = $request->search;
            $employee_promotions  = $employee_promotions ->where('employee_id', 'like', '%'.$sort_search.'%');
        }
        $employee_promotions  = $employee_promotions ->paginate(10);
        return view('hr_management.employee_promotion.index', compact('employee_promotions', 'sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hr_management.employee_promotion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee_promotion = new EmployeePromotion;

        $employee_promotion->employee_id  = $request->employee_id;
        $employee_promotion->department_id   = $request->department_id ;
        $employee_promotion->designation_id   = $request->designation_id ;
        $employee_promotion->effective_date  = $request->effective_date;
        $employee_promotion->remarks  = $request->remarks;
        $employee_promotion->status	 = "active";

        $employee_promotion->save();

        flash('Employee promotion has been inserted successfully')->success();
        return redirect()->route('departments.index');
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
        $department = EmployeePromotion::findOrFail($id);

        return view('hr_management.employee_promotion.edit', compact('department'));
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
        $employee_promotion = EmployeePromotion::findOrFail($id);

        $employee_promotion->employee_id  = $request->employee_id;
        $employee_promotion->department_id   = $request->department_id ;
        $employee_promotion->designation_id   = $request->designation_id ;
        $employee_promotion->effective_date  = $request->effective_date;
        $employee_promotion->remarks  = $request->remarks;
        $employee_promotion->status	 = "active";

        $employee_promotion->save();

        flash('Employee promotion has been updated successfully')->success();
        return redirect()->route('employee_promotions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EmployeePromotion::find($id)->delete();
        flash('Employee promotion has been deleted successfully')->success();

        return redirect()->route('employee_promotions.index');
    }
}
