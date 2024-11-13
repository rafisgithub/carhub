<?php


namespace App\Http\Controllers\Web\backend;
use App\Http\Controllers\Controller;
use App\Models\CarCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CarCategoryController extends Controller
{
    public $carCategory;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $carCategories = CarCategory::all();

            return DataTables::of($carCategories)

                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                        $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm" onclick="EditCarTransmission(' . $row->id . ', \'' . $row->category . '\')" >edit</a>';
                        $btn = $btn . ' <a href="javascript:void(0)" class="delete btn btn-danger btn-sm" onclick="DeleteCarTransmission(' . $row->id . ')" >Delete</a>';
                        return $btn;
                })

                    ->rawColumns(['action'])

                    ->make(true);

        }
        return view('backend.layouts.car.car-category');
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
        // dd($request->all());
        $request->validate([
            'category' => 'required|string'
        ]);

        $this->carCategory = new CarCategory();
        $this->carCategory->category = $request->category;
        $this->carCategory->save();



        return response()->json([
            'status' => true,
            'message' => 'Car Category Added Successfully.'
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
        $carCategory = CarCategory::find($id);

        return response()->json($carCategory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category' => 'required|string'
        ]);

        $this->carCategory = CarCategory::find($id);
        $this->carCategory->category = $request->category;
        $this->carCategory->save();

        return response()->json([
            'status' => true,
            'message' => 'Car Category Updated Successfully.'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $carCategory = CarCategory::find($id);
        // dd($carCategory);
        $carCategory->delete();

        return response()->json([
            'status' => true,
            'message' => "Deleted successfully"
        ]);
    }
}
