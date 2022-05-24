<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\File;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search =null;
        $uploads = Upload::orderBy('id', 'desc');
        if ($request->has('search')){
            $sort_search = $request->search;
            $uploads = $uploads->where('attendance_year', 'like', '%'.$sort_search.'%');
        }
        $uploads = $uploads->paginate(50);
        return view('payroll.index', compact('uploads', 'sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payroll.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $upload = new Upload;

        $create_date = date("Y-m-d");
        $create_date   = new DateTime($create_date);
        $year = $request->attendance_year;
        $month = $request->attendance_month;

        $filename = '';
        if($request->file('upload_file_name')){
            $file = $request->upload_file_name;
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $file_explode = explode('-', $filename);

            $destinationPath = public_path() .'\uploads\attendance_files';

            $filename = $month. '-'. $year . '.'.$file->clientExtension();

            $file->move($destinationPath, $filename);
        }

        // get file info where upload path
        $exists = Upload::where('upload_path', $filename)->first();


        $upload->attendance_year               = $year;
        $upload->attendance_month              = $month;
        $upload->upload_path                   = $filename;
        $upload->process_status	               = 1;

        // check file already exist
        if ($exists) {
            flash('Attendance file already exists! Please update file.')->success();
            return redirect()->route('upload.create');
        } else {
            $upload->save();
            flash('Attendance file has been inserted successfully')->success();
            return redirect()->route('upload.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $upload = Upload::findOrFail($id);

        return view('payroll.edit', compact('upload'));
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
        $upload = Upload::findOrFail($id);

        $create_date = date("Y-m-d");
        $create_date   = new DateTime($create_date);
        $year = $request->attendance_year;
        $month = $request->attendance_month;

        $filename = '';
        if($request->file('upload_file_name')){
            $file = $request->upload_file_name;
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $file_explode = explode('-', $filename);


            $destinationPath = public_path() .'\uploads\attendance_files';

            $filename = $month. '-'. $year . '.'.$file->clientExtension();

            $file->move($destinationPath, $filename);
        } else {
            $filename = $request->old_upload_file_name;
            $month = $upload->attendance_month;
            $year = $upload->attendance_year;
        }

        // get file info where upload path
        $exists = Upload::where('upload_path', $filename)->first();


        $upload->attendance_year               = $year;
        $upload->attendance_month              = $month;
        $upload->upload_path                   = $filename;
        $upload->process_status	               = 1;

        $upload->save();

        flash('Attendance file has been updated successfully')->success();
        return redirect()->route('upload.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $upload = Upload::where('id', $id)->first();
        $file_path = public_path().'/uploads/attendance_files/'.$upload->upload_path;
        unlink($file_path);

        Upload::where('id', $id)->delete();

        flash('Attendance file has been deleted successfully')->success();
        return redirect()->route('upload.index');
    }
}
