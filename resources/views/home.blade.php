@extends('layout.common')
@section('content')

<div class="row">
<div class="col-md-1"></div>
<div class="panel col-md-10">
  <div class="panel-body">
    <p>连接方式：pptp</p>
    <p>连接地址：45.32.36.201</p>
    <p>用户名：<?php echo Session::get('name');?></p>
    <p>密码：<a href="javascript:void(0);">修改密码（doing）</a></p>
    <p>有效时间：{{isset($regtime)?$regtime->updated_at:'default'}}-{{isset($regtime)?date('Y-m-d h:i:s',strtotime($regtime->updated_at.' +1 year')):'default'}}</p>
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

<div class="row">
<div class="col-md-1"></div>
<div class="panel col-md-10">
    <div class="mb25">
      <div class="panel-body table-responsive">
        <table class="table mb0">
          <thead>
            <tr>
              <td>#</td>
              <td>name</td>
              <td>开始时间</td>
              <td>结束时间</td>
              <td>上传流量</td>
              <td>下载流量</td>
              <td>连接时间</td>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($acct as $key => $v): ?>
              <tr>
                <td>{{$key}}</td>
                <td>{{$v->username}}</td>
                <td>{{$v->acctstarttime}}</td>
                <td>{{$v->acctstoptime}}</td>
                <td>{{number_format($v->acctinputoctets/1024/1024)}}M</td>
                <td>{{number_format($v->acctoutputoctets/1024/1024)}}M</td>
                <td>{{number_format($v->acctsessiontime/60)}}min</td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
</div>
<div class="col-md-1"></div>
</div>

<div class="row">
  <div class="container">
    <div class="col-md-12">
      <?php echo $acct->render(); ?>
    </div>
  </div>
</div>


@stop
