<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Vehicle;
use Brian2694\Toastr\Toastr;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function list()
    {
        $vehicleForStockShow = Vehicle::orderBy('sort', 'asc')->where('page_type', 1)->get();
        $vehicleForAuctionShow = Vehicle::orderBy('sort', 'asc')->where('page_type', 2)->get();
        return view('admin.vehicle.list', compact('vehicleForStockShow', 'vehicleForAuctionShow'));
    }

    public function create()
    {
        return view('admin.vehicle.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'page_type' => 'required',
            'step_name' => 'required',
            'step_title' => 'required',
            'step_details' => 'required',
        ]);

        try {
            $vehicle = new Vehicle();
            $vehicle->page_type = $request->page_type;
            $vehicle->step_name = $request->step_name;
            $vehicle->step_title = $request->step_title;
            $vehicle->step_details = $request->step_details;
            $vehicle->save();
            \Brian2694\Toastr\Facades\Toastr::success('Vechicle insert successfully', 'Success');
            return redirect()->back();
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $this->validate($request, [
            'page_type' => 'required',
            'step_name' => 'required',
            'step_title' => 'required',
            'step_details' => 'required',
        ]);

        try {
            $vehicle->page_type = $request->page_type;
            $vehicle->step_name = $request->step_name;
            $vehicle->step_title = $request->step_title;
            $vehicle->step_details = $request->step_details;
            $vehicle->save();
            \Brian2694\Toastr\Facades\Toastr::success('Vechicle update successfully', 'Update');
            return redirect('/admin/vehicle-list');
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function edit(Vehicle $vehicle)
    {
        return view('admin.vehicle.edit', compact('vehicle'));
    }

    public function trash(Vehicle $vehicle)
    {
        $vehicle->delete();
        \Brian2694\Toastr\Facades\Toastr::success('Vechicle delete successfully', 'Delete');
        return redirect()->back();

    }

    public function vehicleSortable(Request $request){
        //dd($request->all());
        $vehicles = Vehicle::where('page_type', $request->type)->get();
        //dd($vehicles);
        foreach ($vehicles as $vehicle) {
            $vehicle->timestamps = false; // To disable update_at field updation
            $id = $vehicle->id;
            foreach ($request->order as $order) {
                //dd($order);
                if ($order['id'] == $id) {
                    $vehicle->update(['sort' => $order['position']]);
                }
            }
        }

        return response('Update Successfully.', 200);
    }
}
