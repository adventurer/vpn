<?php
namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Request;
use Session;

/**
 *
 */
class AdminController extends Controller
{
    public function index()
    {
        $name = Session::get('name');
        if ($name = 'wuyang') {
            $ret = DB::select("select username,sum(acctinputoctets)/1024/1024 'in' ,sum(acctoutputoctets)/1024/1024 'out',sum(acctinputoctets)/1024/1024+sum(acctoutputoctets)/1024/1024 total,sum(acctsessiontime) alltime,max(acctstoptime) near from radacct group by username order by near desc limit 100");
            $data = array('data' => $ret);
            return view('admin', $data);
        } else {
            return redirect('/');
        }
    }

    public function ios(){
      $name = Session::get('name');
      $ret = DB::select("select username,sum(acctinputoctets)/1024/1024 'in' ,sum(acctoutputoctets)/1024/1024 'out',sum(acctinputoctets)/1024/1024+sum(acctoutputoctets)/1024/1024 total,sum(acctsessiontime) alltime,max(acctstoptime) near from radacct group by username order by total desc limit 100");
      $data = array('data' => $ret);
      echo json_encode($data);
    }
}
