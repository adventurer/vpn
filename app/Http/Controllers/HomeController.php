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
            $acct = DB::table('radacct')->where('username',$name)->orderby('radacctid','desc')->paginate(15);
            $regtime = @DB::table('vcode')->where('username',$name)->get()[0];
            $data = array('data' => $ret,'acct'=>$acct,'regtime'=>$regtime);
            return view('home', $data);
        } else {
            return redirect('/');
        }
    }
}
