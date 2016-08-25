@extends('layout.common')
@section('content')
<div class="row">
  <div class="row">
  <div class="col-md-6">
    <div class="btn-group btn-group-justified">
      <a class="btn btn-primary" role="button" onclick="change(1);">注册</a>
      <a class="btn btn-success" role="button" onclick="change(2);">登录</a>
    </div>
  </div>
</div>



  <div id="div1" class="col-md-6 panel">
    <div class="panel-heading border"> 注册 </div>
    <div class="panel-body">
      <form action="/user/reg" class="form-horizontal bordered-group" role="form">
        <div class="form-group">
          <label class="col-sm-2 control-label">用户名：</label>
          <div class="col-sm-10">
            <input name="name" class="form-control" Placeholder="4到10位字母或数字">
            <p class="help-block">用于vpn连接的账户.</p>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">密码：</label>
          <div class="col-sm-10">
            <input name="pwd" class="form-control" Placeholder="4到10位字母或数字">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">邀请码：</label>
          <div class="col-sm-10">
            <input name="code" class="form-control" Placeholder="向群主要的～～">
          </div>
        </div>

      <div class="form-group" style="text-align:center;">
        <button type="submit" class="btn btn-primary">注册</button>
      </div>
      </form>
    </div>
  </div>



  <div id="div2" class="col-md-6 panel" style="display:none;">
    <div class="panel-heading border"> 登录 </div>
    <div class="panel-body">
      <form action="/user/login" class="form-horizontal bordered-group" role="form">
        <div class="form-group">
          <label class="col-sm-2 control-label">用户名：</label>
          <div class="col-sm-10">
            <input name="name" class="form-control">
            <p class="help-block">用于vpn连接的账户.</p>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">密码：</label>
          <div class="col-sm-10">
            <input name="pwd" class="form-control">
          </div>
        </div>
      <div class="form-group" style="text-align:center;">
        <button type="submit" class="btn btn-primary">登录</button>
      </div>
      </form>
    </div>
  </div>



</div>


<script type="text/javascript">
  function change(i){
    $('#div1').hide(1);
    $('#div2').hide(1);
    $('#div'+i).show();
  }
</script>
@stop
