<?php

namespace App\Http\Controllers;

use App\Models\igm_india_containers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class IgmIndiaContainersController extends Controller
{
    public function index()
    {
        $igm_india_containers = DB::table('igm_india_containers')
            ->select(
                'igm_india_containers.id',
                'igm_india_containers.igm_id',
                'igm_india_containers.cargo_info_number',
                'igm_india_containers.pod',
                'igm_india_containers.imo',
                'igm_india_containers.vessel',
                'igm_india_containers.voyage',
                'igm_india_containers.line',
                'igm_india_containers.sub_line',
                'igm_india_containers.equipment_id',
                'igm_india_containers.seal',
                'igm_india_containers.pan',
                'igm_india_containers.type',
                'igm_india_containers.pkgs',
                'igm_india_containers.gross_weight',
                'igm_india_containers.con_code',
                'igms.customs_office_code',
                'equipments.equipment_number'
            )
            ->join('igms', 'igm_india_containers.igm_id', '=', 'igms.id')
            ->join('equipments', 'igm_india_containers.equipment_id', '=', 'equipments.id')
            ->paginate(50);

        return $igm_india_containers;
    }

    public function showById(Request $request)
    {
        $id = $request->id;
        $igm_india_containers = DB::table('igm_india_containers')
            ->select(
                'igm_india_containers.id',
                'igm_india_containers.igm_id',
                'igm_india_containers.cargo_info_number',
                'igm_india_containers.pod',
                'igm_india_containers.imo',
                'igm_india_containers.vessel',
                'igm_india_containers.voyage',
                'igm_india_containers.line',
                'igm_india_containers.sub_line',
                'igm_india_containers.equipment_id',
                'igm_india_containers.seal',
                'igm_india_containers.pan',
                'igm_india_containers.type',
                'igm_india_containers.pkgs',
                'igm_india_containers.gross_weight',
                'igm_india_containers.con_code',
                'igms.customs_office_code',
                'equipments.equipment_number'
            )
            ->join('igms', 'igm_india_containers.igm_id', '=', 'igms.id')
            ->join('equipments', 'igm_india_containers.equipment_id', '=', 'equipments.id')
            ->where('igm_india_containers.id', '=', $id)
            ->get();

        return $igm_india_containers;
    }

    public function showBySearch(Request $request)
    {
        $query = "";

        if ($request->get('query')) {
            $query = $request->get('query');

            $igm_india_containers = DB::table('igm_india_containers')
            ->select(
                'igm_india_containers.id',
                'igm_india_containers.igm_id',
                'igm_india_containers.cargo_info_number',
                'igm_india_containers.pod',
                'igm_india_containers.imo',
                'igm_india_containers.vessel',
                'igm_india_containers.voyage',
                'igm_india_containers.line',
                'igm_india_containers.sub_line',
                'igm_india_containers.equipment_id',
                'igm_india_containers.seal',
                'igm_india_containers.pan',
                'igm_india_containers.type',
                'igm_india_containers.pkgs',
                'igm_india_containers.gross_weight',
                'igm_india_containers.con_code',
                'igms.customs_office_code',
                'equipments.equipment_number'
            )
            ->join('igms', 'igm_india_containers.igm_id', '=', 'igms.id')
            ->join('equipments', 'igm_india_containers.equipment_id', '=', 'equipments.id')
            ->where(function ($q) use ($query) {
                $q->where('igm_india_containers.cargo_info_number', 'like', '%' . $query . '%')
                    ->orWhere('igm_india_containers.vessel', 'like', '%' . $query . '%')
                    ->orWhere('igm_india_containers.voyage', 'like', '%' . $query . '%')
                    ->orWhere('igm_india_containers.type', 'like', '%' . $query . '%')
                    ->orWhere('igm_india_containers.pan', 'like', '%' . $query . '%')
                    ->orWhere('igms.customs_office_code', 'like', '%' . $query . '%')
                    ->orWhere('equipments.equipment_number', 'like', '%' . $query . '%');
            })
                ->get();
        }

        return $igm_india_containers;
    }

    public function showByFilter(Request $request)
    {
        // $id = $request->id;

        $igm_india_containers = DB::table('igm_india_containers')
        ->select(
            'igm_india_containers.id',
            'igm_india_containers.igm_id',
            'igm_india_containers.cargo_info_number',
            'igm_india_containers.pod',
            'igm_india_containers.imo',
            'igm_india_containers.vessel',
            'igm_india_containers.voyage',
            'igm_india_containers.line',
            'igm_india_containers.sub_line',
            'igm_india_containers.equipment_id',
            'igm_india_containers.seal',
            'igm_india_containers.pan',
            'igm_india_containers.type',
            'igm_india_containers.pkgs',
            'igm_india_containers.gross_weight',
            'igm_india_containers.con_code',
            'igms.customs_office_code',
            'equipments.equipment_number'
        )
        ->join('igms', 'igm_india_containers.igm_id', '=', 'igms.id')
        ->join('equipments', 'igm_india_containers.equipment_id', '=', 'equipments.id');

        if (!empty($request->igm_id) && !empty($request->equipment_id)) {

            $igm_india_containers = $igm_india_containers
            ->where('igm_india_containers.igm_id', '=', $request->igm_id)
            ->where('igm_india_containers.equipment_id', '=', $request->equipment_id);
       }
       elseif (!empty($request->igm_id) && empty($request->equipment_id)) {

           $igm_india_containers = $igm_india_containers
           ->where('igm_india_containers.igm_id', '=', $request->igm_id);
       }
       elseif (empty($request->igm_id) && !empty($request->equipment_id)) {

           $igm_india_containers = $igm_india_containers
           ->where('igm_india_containers.equipment_id', '=', $request->equipment_id);
       }
        else
        {
            // return "4";
            //all empty
            $igm_india_containers = $igm_india_containers;
        }

        $result = $igm_india_containers->orderBy('igm_india_containers.id')
            ->get();
        return $result;
    }

    public function store(Request $request)
    {
        $id = $request->id;

        if ($id == 0) { // create

            $igm_india_containers = new igm_india_containers();
        } else { // update

            $igm_india_containers = igm_india_containers::find($id);
        }


        try {
            $igm_india_containers->igm_id = $request->igm_id;
            $igm_india_containers->cargo_info_number = $request->cargo_info_number;
            $igm_india_containers->pod = $request->pod;
            $igm_india_containers->imo = $request->imo;
            $igm_india_containers->vessel = $request->vessel;
            $igm_india_containers->voyage = $request->voyage;
            $igm_india_containers->line = $request->line;
            $igm_india_containers->sub_line = $request->sub_line;
            $igm_india_containers->equipment_id = $request->equipment_id;
            $igm_india_containers->seal = $request->seal;
            $igm_india_containers->pan = $request->pan;
            $igm_india_containers->type = $request->type;
            $igm_india_containers->pkgs = $request->pkgs;
            $igm_india_containers->gross_weight = $request->gross_weight;
            $igm_india_containers->con_code = $request->con_code;
            $igm_india_containers->save();


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
