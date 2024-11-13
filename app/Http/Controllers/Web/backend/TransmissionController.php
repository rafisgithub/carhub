<?php

namespace App\Http\Controllers\Web\backend;

use App\Http\Controllers\Controller;

use App\Models\CarTransmission;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransmissionController extends Controller
{
    public $carTransmission;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = CarTransmission::select('*');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                            $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm" onclick="EditCarTransmission(' . $row->id . ', \'' . $row->transmission_type . '\')" >edit</a>';
                            $btn = $btn . ' <a href="javascript:void(0)" class="delete btn btn-danger btn-sm" onclick="DeleteCarTransmission(' . $row->id . ')" >Delete</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])

                    ->make(true);
        }
        return view('backend.layouts.transmission.transmission');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'transmission_type' => 'required',
        ]);
        $this->carTransmission = new CarTransmission();
        $this->carTransmission->transmission_type = $request->transmission_type;
        $this->carTransmission->save();

       return response()->json([
            'success' => true,
            'message' => 'Transmission type added successfully',
       ]);

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
        $request->validate([
            'transmission_type' => 'required',
        ]);
        $this->carTransmission = CarTransmission::find($id);
        $this->carTransmission->transmission_type = $request->transmission_type;
        $this->carTransmission->save();

        return response()->json([
            'success' => true,
            'message' => 'Transmission type updated successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->carTransmission = CarTransmission::find($id);
        $this->carTransmission->delete();

        return response()->json([
            'success' => true,
            'message' => 'Transmission type deleted successfully',
        ]);
    }
}
