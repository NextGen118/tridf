<?php

namespace App\Http\Controllers;

use App\Models\bill_of_landing_subs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BillOfLandingSubsController extends Controller
{
    public function index()
    {
        $billoflandingsubs = DB::table('bill_of_landing_subs')
            ->select(
                'bill_of_landing_subs.id',
                'bill_of_landing_subs.date',
                'bill_of_landing_subs.bill_of_landing_id',
                'bill_of_landing_subs.equipment_id',
                'bill_of_landing_subs.seal_no',
                'bill_of_landing_subs.marks',
                'bill_of_landing_subs.package_quantity',
                'bill_of_landing_subs.description',
                'bill_of_landing_subs.gross_weight',
                'bill_of_landing_subs.measurement',
                'bill_of_landing_subs.bill_confirmation_id',
                'bill_of_landing_subs.status',
                'bill_of_landing_subs.ignore_data',
                'bill_of_landing_subs.reserved_date',
                'bill_of_landing_subs.shipper_date',
                'bill_of_landing_subs.on_job_date',
                'bill_of_landing_subs.yard_in_date',
                'bill_of_landing_subs.client_id_agent',
                'bill_of_landing_subs.client_id_ex_agent',
                'bill_of_landing_subs.vendor_id_yard',
                'bill_of_landing_subs.free_days',
                'bill_of_landing_subs.free_days_standard',
                'bill_of_landing_subs.ata_fpd',
                'bill_of_landing_subs.payed_till',
                'bill_of_landing_subs.soa_status_exp',
                'bill_of_landing_subs.soa_status_imp',
                'bill_of_landing_subs.lift_on_off',
                'bill_of_landing_subs.other_expenses',
                'bill_of_landing_subs.other_expenses_remarks',
                'bill_of_landing_subs.deleted',
                'bill_of_landings.bill_of_landing_number',
                'equipments.equipment_number',
                'agent.client_code',
                'agent.client_name',
                'ex_agent.client_code',
                'ex_agent.client_name',
                'yard.vendor_code',
                'yard.vendor_name'
            )
            ->join('bill_of_landings', 'bill_of_landing_subs.bill_of_landing_id', '=', 'bill_of_landings.id')
            ->join('equipments', 'bill_of_landing_subs.equipment_id', '=', 'equipments.id')
            ->join('clients as agent', 'bill_of_landing_subs.client_id_agent', '=', 'agent.id')
            ->join('clients as ex_agent', 'bill_of_landing_subs.client_id_ex_agent', '=', 'ex_agent.id')
            ->join('vendors as yard', 'bill_of_landing_subs.vendor_id_yard', '=', 'yard.id')
            ->paginate(50);

        return $billoflandingsubs;
    }

    public function showById(Request $request)
    {
        $id = $request->id;
        $billoflandingsubs = DB::table('bill_of_landing_subs')
            ->select(
                'bill_of_landing_subs.id',
                'bill_of_landing_subs.date',
                'bill_of_landing_subs.bill_of_landing_id',
                'bill_of_landing_subs.equipment_id',
                'bill_of_landing_subs.seal_no',
                'bill_of_landing_subs.marks',
                'bill_of_landing_subs.package_quantity',
                'bill_of_landing_subs.description',
                'bill_of_landing_subs.gross_weight',
                'bill_of_landing_subs.measurement',
                'bill_of_landing_subs.bill_confirmation_id',
                'bill_of_landing_subs.status',
                'bill_of_landing_subs.ignore_data',
                'bill_of_landing_subs.reserved_date',
                'bill_of_landing_subs.shipper_date',
                'bill_of_landing_subs.on_job_date',
                'bill_of_landing_subs.yard_in_date',
                'bill_of_landing_subs.client_id_agent',
                'bill_of_landing_subs.client_id_ex_agent',
                'bill_of_landing_subs.vendor_id_yard',
                'bill_of_landing_subs.free_days',
                'bill_of_landing_subs.free_days_standard',
                'bill_of_landing_subs.ata_fpd',
                'bill_of_landing_subs.payed_till',
                'bill_of_landing_subs.soa_status_exp',
                'bill_of_landing_subs.soa_status_imp',
                'bill_of_landing_subs.lift_on_off',
                'bill_of_landing_subs.other_expenses',
                'bill_of_landing_subs.other_expenses_remarks',
                'bill_of_landing_subs.deleted',
                'bill_of_landings.bill_of_landing_number',
                'equipments.equipment_number',
                'agent.client_code',
                'agent.client_name',
                'ex_agent.client_code',
                'ex_agent.client_name',
                'yard.vendor_code',
                'yard.vendor_name'
            )
            ->join('bill_of_landings', 'bill_of_landing_subs.bill_of_landing_id', '=', 'bill_of_landings.id')
            ->join('equipments', 'bill_of_landing_subs.equipment_id', '=', 'equipments.id')
            ->join('clients as agent', 'bill_of_landing_subs.client_id_agent', '=', 'agent.id')
            ->join('clients as ex_agent', 'bill_of_landing_subs.client_id_ex_agent', '=', 'ex_agent.id')
            ->join('vendors as yard', 'bill_of_landing_subs.vendor_id_yard', '=', 'yard.id')
            ->where('bill_of_landing_subs.id', '=', $id)
            ->get();

        return $billoflandingsubs;
    }

    public function showBySearch(Request $request)
    {
        $query = "";

        if ($request->get('query')) {
            $query = $request->get('query');

            $billoflandingsubs = DB::table('bill_of_landing_subs')
                ->select(
                    'bill_of_landing_subs.id',
                    'bill_of_landing_subs.date',
                    'bill_of_landing_subs.bill_of_landing_id',
                    'bill_of_landing_subs.equipment_id',
                    'bill_of_landing_subs.seal_no',
                    'bill_of_landing_subs.marks',
                    'bill_of_landing_subs.package_quantity',
                    'bill_of_landing_subs.description',
                    'bill_of_landing_subs.gross_weight',
                    'bill_of_landing_subs.measurement',
                    'bill_of_landing_subs.bill_confirmation_id',
                    'bill_of_landing_subs.status',
                    'bill_of_landing_subs.ignore_data',
                    'bill_of_landing_subs.reserved_date',
                    'bill_of_landing_subs.shipper_date',
                    'bill_of_landing_subs.on_job_date',
                    'bill_of_landing_subs.yard_in_date',
                    'bill_of_landing_subs.client_id_agent',
                    'bill_of_landing_subs.client_id_ex_agent',
                    'bill_of_landing_subs.vendor_id_yard',
                    'bill_of_landing_subs.free_days',
                    'bill_of_landing_subs.free_days_standard',
                    'bill_of_landing_subs.ata_fpd',
                    'bill_of_landing_subs.payed_till',
                    'bill_of_landing_subs.soa_status_exp',
                    'bill_of_landing_subs.soa_status_imp',
                    'bill_of_landing_subs.lift_on_off',
                    'bill_of_landing_subs.other_expenses',
                    'bill_of_landing_subs.other_expenses_remarks',
                    'bill_of_landing_subs.deleted',
                    'bill_of_landings.bill_of_landing_number',
                    'equipments.equipment_number',
                    'agent.client_code',
                    'agent.client_name',
                    'ex_agent.client_code',
                    'ex_agent.client_name',
                    'yard.vendor_code',
                    'yard.vendor_name'
                )
                ->join('bill_of_landings', 'bill_of_landing_subs.bill_of_landing_id', '=', 'bill_of_landings.id')
                ->join('equipments', 'bill_of_landing_subs.equipment_id', '=', 'equipments.id')
                ->join('clients as agent', 'bill_of_landing_subs.client_id_agent', '=', 'agent.id')
                ->join('clients as ex_agent', 'bill_of_landing_subs.client_id_ex_agent', '=', 'ex_agent.id')
                ->join('vendors as yard', 'bill_of_landing_subs.vendor_id_yard', '=', 'yard.id')
                ->where(function ($q) use ($query) {
                    $q->where('bill_of_landings.bill_of_landing_number', 'like', '%' . $query . '%')
                        ->orWhere('bill_of_landing_subs.seal_no', 'like', '%' . $query . '%')
                        ->orWhere('equipments.equipment_number', 'like', '%' . $query . '%')
                        ->orWhere('agent.client_code', 'like', '%' . $query . '%')
                        ->orWhere('agent.client_name', 'like', '%' . $query . '%')
                        ->orWhere('yard.vendor_code', 'like', '%' . $query . '%')
                        ->orWhere('yard.vendor_name', 'like', '%' . $query . '%');
                })
                ->get();
        }

        return $billoflandingsubs;
    }

    public function showByFilter(Request $request)
    {
        $fdate = isset($request->fdate) ? $request->fdate : date('Y-m-d');
        $tdate = isset($request->tdate) ? $request->tdate : date('Y-m-d');

        $billoflandingsubs = DB::table('bill_of_landing_subs')
        ->select(
            'bill_of_landing_subs.id',
            'bill_of_landing_subs.date',
            'bill_of_landing_subs.bill_of_landing_id',
            'bill_of_landing_subs.equipment_id',
            'bill_of_landing_subs.seal_no',
            'bill_of_landing_subs.marks',
            'bill_of_landing_subs.package_quantity',
            'bill_of_landing_subs.description',
            'bill_of_landing_subs.gross_weight',
            'bill_of_landing_subs.measurement',
            'bill_of_landing_subs.bill_confirmation_id',
            'bill_of_landing_subs.status',
            'bill_of_landing_subs.ignore_data',
            'bill_of_landing_subs.reserved_date',
            'bill_of_landing_subs.shipper_date',
            'bill_of_landing_subs.on_job_date',
            'bill_of_landing_subs.yard_in_date',
            'bill_of_landing_subs.client_id_agent',
            'bill_of_landing_subs.client_id_ex_agent',
            'bill_of_landing_subs.vendor_id_yard',
            'bill_of_landing_subs.free_days',
            'bill_of_landing_subs.free_days_standard',
            'bill_of_landing_subs.ata_fpd',
            'bill_of_landing_subs.payed_till',
            'bill_of_landing_subs.soa_status_exp',
            'bill_of_landing_subs.soa_status_imp',
            'bill_of_landing_subs.lift_on_off',
            'bill_of_landing_subs.other_expenses',
            'bill_of_landing_subs.other_expenses_remarks',
            'bill_of_landing_subs.deleted',
            'bill_of_landings.bill_of_landing_number',
            'equipments.equipment_number',
            'agent.client_code',
            'agent.client_name',
            'ex_agent.client_code',
            'ex_agent.client_name',
            'yard.vendor_code',
            'yard.vendor_name'
        )
        ->join('bill_of_landings', 'bill_of_landing_subs.bill_of_landing_id', '=', 'bill_of_landings.id')
        ->join('equipments', 'bill_of_landing_subs.equipment_id', '=', 'equipments.id')
        ->join('clients as agent', 'bill_of_landing_subs.client_id_agent', '=', 'agent.id')
        ->join('clients as ex_agent', 'bill_of_landing_subs.client_id_ex_agent', '=', 'ex_agent.id')
        ->join('vendors as yard', 'bill_of_landing_subs.vendor_id_yard', '=', 'yard.id');

        if (!empty($request->bill_of_landing_id) && !empty($request->equipment_id) && !empty($request->client_id_agent) && !empty($request->vendor_id_yard)) {
 
            $billoflandingsubs = $billoflandingsubs
                ->where('bill_of_landing_subs.bill_of_landing_id', '=', $request->bill_of_landing_id)
                ->where('bill_of_landing_subs.equipment_id', '=', $request->equipment_id)
                ->where('bill_of_landing_subs.client_id_agent', '=', $request->client_id_agent)
                ->where('bill_of_landing_subs.vendor_id_yard', '=', $request->vendor_id_yard);
        } elseif (!empty($request->bill_of_landing_id) && empty($request->equipment_id) && !empty($request->client_id_agent) && !empty($request->vendor_id_yard)) {
        
            $billoflandingsubs = $billoflandingsubs
                ->where('bill_of_landing_subs.bill_of_landing_id', '=', $request->bill_of_landing_id)
                ->where('bill_of_landing_subs.client_id_agent', '=', $request->client_id_agent)
                ->where('bill_of_landing_subs.vendor_id_yard', '=', $request->vendor_id_yard);
        } elseif (!empty($request->bill_of_landing_id) && !empty($request->equipment_id) && empty($request->client_id_agent) && !empty($request->vendor_id_yard)) {
           
            $billoflandingsubs = $billoflandingsubs
                ->where('bill_of_landing_subs.bill_of_landing_id', '=', $request->bill_of_landing_id)
                ->where('bill_of_landing_subs.equipment_id', '=', $request->equipment_id)
                ->where('bill_of_landing_subs.vendor_id_yard', '=', $request->vendor_id_yard);
        } elseif (!empty($request->bill_of_landing_id) && !empty($request->equipment_id) && !empty($request->client_id_agent) && empty($request->vendor_id_yard)) {
         
            $billoflandingsubs = $billoflandingsubs
                ->where('bill_of_landing_subs.bill_of_landing_id', '=', $request->bill_of_landing_id)
                ->where('bill_of_landing_subs.equipment_id', '=', $request->equipment_id)
                ->where('bill_of_landing_subs.client_id_agent', '=', $request->client_id_agent);
        } elseif (!empty($request->bill_of_landing_id) && empty($request->equipment_id) && empty($request->client_id_agent) && empty($request->vendor_id_yard)) {
           
            $billoflandingsubs = $billoflandingsubs
                ->where('bill_of_landing_subs.bill_of_landing_id', '=', $request->bill_of_landing_id);
        } elseif (empty($request->bill_of_landing_id) && !empty($request->equipment_id) && !empty($request->client_id_agent) && !empty($request->vendor_id_yard)) {
           
            $billoflandingsubs = $billoflandingsubs
                ->where('bill_of_landing_subs.equipment_id', '=', $request->equipment_id)
                ->where('bill_of_landing_subs.client_id_agent', '=', $request->client_id_agent)
                ->where('bill_of_landing_subs.vendor_id_yard', '=', $request->vendor_id_yard);
        } elseif (empty($request->bill_of_landing_id) && !empty($request->equipment_id) && empty($request->client_id_agent) && !empty($request->vendor_id_yard)) {
           
            $billoflandingsubs = $billoflandingsubs
                ->where('bill_of_landing_subs.equipment_id', '=', $request->equipment_id)
                ->where('bill_of_landing_subs.vendor_id_yard', '=', $request->vendor_id_yard);
        } elseif (empty($request->bill_of_landing_id) && !empty($request->equipment_id) && empty($request->client_id_agent) && empty($request->vendor_id_yard)) {
           
            $billoflandingsubs = $billoflandingsubs
                ->where('bill_of_landing_subs.equipment_id', '=', $request->equipment_id);
        } elseif (empty($request->bill_of_landing_id) && empty($request->equipment_id) && !empty($request->client_id_agent) && !empty($request->vendor_id_yard)) {
           
            $billoflandingsubs = $billoflandingsubs
                ->where('bill_of_landing_subs.client_id_agent', '=', $request->client_id_agent)
                ->where('bill_of_landing_subs.vendor_id_yard', '=', $request->vendor_id_yard);
        } elseif (empty($request->bill_of_landing_id) && empty($request->equipment_id) && !empty($request->client_id_agent) && empty($request->vendor_id_yard)) {
            
            $billoflandingsubs = $billoflandingsubs
                ->where('bill_of_landing_subs.client_id_agent', '=', $request->client_id_agent);
        } elseif (empty($request->bill_of_landing_id) && empty($request->equipment_id) && empty($request->client_id_agent) && !empty($request->vendor_id_yard)) {
          
            $billoflandingsubs = $billoflandingsubs
                ->where('bill_of_landing_subs.vendor_id_yard', '=', $request->vendor_id_yard);
        } else {
            
            $billoflandingsubs = $billoflandingsubs;
        }

        $result = $billoflandingsubs->orderBy('bill_of_landing_subs.id')
            ->get();
        return $result;
    }

    public function store(Request $request)
    {
        $id = $request->id;


        if ($id == 0) { // create

            $billoflandingsubs = new bill_of_landing_subs();
        } else { // update

            $billoflandingsubs = bill_of_landing_subs::find($id);
        }

        try {
            $billoflandingsubs->date = $request->date;
            $billoflandingsubs->bill_of_landing_id = $request->bill_of_landing_id;
            $billoflandingsubs->equipment_id = $request->equipment_id;
            $billoflandingsubs->seal_no = $request->seal_no;
            $billoflandingsubs->marks = $request->marks;
            $billoflandingsubs->package_quantity = $request->package_quantity;
            $billoflandingsubs->description = $request->description;
            $billoflandingsubs->gross_weight = $request->gross_weight;
            $billoflandingsubs->measurement = $request->measurement;
            $billoflandingsubs->bill_confirmation_id = $request->bill_confirmation_id;
            $billoflandingsubs->status = $request->status;
            $billoflandingsubs->ignore_data = $request->ignore_data;
            $billoflandingsubs->reserved_date = $request->reserved_date;
            $billoflandingsubs->shipper_date = $request->shipper_date;
            $billoflandingsubs->on_job_date = $request->on_job_date;
            $billoflandingsubs->yard_in_date = $request->yard_in_date;
            $billoflandingsubs->client_id_agent = $request->client_id_agent;
            $billoflandingsubs->client_id_ex_agent = $request->client_id_ex_agent;
            $billoflandingsubs->vendor_id_yard = $request->vendor_id_yard;
            $billoflandingsubs->free_days = $request->free_days;
            $billoflandingsubs->free_days_standard = $request->free_days_standard;
            $billoflandingsubs->ata_fpd = $request->ata_fpd;
            $billoflandingsubs->payed_till = $request->payed_till;
            $billoflandingsubs->soa_status_exp = $request->soa_status_exp;
            $billoflandingsubs->soa_status_imp = $request->soa_status_imp;
            $billoflandingsubs->lift_on_off = $request->lift_on_off;
            $billoflandingsubs->other_expenses = $request->other_expenses;
            $billoflandingsubs->other_expenses_remarks = $request->other_expenses_remarks;
            $billoflandingsubs->deleted = $request->deleted;
            $billoflandingsubs->save();

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
            $status = 0; //inactive
        } else {
            $status = 1; //active
        }

        $billoflandingsubs = bill_of_landing_subs::find($id);
        $billoflandingsubs->deleted = $status;
        $billoflandingsubs->save();

        return 'Done';
    }
}
