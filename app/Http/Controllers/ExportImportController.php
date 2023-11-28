<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class ExportImportController extends Controller
{
    public function export()
    {
        return (new FastExcel(Vendor::all()))->download('file.xlsx',function($users){
            return [
                'Name' => $users->name,
                'Address' => $users->address,
                'Mobile' => $users->contact_no,
                'GST' => $users->gstno,
            ];
        });
    }
    public function import(Request $request)
    {
        //return $request;
        $users = (new FastExcel)->import($request->file, function ($line) {
            //return $line;
            return Vendor::create([
                'name' => $line['Name'],
                'address' => $line['Address'],
                'contact_no' => $line['Mobile'],
                'gstno' => $line['GST'],
            ]);
        });
        return redirect()->back()->with('message','Imported File Successfull!');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('import_export.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
