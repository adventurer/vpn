@extends('layout.common')
@section('content')

<div class="row">
  <div class="col-md-1"></div>
  <div class="panel col-md-10">
    <a href="/vcode/generation" class="">生成序列</a>
    <a href="/vcode?status=1" class="">已用</a>
    <a href="/vcode?status=0" class="">未用</a>
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
              <td>值</td>
              <td>状态</td>
              <td>创建时间</td>
              <td>使用时间</td>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($vcodes as $key => $v): ?>
              <tr>
                <td>{{$v->id}}</td>
                <td>{{$v->username}}</td>
                <td><input type="text" name="name" value="{{$v->info}}" readonly=""></td>
                <td>{{$v->status}}</td>
                <td>{{$v->created_at}}</td>
                <td>{{$v->updated_at}}</td>
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
      <?php echo $vcodes->render(); ?>
    </div>
  </div>
</div>


@stop
