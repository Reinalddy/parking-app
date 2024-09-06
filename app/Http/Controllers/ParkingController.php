<?php

namespace App\Http\Controllers;

use Datatables;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;


class ParkingController extends Controller
{
    public function index()
    {
        return view('parking.index');
    }

    public function getParkingList(Request $request): mixed
    {
        $data = Vehicle::with('vehicleType')->get();
        $hasManageParking = Auth::user()->can('manage_parking');

        return Datatables::of($data)
            ->addColumn('id', function ($data) {
                return $data->vehicle_id;
            })
            ->addColumn('type', function ($data) {
                return $data->vehicleType->name;
            })

            ->addColumn('entry', function ($data) {
                return $data->check_in_time;
            })
            ->addColumn('exit', function ($data) {
                return $data->check_out_time;
            })
            ->addColumn('status', function ($data) {
                return $data->status;
            })
            ->addColumn('payment_status', function ($data) {
                return $data->payment_status;
            })
            ->addColumn('action', function ($data) use ($hasManageParking) {
                $output = '';

                if ($hasManageParking) {
                    $output = '<div class="table-actions">
                                <a href="' . url('user/' . $data->id) . '" ><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                <a href="' . url('user/delete/' . $data->id) . '"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                            </div>';
                }

                return $output;
            })
            ->rawColumns(['roles', 'permissions', 'action'])
            ->make(true);
    }

    public function create(Request $request): RedirectResponse
    {
        try {
            

            return redirect('permission')->with('error', 'Failed to create permission! Try again.');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }
}
