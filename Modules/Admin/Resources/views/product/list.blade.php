@extends('admin::layouts.master')

@section('content')
<section class="content-header">
      <h1>
        Danh mục
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li><a href="#">Danh sách danh mục</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <a href="{{route('admin.add.product')}}"><span class="glyphicon glyphicon-plus"></span></a>

              <div class="box-tools">
              <form action="">
                @csrf
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="keyword" class="form-control pull-right" value="{{\Request::get('keyword')}}" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit"  class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
                </form>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>STT</th>
                  <th>Tên Sản phẩm</th>
                  <th>Hình ảnh</th>
                  <th>Số lượng</th>
                  <th>Danh mục</th>
                  <th>Trạng thái</th>
                </tr>
                @if(isset($list))
                    @foreach($list as $key=>$item)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->pro_name}}</td>
                        <td><img class="image" style="width: 50px" src="{{parse_url_file($item->pro_avatar)}}"  /></td>
                        <td>{{$item->quantity}}</td>
                        <td>{{$item->category->cat_name}}</td>
                        <td><a href="{{route('admin.action.product',['active',$item->id])}}"><span class="{{$item->getStatus()['class']}}">{{$item->getStatus()['name']}}</span></a></td>
                        <th class="text-center">
                            <a  href="{{route('admin.edit.product',$item->id)}}"><i style="color : #774747" class="glyphicon glyphicon-pencil"></i></a>&nbsp
                            <a class="js-delete" href="{{route('admin.action.product',['delete',$item->id])}}"><i style="color : #da1f0c" color="red" class="glyphicon glyphicon-remove"></i></a>
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
      <div class="row">
        <div class="col-md-6">
          <p style="font-style: italic"> Hiển thị {{$list->count()}} trên {{$list->total()}} Sản phẩm</p>
        </div>
        <div class="col-md-6">
        <div class="pull-right">
        <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>
         
          @for($i=1;$i<=$list->lastPage();$i++)
            <li class="page-item {{$i==$list->currentPage()?'active': ''}}"><a class="page-link" href="?page={{$i}}">{{$i}}</a></li>
          @endfor
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
      </nav>
      </div>
        </div>
      </div>
      
      
    </section>
    <!-- /.content -->
@stop

@section('footerJS')
  <script>
    $(function(){
      $('.js-delete').click(function(e){
        e.preventDefault();
         let confirm=window.confirm("Bạn muốn xóa sản phẩm này");
         if(!confirm){
            return;
         }
         let url=$(this).attr('href');
         console.log(url);
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
