<?php

namespace App\Http\Controllers;

use App\Models\arrival_notice_charges;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ArrivalNoticeChargesController extends Controller
{
    public function index()
    {
        $arrivalnoticechargess = DB::table('arrivalnoticechargess')
            ->select(
                'arrival_notice_charges.id',
                'arrival_notice_charges.arrival_notice_id',
                'arrival_notice_charges.description',
                'arrival_notice_charges.unit',
                'arrival_notice_charges.unit_cost',
                'arrival_notice_charges.unit_charge',
                'arrival_notice_charges.amount',
                'arrival_notice_charges.currency_id',
                'arrival_notice_charges.currency_id_mycurrency',
                'arrival_notice_charges.exchange_rate',
                'arrival_notice_charges.amount_in',
                'arrival_notice_charges.tax_description',
                'arrival_notice_charges.tax',
                'arrival_notice_charges.tax_amount',
                'arrival_notice_charges.amount_final',
                'arrival_notice_charges.payed',
                'arrival_notice_charges.total_cost',
                'arrival_notice_charges.total_cost_in',
                'arrival_notice_charges.profit',
                'arrival_notice_charges.profit_in',
                'arrival_notices.arrival_notice_no',
                'currencies.currency_code',
                'currencies.currency_name',
                'mycurrency.currency_code',
                'mycurrency.currency_name',
            )
            ->join('arrival_notices', 'arrivalnoticechargess.arrival_notice_id', '=', 'arrival_notices.id')
            ->join('currencies', 'arrivalnoticechargess.currency_id', '=', 'currencies.id')
            ->join('currencies as mycurrency', 'arrivalnoticechargess.currency_id_mycurrency', '=', 'mycurrency.id')
            ->get();

        return $arrivalnoticechargess;
    }

    public function showById(Request $request)
    {
        $id = $request->id;
        $arrivalnoticechargess = DB::table('arrivalnoticechargess')
            ->select(
                'arrival_notice_charges.id',
                'arrival_notice_charges.arrival_notice_id',
                'arrival_notice_charges.description',
                'arrival_notice_charges.unit',
                'arrival_notice_charges.unit_cost',
                'arrival_notice_charges.unit_charge',
                'arrival_notice_charges.amount',
                'arrival_notice_charges.currency_id',
                'arrival_notice_charges.currency_id_mycurrency',
                'arrival_notice_charges.exchange_rate',
                'arrival_notice_charges.amount_in',
                'arrival_notice_charges.tax_description',
                'arrival_notice_charges.tax',
                'arrival_notice_charges.tax_amount',
                'arrival_notice_charges.amount_final',
                'arrival_notice_charges.payed',
                'arrival_notice_charges.total_cost',
                'arrival_notice_charges.total_cost_in',
                'arrival_notice_charges.profit',
                'arrival_notice_charges.profit_in',
                'arrival_notices.arrival_notice_no',
                'currencies.currency_code',
                'currencies.currency_name',
                'mycurrency.currency_code',
                'mycurrency.currency_name',
            )
            ->join('arrival_notices', 'arrivalnoticechargess.arrival_notice_id', '=', 'arrival_notices.id')
            ->join('currencies', 'arrivalnoticechargess.currency_id', '=', 'currencies.id')
            ->join('currencies as mycurrency', 'arrivalnoticechargess.currency_id_mycurrency', '=', 'mycurrency.id')
            ->where('arrival_notices.id', '=', $id)
            ->get();

        return $arrivalnoticechargess;
    }

    public function store(Request $request)
    {
        $id = $request->id;


        $arrivalnoticecharges = new arrival_notice_charges();


        try {
            $arrivalnoticecharges->arrival_notice_id = $request->arrival_notice_id;
            $arrivalnoticecharges->description = $request->description;
            $arrivalnoticecharges->unit = $request->unit;
            $arrivalnoticecharges->unit_cost = $request->unit_cost;
            $arrivalnoticecharges->unit_charge = $request->unit_charge;
            $arrivalnoticecharges->amount = $request->amount;
            $arrivalnoticecharges->currency_id = $request->currency_id;
            $arrivalnoticecharges->currency_id_mycurrency = $request->currency_id_mycurrency;
            $arrivalnoticecharges->exchange_rate = $request->exchange_rate;
            $arrivalnoticecharges->amount_in = $request->amount_in;
            $arrivalnoticecharges->tax_description = $request->tax_description;
            $arrivalnoticecharges->tax = $request->tax;
            $arrivalnoticecharges->tax_amount = $request->tax_amount;
            $arrivalnoticecharges->amount_final = $request->amount_final;
            $arrivalnoticecharges->payed = $request->payed;
            $arrivalnoticecharges->total_cost = $request->total_cost;
            $arrivalnoticecharges->total_cost_in = $request->total_cost_in;
            $arrivalnoticecharges->profit = $request->profit;
            $arrivalnoticecharges->profit_in = $request->profit;
            $arrivalnoticecharges->save();

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