<?php

namespace App\Http\Controllers\Web\backend;

use App\Http\Controllers\Controller;
use App\Models\AuctionTime;
use App\Models\Car;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class CarManageController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        if ($request->ajax()) {
            $data = Car::with('user')->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm" onclick="EditCar(' . $row->id . ')" >edit</a>';
                        $btn = $btn . ' <a href="javascript:void(0)" class="delete btn btn-danger btn-sm" onclick="DeleteCar(' . $row->id . ')" >Delete</a>';
                        return $btn;
                    })

                    ->addColumn('status', function ($row) {
                        if($row->status == 0) {
                            return '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm" onclick="ChaneStatus(' . $row->id . ')" >Active</a>';;
                        } else {
                            return '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm" onclick="ChaneStatus(' . $row->id . ')" >Inactive</a>';;
                        }
                    })

                    ->addColumn('image', function ($row) {

                        return '<img src=" '. $row->image .' " style="width:13vw; height:15vh;" />';
                    })

                    ->rawColumns(['action','image','status'])
                    ->make(true);
        }
        return view('backend.layouts.car-management.index');
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


    public function changeStatus($id)
    {

        $car = Car::find($id);

        if($car->status  == 1) {
            $car->status = 0;

            $existingAuctionTime = AuctionTime::where('car_id', $car->id)->first();
            if($existingAuctionTime) {
                $existingAuctionTime->delete();
            }
            
        } else {
            $car->status = 1;

                AuctionTime::create([
                    'car_id' => $car->id,
                    'start_time' => date('Y-m-d H:i:s'),
                    'end_time' => date('Y-m-d H:i:s', strtotime('+7 days'))
                ]);

        }
        $car->save();

        return response()->json([
            'success' => true,
            'message' => 'Status changed successfully',
        ]);
    }
}
