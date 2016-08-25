<?php

namespace app\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    public $basic_return = array('sta' => '0','msg'=>'服务器忙，请稍后再试。','code'=>'','data'=>'' );
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
}
