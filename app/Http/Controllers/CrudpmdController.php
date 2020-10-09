<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudpmdController extends Controller
{
    public function index()
    {
        return view('users.crudpmd');
    }

    public function _Validation(Request $request)
    {
        $validation = $request->validate(
            [
            
                'provinsi' => 'required | min : 2 | max : 30',
                'kabupaten' => 'required | min : 2 | max : 30',
                'kecamatan' => 'required | min : 2 | max : 30',
                'desa' => 'required | min : 1 | max : 30',
                'kelurahan' => 'required | min : 1 | max : 30',
                'nm_posyandu' => 'required | min : 5 | max : 40',
                'stara_posyandu' => 'required | min : 5 | max : 40',
                'alamat_posyandu' => 'required | min : 5 | max : 40',
                'keterangan' => 'required | min : 5 | max : 40'
            ],
            [
            
                'provinsi.required' => 'Data tidak boleh kosong',
                'kabupaten.required' => 'Data tidak boleh kosong',
                'kecamatan.required' => 'Data tidak boleh kosong',
                'desa.required' => 'Data tidak boleh kosong',
                'kelurahan.required' => 'Data tidak boleh kosong',
                'nm_posyandu.required' => 'Data tidak boleh kosong',
                'stara_posyandu.required' => 'Data tidak boleh kosong',
                'alamat_posyandu.required' => 'Data tidak boleh kosong',
                'keterangan.required' => 'Data tidak boleh kosong'
            ]
            );
    }

    public function ViewData()
    {
        $datakab = DB::table('kabupaten')->get();
        $dataprov = DB::table('provinsi')->get();
        $datakec = DB::table('kecamatan')->get();
        return view('users.crudpmd-tambahdata',['datakab' => $datakab, 'dataprov' => $dataprov, 'datakec' => $datakec]);
    }

    public function TambahData(Request $request)
    {
        $this->_Validation($request);
        $data = DB::insert('insert into data (id, provinsi, kabupaten, kecamatan,desa,kelurahan,nm_posyandu,stara_posyandu,alamat_posyandu,keterangan) values (?, ?,?,?,?,?,?,?,?,?)',
        [
            $request->id =NULL, 
            $request->provinsi,
            $request->kabupaten,
            $request->kecamatan,
            $request->desa,
            $request->kelurahan,
            $request->nm_posyandu,
            $request->stara_posyandu,
            $request->alamat_posyandu,
            $request->keterangan
        ]);

        return redirect()->route('crudpmd.viewdata')->with('message','Data tersimpan');
    }

    // public function crudpmddatakec($id_kec)
    // {
    //     echo json_encode(DB::table('kecamatan')->where('id_kec', $id_kec)->get());
    // }

    public function Data()
    {
        return view('admin.datauser');
    }


}
