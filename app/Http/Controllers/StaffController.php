<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{

    public function index()
    {
        $regions = Region::query()->select('region')->groupBy('region')->get();
        $counties = Region::query()->orderBy('county', 'ASC')->get();
        return view('pages.staff.staff', [
            'regions' => $regions,
            'counties' => $counties
        ]);
    }

    public function filter(Request $request)
    {
        if ($request->term == 'undefined' || $request->term == 'null') {
            $term = null;
        } else {
            $term = $request->term;
        }

        if ($request->region == 'undefined' || $request->region == 'null' || $request->region == 'selected') {
            $region = null;
        } else {
            $region = $request->region;
        }

        if ($request->county == 'undefined' || $request->county == 'null' || $request->county == 'selected') {
            $county = null;
        } else {
            $county = $request->county;
        }

        if ($request->gender == 'undefined' || $request->gender == 'null' || $request->gender == 'selected') {
            $gender = null;
        } else {
            $gender = $request->gender;
        }

        if ($request->role == 'undefined' || $request->role == 'null') {
            $role = null;
        } else {
            $role = $request->role;
        }


        $staff = Staff::query();

        if ($term != null) {
            $staff->where('name', 'LIKE', '%' . $term . '%');
        }
        $staff->whereHas('user', function ($builder) use ($region, $county, $request, $gender) {
            if ($region != null) {
                $builder->where('region', $request->region);
            }

            if ($county != null) {
                $builder->where('county', $county);
            }

            if ($gender != null) {
                $builder->where('gender', $gender);
            }

            $builder->where('is_public', 1);
        });

        if ($role != null) {
            $staff->where('role', $role);
        }
        $staff->with(['user']);

        $staffs = $staff->paginate(15);

        return response()->json($staffs);
    }

    public function single(Staff $staff)
    {
        return view('pages.staff.single', [
            'staff' => $staff
        ]);
    }
}
