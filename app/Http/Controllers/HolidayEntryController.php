<?php

namespace App\Http\Controllers;

use App\Models\HolidayEntry;
use Illuminate\Http\Request;

class HolidayEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search = null;
        $holiday_entries = HolidayEntry::orderBy('id', 'asc');
        if ($request->has('search')){
            $sort_search = $request->search;
            $holiday_entries = $holiday_entries->where('holiday_name', 'like', '%'.$sort_search.'%');
        }
        $holiday_entries = $holiday_entries->paginate(10);
        return view('hr_management.holiday_entry.index', compact('holiday_entries', 'sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hr_management.holiday_entry.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $holiday_entry = new HolidayEntry();

        $holiday_entry->form_date = $request->form_date;
        $holiday_entry->to_date = $request->to_date;
        $holiday_entry->holiday_days = $request->holiday_days;
        $holiday_entry->holiday_month = $request->holiday_month;
        $holiday_entry->holiday_year = $request->holiday_year;
        $holiday_entry->remarks = $request->remarks;
        $holiday_entry->status	 = $request->status;

        $holiday_entry->save();

        flash('Holiday Entries has been inserted successfully')->success();
        return redirect()->route('holiday_entries.index');
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
        $department = HolidayEntry::findOrFail($id);

        return view('hr_management.holiday_entry.edit', compact('department'));
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
        $holiday_entry = HolidayEntry::findOrFail($id);

        $holiday_entry->form_date = $request->form_date;
        $holiday_entry->to_date = $request->to_date;
        $holiday_entry->holiday_days = $request->holiday_days;
        $holiday_entry->holiday_month = $request->holiday_month;
        $holiday_entry->holiday_year = $request->holiday_year;
        $holiday_entry->remarks = $request->remarks;
        $holiday_entry->status	 = $request->status;

        $holiday_entry->save();

        flash('Holiday Entries has been updated successfully')->success();
        return redirect()->route('holiday_entries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HolidayEntry::find($id)->delete();
        flash('Holiday entries has been deleted successfully')->success();

        return redirect()->route('holiday_entries.index');
    }
}
