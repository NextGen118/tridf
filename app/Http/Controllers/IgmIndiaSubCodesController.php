<?php

namespace App\Http\Controllers;

use App\Models\igm_india_sub_codes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class IgmIndiaSubCodesController extends Controller
{
    public function index()
    {
        $igm_india_sub_codes = DB::table('igm_india_sub_codes')
            ->select(
                'igm_india_sub_codes.id',
                'igm_india_sub_codes.port_name',
                'igm_india_sub_codes.port_code',
                'igm_india_sub_codes.sub_code'
            )
            ->paginate(50);

        return $igm_india_sub_codes;
    }

    public function showById(Request $request)
    {
        $id = $request->id;
        $igm_india_sub_codes = DB::table('igm_india_sub_codes')
            ->select(
                'igm_india_sub_codes.id',
                'igm_india_sub_codes.port_name',
                'igm_india_sub_codes.port_code',
                'igm_india_sub_codes.sub_code'
            )
            ->where('igm_india_sub_codes.id', '=', $id)
            ->get();

        return $igm_india_sub_codes;
    }

    public function showBySearch(Request $request)
    {
        $query = "";

        if ($request->get('query')) {
            $query = $request->get('query');

            $igm_india_sub_codes = DB::table('igm_india_sub_codes')
            ->select(
                'igm_india_sub_codes.id',
                'igm_india_sub_codes.port_name',
                'igm_india_sub_codes.port_code',
                'igm_india_sub_codes.sub_code'
            )
            ->where(function ($q) use ($query) {
                $q->where('igm_india_sub_codes.port_name', 'like', '%' . $query . '%')
                    ->orWhere('igm_india_sub_codes.port_code', 'like', '%' . $query . '%')
                    ->orWhere('igm_india_sub_codes.sub_code', 'like', '%' . $query . '%');
            })
                ->get();
        }

        return $igm_india_sub_codes;
    }

    public function store(Request $request)
    {
        $id = $request->id;

        if ($id == 0) { // create

            $igm_india_sub_codes = new igm_india_sub_codes();
        } else { // update

            $igm_india_sub_codes = igm_india_sub_codes::find($id);
        }

        try {
            $igm_india_sub_codes->port_name = $request->port_name;
            $igm_india_sub_codes->port_code = $request->port_code;
            $igm_india_sub_codes->sub_code = $request->sub_code;
            $igm_india_sub_codes->save();


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
