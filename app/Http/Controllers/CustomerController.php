<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
class CustomerController extends Controller
{
    //
    public function index()
    {
        $cust =Customer::orderBy('id','asc')->get();
        return view('backend.V_customer.index',[
            'judul'=>'Data Customer',
            'cust'=>$cust,
        ]);
    }
    public function log()
    {
        return view('backend.V_customer.log_activity',[
            'judul'=>'Customer Activity Log',
        ]);
    }
}
