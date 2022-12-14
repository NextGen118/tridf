<?php

namespace App\Http\Controllers;

use App\Models\voucher_payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class VoucherPaymentsController extends Controller
{
    public function index()
    {
        $voucherpayments = DB::table('voucher_payments')
            ->select(
                'voucher_payments.id',
                'voucher_payments.voucher_id',
                'voucher_payments.pay_type',
                'voucher_payments.cheque_no',
                'voucher_payments.cheque_date',
                'voucher_payments.current_bal',
                'voucher_payments.paying_amount',
                'voucher_payments.paying_local',
                'vouchers.voucher_no'
            )
            ->join('vouchers', 'voucher_payments.voucher_id', '=', 'vouchers.id')
            ->paginate(50);

        return $voucherpayments;
    }

    public function showById(Request $request)
    {
        $id = $request->id;
        $voucherpayments = DB::table('voucher_payments')
            ->select(
                'voucher_payments.id',
                'voucher_payments.voucher_id',
                'voucher_payments.pay_type',
                'voucher_payments.cheque_no',
                'voucher_payments.cheque_date',
                'voucher_payments.current_bal',
                'voucher_payments.paying_amount',
                'voucher_payments.paying_local',
                'vouchers.voucher_no'
            )
            ->join('vouchers', 'voucher_payments.voucher_id', '=', 'vouchers.id')
            ->where('vouchers.id', '=', $id)
            ->get();

        return $voucherpayments;
    }

    public function showBySearch(Request $request)
    {
        $query = "";

        if ($request->get('query')) {
            $query = $request->get('query');

            $voucherpayments = DB::table('voucher_payments')
            ->select(
                'voucher_payments.id',
                'voucher_payments.voucher_id',
                'voucher_payments.pay_type',
                'voucher_payments.cheque_no',
                'voucher_payments.cheque_date',
                'voucher_payments.current_bal',
                'voucher_payments.paying_amount',
                'voucher_payments.paying_local',
                'vouchers.voucher_no'
            )
            ->join('vouchers', 'voucher_payments.voucher_id', '=', 'vouchers.id')
                ->where(function ($q) use ($query) {
                    $q->where('voucher_payments.pay_type', 'like', '%' . $query . '%')
                        ->orWhere('voucher_payments.cheque_no', 'like', '%' . $query . '%')
                        ->orWhere('voucher_payments.cheque_date', 'like', '%' . $query . '%')
                        ->orWhere('vouchers.voucher_no', 'like', '%' . $query . '%');
                })
                ->get();
        }

        return $voucherpayments;
    }

    public function store(Request $request)
    {
        $id = $request->id;

        if ($id == 0) { // create

            $this->validate($request, [
                'cheque_no' => 'required|unique:voucher_payments,cheque_no',
            ]);


            $voucherpayment = new voucher_payments();
        } else { // update

            $this->validate($request, [
                'cheque_no' => 'required|unique:voucher_payments,cheque_no,' . $id
            ]);

            $voucherpayment = voucher_payments::find($id);
        }

        try {
            $voucherpayment->voucher_id = $request->voucher_id;
            $voucherpayment->pay_type = $request->pay_type;
            $voucherpayment->cheque_no = $request->cheque_no;
            $voucherpayment->cheque_date = $request->cheque_date;
            $voucherpayment->current_bal = $request->current_bal;
            $voucherpayment->paying_amount = $request->paying_amount;
            $voucherpayment->paying_local = $request->paying_local;
            $voucherpayment->save();

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
