<?php

namespace App\Http\Controllers;

use App\Models\bill_of_landing_sub_non_inventories_imps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BillOfLandingSubNonInventoriesImpsController extends Controller
{
    public function index()
    {
        $billoflandingsubnoninventoriesimps = DB::table('bill_of_landing_sub_non_inventories_imps')
            ->select(
                'bill_of_landing_sub_non_inventories_imps.id',
                'bill_of_landing_sub_non_inventories_imps.blsn_invent_id',
                'bill_of_landing_sub_non_inventories_imps.imp_freight_charge_in',
                'bill_of_landing_sub_non_inventories_imps.imp_doc_fee',
                'bill_of_landing_sub_non_inventories_imps.imp_thc_phc',
                'bill_of_landing_sub_non_inventories_imps.exp_other_recovery',
                'bill_of_landing_sub_non_inventories_imps.exp_other_recovery_remarks',
                'bill_of_landing_sub_non_inventories_imps.exp_total_in',
                'bill_of_landing_sub_non_inventories_imps.exp_agent_comm',
                'bill_of_landing_sub_non_inventories_imps.exp_phc',
                'bill_of_landing_sub_non_inventories_imps.imp_doc_charges',
                'bill_of_landing_sub_non_inventories_imps.imp_freight_charge_ex',
                'bill_of_landing_sub_non_inventories_imps.imp_dc_surcharge',
                'bill_of_landing_sub_non_inventories_imps.imp_other_expenses',
                'bill_of_landing_sub_non_inventories_imps.imp_other_expenses_remarks',
                'bill_of_landing_sub_non_inventories_imps.imp_total_ex',
                'bill_of_landing_sub_non_inventories_imps.imp_final_amount',
                'bill_of_landing_sub_non_inventories_imps.imp_remarks'
            )
            ->join('bill_of_landing_sub_non_inventories', 'bill_of_landing_sub_non_inventories_imps.blsn_invent_id', '=', 'bill_of_landing_sub_non_inventories_imps.id')
            ->paginate(50);

        return $billoflandingsubnoninventoriesimps;
    }

    public function showById(Request $request)
    {
        $id = $request->id;
        $billoflandingsubnoninventoriesimps = DB::table('bill_of_landing_sub_non_inventories_imps')
            ->select(
                'bill_of_landing_sub_non_inventories_imps.id',
                'bill_of_landing_sub_non_inventories_imps.blsn_invent_id',
                'bill_of_landing_sub_non_inventories_imps.imp_freight_charge_in',
                'bill_of_landing_sub_non_inventories_imps.imp_doc_fee',
                'bill_of_landing_sub_non_inventories_imps.imp_thc_phc',
                'bill_of_landing_sub_non_inventories_imps.exp_other_recovery',
                'bill_of_landing_sub_non_inventories_imps.exp_other_recovery_remarks',
                'bill_of_landing_sub_non_inventories_imps.exp_total_in',
                'bill_of_landing_sub_non_inventories_imps.exp_agent_comm',
                'bill_of_landing_sub_non_inventories_imps.exp_phc',
                'bill_of_landing_sub_non_inventories_imps.imp_doc_charges',
                'bill_of_landing_sub_non_inventories_imps.imp_freight_charge_ex',
                'bill_of_landing_sub_non_inventories_imps.imp_dc_surcharge',
                'bill_of_landing_sub_non_inventories_imps.imp_other_expenses',
                'bill_of_landing_sub_non_inventories_imps.imp_other_expenses_remarks',
                'bill_of_landing_sub_non_inventories_imps.imp_total_ex',
                'bill_of_landing_sub_non_inventories_imps.imp_final_amount',
                'bill_of_landing_sub_non_inventories_imps.imp_remarks'
            )
            ->join('bill_of_landing_sub_non_inventories', 'bill_of_landing_sub_non_inventories_imps.blsn_invent_id', '=', 'bill_of_landing_sub_non_inventories_imps.id')
            ->where('bill_of_landing_sub_non_inventories.id', '=', $id)
            ->get();

        return $billoflandingsubnoninventoriesimps;
    }

    public function showBySearch(Request $request)
    {
        // $query = "";

        // if ($request->get('query')) {
        //     $query = $request->get('query');

        //     $arrivalnoticecontainers = DB::table('arrival_notice_containers')
        //     ->select(
        //         'arrival_notice_containers.id',
        //         'arrival_notice_containers.arrival_notice_id',
        //         'arrival_notice_containers.equipment_id',
        //         'arrival_notice_containers.seal_no',
        //         'arrival_notice_containers.marks',
        //         'arrival_notice_containers.type_of_unit_id',
        //         'arrival_noticies.arrival_notice_no',
        //         'equipments.equipment_number',
        //         'type_of_units.type_of_unit',
        //     )
        //     ->join('arrival_noticies', 'arrival_notice_containers.arrival_notice_id', '=', 'arrival_noticies.id')
        //     ->join('equipments', 'arrival_notice_containers.equipment_id', '=', 'equipments.id')
        //     ->join('type_of_units', 'arrival_notice_containers.type_of_unit_id', '=', 'type_of_units.id')
        //         ->where(function ($q) use ($query) {
        //             $q->where('arrival_noticies.arrival_notice_no', 'like', '%' . $query . '%')
        //                 ->orWhere('arrival_noticies.seal_no', 'like', '%' . $query . '%')
        //                 ->orWhere('equipments.equipment_number', 'like', '%' . $query . '%')
        //                 ->orWhere('type_of_units.type_of_unit', 'like', '%' . $query . '%');
        //         })
        //         ->get();
        // }

        // return $arrivalnoticecontainers;
    }

    public function store(Request $request)
    {
        $id = $request->id;

        if ($id == 0) { // create

            $blsnoninventoriesimps = new bill_of_landing_sub_non_inventories_imps();
        } else { // update

            $blsnoninventoriesimps = bill_of_landing_sub_non_inventories_imps::find($id);
        }


        try {
            $blsnoninventoriesimps->blsn_invent_id = $request->blsn_invent_id;
            $blsnoninventoriesimps->imp_freight_charge_in = $request->imp_freight_charge_in;
            $blsnoninventoriesimps->imp_doc_fee = $request->imp_doc_fee;
            $blsnoninventoriesimps->imp_thc_phc = $request->imp_thc_phc;
            $blsnoninventoriesimps->exp_other_recovery = $request->exp_other_recovery;
            $blsnoninventoriesimps->exp_other_recovery_remarks = $request->exp_other_recovery_remarks;
            $blsnoninventoriesimps->exp_total_in = $request->exp_total_in;
            $blsnoninventoriesimps->exp_agent_comm = $request->exp_agent_comm;
            $blsnoninventoriesimps->exp_phc = $request->exp_phc;
            $blsnoninventoriesimps->imp_doc_charges = $request->imp_doc_charges;
            $blsnoninventoriesimps->imp_freight_charge_ex = $request->imp_freight_charge_ex;
            $blsnoninventoriesimps->imp_dc_surcharge = $request->imp_dc_surcharge;
            $blsnoninventoriesimps->imp_other_expenses = $request->imp_other_expenses;
            $blsnoninventoriesimps->imp_other_expenses_remarks = $request->imp_other_expenses_remarks;
            $blsnoninventoriesimps->imp_total_ex = $request->imp_total_ex;
            $blsnoninventoriesimps->imp_final_amount = $request->imp_final_amount;
            $blsnoninventoriesimps->imp_remarks = $request->imp_remarks;
            $blsnoninventoriesimps->imp_created_by = $request->imp_created_by;
            $blsnoninventoriesimps->imp_created_date = $request->imp_created_date;
            $blsnoninventoriesimps->imp_approved_by = $request->imp_approved_by;
            $blsnoninventoriesimps->imp_approved_date = $request->imp_approved_date;
            $blsnoninventoriesimps->save();

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
