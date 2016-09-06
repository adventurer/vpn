<?php
namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Request;
use Session;

/**
 *
 */
class HomeController extends Controller
{
    public function index()
    {
        $name =  Session::get('name');
        if ($name) {
            $ret = DB::select("select sum(acctinputoctets) 'in' ,sum(acctoutputoctets) 'out'  from radacct where username = ?", [$name]);
            $data = array('data' => $ret);
            return view('home', $data);
        } else {
            return redirect('/');
        }
    }
}

