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
        }else{
          $info = '少年，用户名或密码错哟，O(∩_∩)O';
          return view('index',['info'=>$info]);
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
        $user =DB::select("select * from radcheck where username = ?",[$name]);
        if (!empty($user)) {
          $info = '少年，用户名已存在哟，O(∩_∩)O';
          return view('index',['info'=>$info]);
        }

        if (!empty($flag)) {
              $flag = DB::insert("insert into radcheck (username,attribute,op,value) values (?,?,?,?)", [$name, 'User-Password', ':=', $pwd ]);
              if ($flag) {
                $flag1 = DB::update("update vcode set username = ?, updated_at = ?,status = 1 where info = ?", [$name,$now,$code]);
              }
            Session::put('name', $name);
            return redirect('home');
        }else{
          $info = '少年，邀请码不对哟，O(∩_∩)O';
        }
        return view('index',['info'=>$info]);
    }

    public function logout()
    {
        Session::forget('name');
        return redirect('/');
    }
}
