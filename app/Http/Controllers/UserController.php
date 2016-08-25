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
        if ($code) {
            $flag = DB::insert("insert into radcheck (username,attribute,op,value) values (?,?,?,?)", [$name, 'User-Password', ':=', $pwd ]);
            Session::put('name', $name);
            return redirect('home');
        }
        return redirect('/');
    }

    public function logout()
    {
        Session::forget('name');
        return redirect('/');
    }
}
