<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class CrudController extends Controller
{
    public function index ()
    {
        $users = DB::table('users')->paginate(5);
        return view('admin.crud',['users' => $users]);
    }

    public function tambah()
    {
        return view('admin.crud-tambahdata');
    }

    private function _validation(Request $request)
    {
        $validation = $request->validate([
            
            'name' => 'required | min : 5 | max : 30',
            'email' => 'required | email',
            'password' => 'required | min : 3'
    
            ],
            [
             'name.required' => 'minimal 5 karakter',
             'email.required' => 'di tulis sesuai format',
             'password.required' => 'minmal 3 karakter'
            ]
        );
    }

    public function simpan( Request $request)
    {
      $this->_validation($request);
      DB::insert('insert into users (name, email, role, password) values (?, ?, ?, ?)', [$request->name, $request->email, $request->role = 2,  Hash::make($request->password)]);
      return redirect()->route('crud')->with('message', 'data berhasil di simpan');
    // dd($request->all());
    }


    //methode delete data
    public function delete($id)
    {
        DB::table('users')->where('id',$id)->delete();
        return redirect()->back()->with('message','data berhasil di hapus');
    }

    //methode edit data
    public function edit($id)
    {
        $datauser = DB::table('users')->where('id',$id)->first();
        return view('admin.crud-editdata',['data' => $datauser]);
    }

    public function update(Request $request, $id)
    {
        $this->_validation($request);
        DB::table('users')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('crud')->with('message','data berhasil di update');
    }
    
}
