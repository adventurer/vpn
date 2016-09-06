@extends('layout.common')
@section('content')

<div class="row">
<div class="col-md-1"></div>
<div class="panel col-md-10">
  <div class="panel-body">
    <p>连接方式：pptp</p>
    <p>连接地址：106.186.17.65</p>
    <p>用户名：<?php echo Session::get('name');?></p>
    <p>密码：我也不知道你写了啥</p>
  </div>
</div>
<div class="col-md-1"></div>
</div>


<div class="row">
<div class="col-md-1"></div>
<div class="panel col-md-10">
<div class="panel-heading border"> 消耗 </div>
<div class="panel-body">
<div class="progress mb25">
  <div class="progress-bar progress-bar-danger animation--done" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" data-percent="90" style="width: 90%;"> </div>
</div>
<p class="pull-right">流入{{number_format($data[0]->in/1020/1024,2)}}M/流出{{number_format($data[0]->out/1024/1024,2)}}M/总共:{{number_format(($data[0]->in+$data[0]->out)/1024/1024,2)}}M</p>
</div>
</div>
<div class="col-md-1"></div>
</div>



@stop
