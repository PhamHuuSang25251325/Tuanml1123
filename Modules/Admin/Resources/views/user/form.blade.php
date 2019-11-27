<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="box-body">
    <div class="form-group has-error">
        <label  class="col-sm-2 control-label">Tên danh mục</label>
        <div class="col-sm-10">
        <input type="text" 
        class="form-control" 
        name="cat_name" 
        placeholder="tên danh mục"
        value="{{old('cat_name',isset($category->cat_name) ? $category->cat_name : '')}}"
        >
        @if($errors->has('cat_name'))
        <span class="help-block">{{$errors->first('cat_name')}}</span>
        @endif
        </div>
    </div>
    <div class="form-group">
        <label  class="col-sm-2 control-label">Mô tả ngắn</label>
        <div class="col-sm-10">
        <input type="text" 
            class="form-control" 
            name="cat_description" 
            placeholder="mô tả"
            value="{{old('cat_description',isset($category->cat_description) ? $category->cat_description : '')}}"
        >
        </div>
    </div>
    <div class="form-group">
        <label  class="col-sm-2 control-label">Avatar </label>
        <div class="col-sm-10">
        <input type="file" class="form-control" name="cat_avatar" >
        </div>
    </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
    <a  class="btn btn-default" href="{{ url()->previous() }}">Cancel</a>
    <button type="submit" class="btn btn-info pull-right">Save</button>
    </div>
    <!-- /.box-footer -->
</form>