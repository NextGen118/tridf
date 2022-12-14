<?php

namespace App\Http\Controllers;

use App\Models\default_values;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DefaultValuesController extends Controller
{
    public function index()
    {
        $defaultvalues = DB::table('default_values')
            ->select(
                'default_values.id',
                'default_values.category',
                'default_values.c_value'
            )
            ->paginate(50);

        return $defaultvalues;
    }

    public function showBySearch(Request $request)
    {
        $query = "";

        if ($request->get('query')) {
            $query = $request->get('query');

            $defaultvalues = DB::table('default_values')
            ->select(
                'default_values.id',
                'default_values.category',
                'default_values.c_value'
            )
                ->where(function ($q) use ($query) {
                    $q->where('default_values.category', 'like', '%' . $query . '%')
                    ->orWhere('default_values.c_value', 'like', '%' . $query . '%');
                })
                ->get();
        }

        return $defaultvalues;
    }

    public function store(Request $request)
    {
        $id = $request->id;

        if ($id == 0) { // create

            $this->validate($request, [
                'category' => 'required|unique:default_values,category,',

            ]);

            $defaultvalue = new default_values();
        } else { // update

            $this->validate($request, [
                'category' => 'required|unique:default_values,category,' . $id,
            ]);

            $defaultvalue = default_values::find($id);
        }

        try {
            $defaultvalue->category = $request->category;
            $defaultvalue->c_value = $request->c_value;
            $defaultvalue->save();

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
