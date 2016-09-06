@extends('layout.common')
@section('content')

<div class="row">
<div class="col-md-1"></div>
<div class="panel col-md-10">
  <table class="table mb0">
    <tr>
      <td>#</td>
      <td>name</td>
      <td>in</td>
      <td>out</td>
      <td>total</td>
      <td>time</td>
      <td>near</td>
    </tr>
    <?php foreach ($data as $key => $v) {
    ?>
      <tr>
        <td>{{$key}}</td>
        <td>{{$v->username}}</td>
        <td>{{number_format($v->in,2)}}M</td>
        <td>{{number_format($v->out,2)}}M</td>
        <td>{{number_format($v->total,2)}}M</td>
        <td>{{gmstrftime('%H:%M:%S',$v->alltime)}}</td>
        <td>{{$v->near}}</td>
      </tr>
    <?php

} ?>
  </table>
</div>
<div class="col-md-1"></div>
</div>


@stop
