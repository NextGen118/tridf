<?php

namespace App\Http\Controllers;

use App\Models\ports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PortsController extends Controller
{
    public function index()
    {
        $ports = DB::table('ports')
            ->select(
                'ports.id',
                'ports.port_code',
                'ports.port_name',
                'ports.sub_code',
                'ports.country_id',
                'countries.country_name',
                'countries.capital_city_name'
            )
            ->join('countries', 'ports.country_id', '=', 'countries.id')
            ->get();

        return $ports;
    }

    public function showById(Request $request)
    {
        $countryId = $request->countryid;
        $ports = DB::table('ports')
            ->select(
                'ports.id',
                'ports.port_code',
                'ports.port_name',
                'ports.sub_code',
                'ports.country_id',
                'countries.country_name',
                'countries.capital_city_name'
            )
            ->join('countries', 'ports.country_id', '=', 'countries.id')
            ->where('countries.id', '=', $countryId)
            ->get();

        return $ports;
    }

    public function store(Request $request)
    {
        $id = $request->id;

        if ($id == 0) { // create

            $this->validate($request, [
                'port_code' => 'required|unique:ports,port_code',
                'port_name' => 'required|unique:ports,port_name',
                'sub_code' => 'required|unique:ports,sub_code'
            ]);

            $port = new ports();
        } else { // update

            $this->validate($request, [
                'port_code' => 'required|unique:ports,port_code,' . $id,
                'port_name' => 'required|unique:ports,port_name,' . $id,
                'sub_code' => 'required|unique:ports,sub_code,' . $id
            ]);

            $port = ports::find($id);
        }

        try {

            $port->port_code = $request->port_code;
            $port->port_name = $request->port_name;
            $port->sub_code = $request->sub_code;
            $port->country_id = $request->country_id;
            $port->save();

            $data = [
                'is_create' => true,
                'error' => []
            ];

            return $data;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
