@extends('admin::layouts.master')

@section('content')
<section class="content-header">
      <h1>
        Phản hổi khách hàng
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li><a href="#">Liên hệ</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
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
                  <th>Khách hàng</th>
                  <th>Email</th>
                  <th>Nội dung</th>
                </tr>
                @if(isset($list))
                    @foreach($list as $key=>$item)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->customer_name}}</td>
                        <td>{{$item->customer_email}}</td>
                        <td>{{$item->content}}</td>
                        <th class="text-center">
                            <a   href="{{route('admin.action.contact',['delete',$item->id])}}"><i style="color : #da1f0c" color="red" class="glyphicon glyphicon-remove"></i></a>
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
