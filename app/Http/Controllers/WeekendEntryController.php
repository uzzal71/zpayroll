<?php

namespace App\Http\Controllers;

use App\Models\WeekendEntry;
use Illuminate\Http\Request;

class WeekendEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search = null;
        $weekend_entries = WeekendEntry::orderBy('id', 'asc');
        if ($request->has('search')){
            $sort_search = $request->search;
            $weekend_entries = $weekend_entries->where('remarks', 'like', '%'.$sort_search.'%');
        }
        $weekend_entries = $weekend_entries->paginate(10);
        return view('hr_management.weekend_entry.index', compact('weekend_entries', 'sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hr_management.weekend_entry.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $weekend_entry = new WeekendEntry;

        $weekend_entry->weekend_date = $request->weekend_date;
        $weekend_entry->remarks = $request->remarks;
        $weekend_entry->weekend_month = $request->weekend_month;
        $weekend_entry->weekend_year = $request->weekend_year;
        $weekend_entry->status	 = $request->status;

        $weekend_entry->save();

        flash('Weekend entries has been inserted successfully')->success();
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
        $department = WeekendEntry::findOrFail($id);

        return view('hr_management.weekend_entry.edit', compact('department'));
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
        $weekend_entry = WeekendEntry::findOrFail($id);

        $weekend_entry->weekend_date = $request->weekend_date;
        $weekend_entry->remarks = $request->remarks;
        $weekend_entry->weekend_month = $request->weekend_month;
        $weekend_entry->weekend_year = $request->weekend_year;
        $weekend_entry->status	 = $request->status;

        $weekend_entry->save();

        flash('Weekend entries has been updated successfully')->success();
        return redirect()->route('weekend_entries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        WeekendEntry::find($id)->delete();
        flash('Weekend entries has been deleted successfully')->success();

        return redirect()->route('weekend_entries.index');
    }
}
