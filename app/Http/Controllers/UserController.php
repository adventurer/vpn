<?php
namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Request;
use Session;

/**
 *
 */
class UserController extends Controller
{
    public function login()
    {
        $name = Request::input('name')?Request::input('name'):'';
        $pwd = Request::input('pwd')?Request::input('pwd'):'';
        $user = DB::select("select * from radcheck where username = ? and value = ?", [$name, $pwd]);
        if (!empty($user)) {
            Session::put('name', $name);
            return redirect('home');
        }
        return redirect('/');
    }

    public function reg()
    {
        $name = Request::input('name')?Request::input('name'):'';
        $pwd = Request::input('pwd')?Request::input('pwd'):'';
        $code = Request::input('code')?Request::input('code'):'';
        $flag = DB::select("select * from vcode where info = ?", [$code]);
        $now = date('Y-m-d H:i:s');
        $info = '';
        if (!empty($flag)) {
            try {
              DB::transaction(function() use ($name,$pwd,$code,$now)
              {
                  $flag = DB::insert("insert into radcheck (username,attribute,op,value) values (?,?,?,?)", [$name, 'User-Password', ':=', $pwd ]);
                  $flag = DB::update("update vcode set username = '?' , updated_at = '?',status = 1 where info = '?'", [$name,$now,$code]);
              });
            } catch (Exception $e) {
              $info = '数据库发生错乱，O(∩_∩)O';
              return view('index',['info'=>$info]);
            }
            Session::put('name', $name);
            return redirect('home');
        }else{
          $info = '少年，邀请码不正哟，O(∩_∩)O';
        }
        return view('index',['info'=>$info]);
    }

    public function logout()
    {
        Session::forget('name');
        return redirect('/');
    }
}
