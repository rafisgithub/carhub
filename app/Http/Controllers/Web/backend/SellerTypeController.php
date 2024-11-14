<?php

namespace App\Http\Controllers\Web\backend;

use App\Http\Controllers\Controller;
use App\Models\SellerType;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SellerTypeController extends Controller
{
    public $SellerType;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    //   dd($request->all());
        if ($request->ajax()) {

            $data = SellerType::all();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                            $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm" onclick="EditSellerType(' . $row->id . ', \'' . $row->seller_type . '\')" >edit</a>';
                            $btn = $btn . ' <a href="javascript:void(0)" class="delete btn btn-danger btn-sm" onclick="DeleteSellerType(' . $row->id . ')" >Delete</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])

                    ->make(true);
        }
        return view('backend.layouts.seller-type.seller-type');
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
            'seller_type' => 'required',
        ]);
        $this->SellerType = new SellerType();
        $this->SellerType->seller_type = $request->seller_type;
        $this->SellerType->save();

       return response()->json([
            'success' => true,
            'message' => 'Seller type added successfully',
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
            'seller_type' => 'required',
        ]);
        $this->SellerType = SellerType::find($id);
        $this->SellerType->seller_type = $request->seller_type;
        $this->SellerType->save();

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
        $this->SellerType = SellerType::find($id);
        $this->SellerType->delete();

        return response()->json([
            'success' => true,
            'message' => 'Transmission type deleted successfully',
        ]);
    }
}
