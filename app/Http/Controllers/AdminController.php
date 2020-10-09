<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AdminController extends Controller
{


    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.admin');
    }

    // public function selectData()
    // {
       
    //     return view('admin.admin',['$data' => $data]);
    // }
}
