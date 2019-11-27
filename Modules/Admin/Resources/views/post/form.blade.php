<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="box-body">
    <div class="form-group has-error">
        <label  class="col-sm-2 control-label">Tiêu đề</label>
        <div class="col-sm-10">
            <input type="text" 
                class="form-control" 
                name="post_title" 
                placeholder="tên danh mục"
                value="{{old('post_title',isset($post->post_title) ? $post->post_title : '')}}"
            >
            @if($errors->has('post_title'))
                <span class="help-block">{{$errors->first('post_title')}}</span>
            @endif
        </div>
    </div>
    <div class="form-group has-error">
        <label  class="col-sm-2 control-label">Mô tả ngắn</label>
        <div class="col-sm-10">
            <textarea name="description" class="form-control" 
                placeholder="mô tả ngắn"
                cols="30"
                rows="3"
            >{{old('description',isset($post->description) ? $post->description : '')}}</textarea>
         @if($errors->has('description'))
        <span class="help-block">{{$errors->first('description')}}</span>
        @endif
        </div>
    </div>
    
    <div class="form-group has-error">
        <label  class="col-sm-2 control-label">Nội dung</label>
        <div class="col-sm-10">
            <textarea name="content" class="form-control" placeholder="nội dung" rows="3"  cols="30"
            >{{old('content',isset($post->content) ? $post->content : '')}}</textarea>
            @if($errors->has('content'))
            <span class="help-block">{{$errors->first('content')}}</span>
            @endif 
        </div>
        
    </div>
    
    <div class="form-group">
        <label  class="col-sm-2 control-label">Avatar </label>
        <div class="col-sm-10">
        <input type="file" class="form-control" name="post_avatar" >
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