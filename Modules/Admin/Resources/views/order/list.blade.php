@extends('admin::layouts.master')

@section('content')
<section class="content-header">
      <h1>
        Quản lý đơn hàng
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li><a href="#">Đơn hàng</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <a href="#" class="btn btn-default">Chưa duyệt</span></a>
                <a href="#" class="btn btn-default">Đã duyệt</span></a>
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
                  <th>Số điện thoại</th>
                  <th>Địa chỉ</th>
                  <th>Tình trạng</th>
                  <th  class="text-center">Hành động</th>
                </tr>
                @if(isset($list))
                    @foreach($list as $key=>$item)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->customer_name}}</td>
                        <td>{{$item->customer_email}}</td>
                        <td>{{$item->customer_phone}}</td>
                        <td>{{$item->customer_address}}</td>
                        <td><a href="{{route('admin.action.order',['active',$item->id])}}"><span class="{{$item->getStatus()['class']}}">{{$item->getStatus()['name']}}</span></a></td>
                        <th class="text-center">
                            <a class="js-order" href="{{route('admin.order.detail',$item->id)}}"><i style="color : #774747" class="glyphicon glyphicon-eye-open"></i></a>&nbsp&nbsp
                            <a class="js-delete" href="{{route('admin.action.order',['delete',$item->id])}}"><i style="color : #da1f0c" class="glyphicon glyphicon-remove"></i></a>
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
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Chi tiết đơn hàng</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" id="content">
                   
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

                </div>
            </div>
        </div>
      </div>
      
    </section>
    <!-- /.content -->
@stop

@section('footerJS')
    <script>
       $(function(){
        $('.js-order').click(function(event){
            event.preventDefault();
            let url=$(this).attr('href');
            $.ajax({
                url : url,
            }).done(function(res){
                if(res){
                    $('#content').html('').append(res);
                }
            })
            event.preventDefault();
            $('#myModal').modal('show');
            
        })
        $('.js-delete').click(function(e){
        e.preventDefault();
         let confirm=window.confirm("Bạn muốn xóa đơn hàng này");
         if(!confirm){
            return;
         }
         let url=$(this).attr('href');
         $.ajax({
           url: url
         }).done(function(res){
           if(res){
             location.reload()
           }
         })
      })
       })
    </script>
@stop
