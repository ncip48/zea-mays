<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DesaController extends Controller
{
    public function customResponse($success, $msg, $data = [], $error = null)
    {
        $res = [
            'success' => $success,
            'message' => $msg,
            'data' => $data,
            'error' => $error
        ];
        return response()->json($res);
    }

    public function index()
    {
        $desas = Desa::all();
        return $this->customResponse(true, 'Desa berhasil diambil', $desas);
    }

    public function detail($id)
    {
        $desas = Desa::where('id', $id)->get();
        return $this->customResponse(true, 'Detail desa berhasil diambil', $desas);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'district_code' => 'required',
            'name' => 'required',
            'meta' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->customResponse(false, 'Gagal menambahkan desa', [], $validator->errors());
        }

        $desa = Desa::create($request->all());

        return $this->customResponse(true, 'Desa berhasil ditambahkan', $desa);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'district_code' => 'required',
            'name' => 'required',
            'meta' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->customResponse(false, 'Gagal update desa', [], $validator->errors());
        }

        $desa = Desa::find($id);
        $desa->update($request->all());

        return $this->customResponse(true, 'Desa berhasil diupdate', $desa);
    }

    public function delete($id)
    {
        $desa = Desa::find($id);

        if (!$desa) {
            return $this->customResponse(false, 'Desa tidak ditemukan', []);
        }

        $desa->delete();

        return $this->customResponse(true, 'Desa berhasil dihapus', []);
    }
}
