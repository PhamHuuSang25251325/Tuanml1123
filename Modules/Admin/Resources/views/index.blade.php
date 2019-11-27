@extends('admin::layouts.master')

@section('content')
<section class="content-header">
      <h1>
        Trang tổng quan
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$totalNewOrder}}</h3>

              <p>Đơn hàng mới</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <h3>{{$totalOldOrder}}</h3>

              <p>Đơn hàng đã xử lý</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <h3>{{$totalUser}}</h3>
              <p>User</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <h3>{{$totalContact}}</h3>

              <p>Liên hệ</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-6 connectedSortable">
          <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
              <h3 class="box-title">Danh sách liên hệ mới</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table class="table table-hover">
                <tr>
                  <th>STT</th>
                  <th>Khách hàng</th>
                  <th>Email</th>
                  <th>Nội dung</th>
                </tr>
                @if(isset($listContact))
                    @foreach($listContact as $key=>$item)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->customer_name}}</td>
                        <td>{{$item->customer_email}}</td>
                        <td>{{$item->content}}</td>
                      </tr>
                    @endforeach
                  @endif
                
              </table>
            </div>
          </div>
        </section>
        <section class="col-lg-6 connectedSortable">
          <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
              <h3 class="box-title">Đơn hàng mới</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table class="table table-hover">
                <tr>
                  <th>STT</th>
                  <th>Khách hàng</th>
                  <th>Email</th>
                  <th>Số điện thoại</th>
                  <th>Địa chỉ</th>
                  <th>Tình trạng</th>
                </tr>
                @if(isset($listOrder))
                    @foreach($listOrder as $key=>$item)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->customer_name}}</td>
                        <td>{{$item->customer_email}}</td>
                        <td>{{$item->customer_phone}}</td>
                        <td>{{$item->customer_address}}</td>
                        <td><a href="{{route('admin.action.order',['active',$item->id])}}"><span class="{{$item->getStatus()['class']}}">{{$item->getStatus()['name']}}</span></a></td>
                      </tr>
                    @endforeach
                  @endif
                
              </table>
            </div>
          </div>
        </section>
        
      </div>
      <!-- /.row (main row) -->

    </section>
    
@stop
