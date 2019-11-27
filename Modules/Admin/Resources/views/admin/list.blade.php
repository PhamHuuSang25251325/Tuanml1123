@extends('admin::layouts.master')

@section('content')
<section class="content-header">
      <h1>
        Thành viên
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li><a href="#">Danh sách thành viên</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <a href="{{route('admin.add.admin')}}"><span class="glyphicon glyphicon-plus"></span></a>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>STT</th>
                  <th>Tên Thành viên</th>
                  <th>Email</th>
                  <th>Số điện thoại</th>
                  <th>Trạng thái</th>
                </tr>
                @if(isset($list))
                    @foreach($list as $key=>$item)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone}}</td>
                        <td><a href="{{route('admin.action.admin',['active',$item->id])}}"><span class="{{$item->getStatus()['class']}}">{{$item->getStatus()['name']}}</span></a></td>
                        <th class="text-center">
                            <a  href="{{route('admin.edit.user',$item->id)}}"><i style="color : #774747" class="glyphicon glyphicon-pencil"></i></a>&nbsp
                            <a   href="{{route('admin.action.user',['delete',$item->id])}}"><i style="color : #da1f0c" color="red" class="glyphicon glyphicon-remove"></i></a>
                        </th>
                      </tr>
                    @endforeach
                  @endif
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

    </section>
    <!-- /.content -->
@stop
