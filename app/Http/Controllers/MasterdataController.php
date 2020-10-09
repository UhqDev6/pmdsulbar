<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use PhpOffice\PhpWord\TemplateProcessor;
use PDF;
class MasterdataController extends Controller
{
    public function index()
    {
        $provinsi = DB::table('provinsi')->paginate(3);
        $kabupaten = DB::table('kabupaten')->paginate(3);
        $kecamatan = DB::table('kecamatan')->paginate(3);
        $data = DB::table('data')->paginate(10);
        return view('admin.masterdata',['provinsi' => $provinsi, 'kabupaten' => $kabupaten, 'kecamatan' => $kecamatan, 'data' => $data]);

      

    }

    public function indexuser()
    {
        $data = DB::table('data')->paginate(10);
        return view('admin.datauser',['data' => $data]);
    }

    public function cetak()
    {
        $data = DB::table('data')->get();
        // foreach ($data as  $datauser) {
        // $templateProcessor = new TemplateProcessor('word-template/data.docx');
        //     $templateProcessor->setValue('provinsi',$datauser->provinsi);
        //     $templateProcessor->setValue('kabupaten',$datauser->kabupaten);
        //     $templateProcessor->setValue('kecamatan',$datauser->kecamatan);
        //     $templateProcessor->setValue('desa',$datauser->desa);
        //     $templateProcessor->setValue('kelurahan',$datauser->kelurahan);
        //     $templateProcessor->setValue('nm_posyandu',$datauser->nm_posyandu);
        //     $templateProcessor->setValue('stara_posyandu',$datauser->stara_posyandu);
        //     $templateProcessor->setValue('keterangan',$datauser->keterangan);
        //     $templateProcessor->saveAs('laporan'.'.docx');
        //     return response()->download('laporan'.'.docx');
        // }
       
        $pdf = PDF::loadview('admin.datauser',['data' => $data])->setPaper('A4', 'potrait' );
        return $pdf->download('laporan');

    }

    public function tambahData()
    {
        return view('admin.masterdata-tambahdata');
    }

    // VALIDATION 

    public function _ValidationProv(Request $request)
    {
        $validation = $request->validate([
            
            'id_prov' => 'required | min : 3 | max : 30',
            'name' =>  'required | min : 5 | max : 30',
    
            ],
            [
             'id_prov.required' => 'minimal 5 karakter',
             'name.required' => 'minimal 5 karakter',
            ]
        );

    }

    
    public function _ValidationKab(Request $request)
    {
        $validation = $request->validate([
            
            'id_kab' => 'required | min : 3 | max : 30',
            'id_prov' => 'required | min : 3 | max : 30',
            'name' =>  'required | min : 5 | max : 30',
    
            ],
            [
             'id_kab.required' => 'minimal 5 karakter',
             'id_prov.required' => 'minimal 5 karakter',
             'name.required' => 'minimal 5 karakter',
            ]
        );

    }

    public function _ValidationKec(Request $request)
    {
        $validation = $request->validate
        (
            [
                'id_kec' => 'required | min : 3 | max : 30',
                'id_kab' => 'required | min : 3 | max : 30',
                'name' => 'required | min : 5 | max : 30,'
            ],
            [
                'id_kec.required' => 'Minimal 3 karakter',
                'id_kab.required' => 'Minimal 3 karakter',
                'name.required' => 'Minimal 5 karakter',
            ]
        );
    }



    // CRUD DATA PROVINSI

    public function SimpanDataProv(Request $request)
    {

        $this->_ValidationProv($request);

        DB::insert('insert into provinsi (id_prov, name) values (?, ?)', [$request->id_prov, $request->name ]);
        return redirect()->route('masterdata.tambahData')->with('message', 'Data berhasil tersimpan');
    }

    public function DeleteProv($id_prov)
    {
        DB::table('provinsi')->where('id_prov', $id_prov)->delete();
        return redirect()->back()->with('message','Data berhasil di hapus');
    }

    public function EditProv($id_prov)
    {
        // $datauser = DB::table('users')->where('id',$id)->first();
        // return view('admin.crud-editdata',['data' => $datauser]);
        $dataprov = DB::table('provinsi')->where('id_prov', $id_prov)->first();
        return view('admin.masterdata-editdataprov',['dataprov' => $dataprov]);
    }

    public function UpdateProv(Request $request, $id_prov)
    {
        $this->_ValidationProv($request);
        DB::table('provinsi')->where('id_prov',$id_prov)->update([
            'id_prov' => $request->id_prov,
            'name' => $request->name

        ]);
        return redirect()->route('masterdata')->with('message','Data berhasil di edit');

    }


    // CRUD DATA KABUPATEN

    public function SimpanDataKab(Request $request)
    {
       $this->_ValidationKab($request);
        DB::insert('insert into kabupaten (id_kab, id_prov, name) values (?, ?, ?)', [$request->id_kab, $request->id_prov, $request->name]);
        return redirect()->route('masterdata.tambahData')->with('message1','Data berhasil di simpan');

    }

    public function DeleteKab($id_kab)
    {
        DB::table('kabupaten')->where('id_kab', $id_kab)->delete();
        return redirect()->back()->with('message1','Data berhasil di hapus');
    }

    public function EditKab($id_kab)
    {
        $datakab = DB::table('kabupaten')->where('id_kab',$id_kab)->first();
        return view('admin.masterdata-editdatakab',['datakab' => $datakab]);
    }

    public function UpdateKab(Request $request, $id_kab)
    {
        $this->_ValidationKab($request);
        DB::table('kabupaten')->where('id_kab',$id_kab)->update([
            'id_kab' => $request->id_kab,
            'id_prov' => $request->id_prov,
            'name' => $request->name
        ]);
        return redirect()->route('masterdata')->with('message1','Data berhasil di edit');
    }


    // CRUD DATA KECAMATAN

    public function SimpanDataKec(Request $request)
    {
      
        $this->_ValidationKec($request);
        DB::insert('insert into kecamatan (id_kec, id_kab, name) values (?, ?, ?)', [$request->id_kec, $request->id_kab, $request->name]);
        return redirect()->route('masterdata.tambahData')->with('message2','Data berhasil di simpan');
    }

    public function DeleteKec($id_kec)
    {
        DB::table('kecamatan')->where('id_kec', $id_kec)->delete();
        return redirect()->back()->with('message2','Data berhasil di hapus');
    }

    public function EditKec($id_kec)
    {
        $datakec = DB::table('kecamatan')->where('id_kec',$id_kec)->first();
        return view('admin.masterdata-editdatakec',['datakec' => $datakec]);
    }

    public function UpdateKec(Request $request, $id_kec)
    {
        $this->_ValidationKec($request);
        DB::table('kecamatan')->where('id_kec', $id_kec)->update([
            'id_kec' => $request->id_kec,
            'id_kab' => $request->id_kab,
            'name' => $request->name
        ]);

        return redirect()->route('masterdata')->with('message2','Data berhasil di edit');
    }
}
