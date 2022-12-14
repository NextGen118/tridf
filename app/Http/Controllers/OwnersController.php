<?php

namespace App\Http\Controllers;

use App\Models\owners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OwnersController extends Controller
{
    public function index()
    {
        $owners = DB::table('owners')
            ->select(
                'owners.id',
                'owners.owner_code',
                'owners.owner_name',
                'owners.sub_code',
                'owners.country_id',
                'owners.port_id',
                'owners.email',
                'owners.telephone_number',
                'owners.fax',
                'owners.mobile_number',
                'owners.contact_name',
                'owners.address',
                'owners.image',
                'owners.remarks',
                'owners.is_active',
                'countries.country_name',
                'countries.capital_city_name',
                'ports.port_code',
                'ports.port_name'
            )
            ->join('countries', 'owners.country_id', '=', 'countries.id')
            ->join('ports', 'owners.port_id', '=', 'ports.id')
            ->paginate(50);

        return $owners;
    }

    public function showById(Request $request)
    {
        $id = $request->id;
        $owners = DB::table('owners')
            ->select(
                'owners.id',
                'owners.owner_code',
                'owners.owner_name',
                'owners.sub_code',
                'owners.country_id',
                'owners.port_id',
                'owners.email',
                'owners.telephone_number',
                'owners.fax',
                'owners.mobile_number',
                'owners.contact_name',
                'owners.address',
                'owners.image',
                'owners.remarks',
                'owners.is_active',
                'countries.country_name',
                'countries.capital_city_name',
                'ports.port_code',
                'ports.port_name'
            )
            ->join('countries', 'owners.country_id', '=', 'countries.id')
            ->join('ports', 'owners.port_id', '=', 'ports.id')
            ->where('owners.id', '=', $id)
            ->get();

        return $owners;
    }

    public function showBySearch(Request $request)
    {
        $query = "";

        if ($request->get('query')) {
            $query = $request->get('query');

            $owners = DB::table('owners')
            ->select(
                'owners.id',
                'owners.owner_code',
                'owners.owner_name',
                'owners.sub_code',
                'owners.country_id',
                'owners.port_id',
                'owners.email',
                'owners.telephone_number',
                'owners.fax',
                'owners.mobile_number',
                'owners.contact_name',
                'owners.address',
                'owners.image',
                'owners.remarks',
                'owners.is_active',
                'countries.country_name',
                'countries.capital_city_name',
                'ports.port_code',
                'ports.port_name'
            )
            ->join('countries', 'owners.country_id', '=', 'countries.id')
            ->join('ports', 'owners.port_id', '=', 'ports.id')
                ->where(function ($q) use ($query) {
                    $q->where('owners.owner_code', 'like', '%' . $query . '%')
                        ->orWhere('owners.owner_name', 'like', '%' . $query . '%')
                        ->orWhere('owners.email', 'like', '%' . $query . '%')
                        ->orWhere('owners.mobile_number', 'like', '%' . $query . '%')
                        ->orWhere('owners.is_active', 'like', '%' . $query . '%')
                        ->orWhere('countries.country_name', 'like', '%' . $query . '%')
                        ->orWhere('ports.port_code', 'like', '%' . $query . '%')
                        ->orWhere('ports.port_name', 'like', '%' . $query . '%');
                })
                ->get();
        }

        return $owners;
    }

    public function showByFilter(Request $request)
    {
        // $id = $request->id;

        $owners = DB::table('owners')
        ->select(
            'owners.id',
            'owners.owner_code',
            'owners.owner_name',
            'owners.sub_code',
            'owners.country_id',
            'owners.port_id',
            'owners.email',
            'owners.telephone_number',
            'owners.fax',
            'owners.mobile_number',
            'owners.contact_name',
            'owners.address',
            'owners.image',
            'owners.remarks',
            'owners.is_active',
            'countries.country_name',
            'countries.capital_city_name',
            'ports.port_code',
            'ports.port_name'
        )
        ->join('countries', 'owners.country_id', '=', 'countries.id')
        ->join('ports', 'owners.port_id', '=', 'ports.id');

        if (!empty($request->country_id) && !empty($request->port_id)) {

             $owners = $owners
             ->where('owners.country_id', '=', $request->country_id)
             ->where('owners.port_id', '=', $request->port_id);
        }
        elseif (!empty($request->country_id) && empty($request->port_id)) {

            $owners = $owners
            ->where('owners.country_id', '=', $request->country_id);
        }
        elseif (empty($request->country_id) && !empty($request->port_id)) {

            $owners = $owners
            ->where('owners.port_id', '=', $request->port_id);
        }
        else
        {

            $owners = $owners;
        }

        $result = $owners->orderBy('owners.id')
            ->get();
        return $result;
    }

    public function store(Request $request)
    {
        $id = $request->id;

        if ($id == 0) { // create

            if ($request['email'] == null) {
                $this->validate($request, [
                    'owner_code' => 'required|unique:owners,owner_code',
                    'owner_name' => 'required|unique:owners,owner_name'
                ]);
            } else {
                $this->validate($request, [
                    'email' => 'unique:owners,email',
                    'owner_code' => 'required|unique:owners,owner_code',
                    'owner_name' => 'required|unique:owners,owner_name'
                ]);
            }

            $owner = new owners();
        } else { // update

            if ($request['email'] == null) {
                $this->validate($request, [
                    'owner_code' => 'required|unique:owners,owner_code,' . $id,
                    'owner_name' => 'required|unique:owners,owner_name,' . $id
                ]);
            } else {
                $this->validate($request, [
                    'email' => 'unique:clients,email,' . $id,
                    'owner_code' => 'required|unique:owners,owner_code,' . $id,
                    'owner_name' => 'required|unique:owners,owner_name,' . $id
                ]);
            }

            $owner = owners::find($id);
        }

        try {
            $owner->owner_code = $request->owner_code;
            $owner->owner_name = $request->owner_name;
            $owner->sub_code = $request->sub_code;
            $owner->country_id = $request->country_id;
            $owner->port_id = $request->port_id;
            $owner->email = $request->email;
            $owner->telephone_number = $request->telephone_number;
            $owner->fax = $request->fax;
            $owner->mobile_number = $request->mobile_number;
            $owner->contact_name = $request->contact_name;
            $owner->address = $request->address;
            // $employee->image=$request->file('image');
            $owner->remarks = $request->remarks;
            $owner->is_active = $request->is_active;
            $owner->save();


            $data = [
                'is_create' => true,
                'error' => []
            ];

            return $data;
        } catch (\Throwable $th) {

            return $th;
        }
    }

    // status change
    public function statusChange(Request $request)
    {
        $id = $request->id;
        $status = $request->status;

        if ($status == 1) {
            $status = 0;//inactive
        } else {
            $status = 1;//active
        }

        $owner = owners::find($id);
        $owner->is_active = $status;
        $owner->save();

        return 'Done';
    }
}
