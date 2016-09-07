<?php
namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Request;
use Session;

/**
 *
 */
class VcodeController extends Controller
{
    function __construct(){
      $name = Session::get('name');
      if ($name!='wuyang') {
        die('你进不来');
      }
    }

    public function index()
    {
      $status = Request::input('status');
      $vcodes = DB::table('vcode')->where('status','=',$status)->orderby('updated_at','desc')->paginate(15);
      return view('vcode',['vcodes'=>$vcodes]);
    }

    public function generation(){
      for ($i=0; $i < 10 ; $i++) {
        $id = DB::table('vcode')->insertGetId(
            ['info' => md5(microtime()), 'status' => 0,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')]
        );
      }
      return redirect('/vcode');
    }
}
