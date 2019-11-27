@extends('admin::layouts.master')

@section('content')
<section class="content-header">
      <h1>
        Danh mục
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li><a href="/product">Sản phẩm</a></li>
        <li><a href="#">Sửa</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Thông tin cần sửa</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @include('admin::product.form')
          </div>
          <!-- /.box -->
        </div>
      </div>

    </section>
    <!-- /.content -->
@stop
