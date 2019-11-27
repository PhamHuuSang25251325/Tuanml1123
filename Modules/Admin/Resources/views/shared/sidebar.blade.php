<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li><a href="{{route('admin.get.list.category')}}"><i class="fa fa-book"></i> <span>Danh mục sản phẩm</span></a></li>
        <li><a href="{{route('admin.get.list.product')}}"><i class="fa fa-book"></i> <span>Sản phẩm</span></a></li>
        <li><a href="{{route('admin.get.list.user')}}"><i class="fa fa-book"></i> <span>Khách hàng</span></a></li>
        <li><a href="{{route('admin.get.list.admin')}}"><i class="fa fa-book"></i> <span>Thành viên</span></a></li>
        <li><a href="{{route('admin.get.list.order')}}"><i class="fa fa-book"></i> <span>Đơn hàng</span></a></li>
        <li><a href="{{route('admin.get.list.contact')}}"><i class="fa fa-book"></i> <span>Liên hệ</span></a></li>
        <li><a href="{{route('admin.get.list.post')}}"><i class="fa fa-book"></i> <span>Bài viết</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>