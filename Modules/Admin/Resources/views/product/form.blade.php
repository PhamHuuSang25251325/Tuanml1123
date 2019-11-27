<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="box-body">
    <div class="form-group has-error">
        <label  class="col-sm-2 control-label">Tên sản phẩm</label>
        <div class="col-sm-10">
            <input type="text" 
                class="form-control" 
                name="pro_name" 
                placeholder="tên danh mục"
                value="{{old('cat_name',isset($product->pro_name) ? $product->pro_name : '')}}"
            >
            @if($errors->has('pro_name'))
                <span class="help-block">{{$errors->first('pro_name')}}</span>
            @endif
        </div>
    </div>
    <div class="form-group has-error">
        <label  class="col-sm-2 control-label">Mô tả</label>
        <div class="col-sm-10">
            <textarea name="description" class="form-control" 
                placeholder="mô tả ngắn"
                cols="30"
                rows="3"
            >{{old('description',isset($product->description) ? $product->description : '')}}</textarea>
         @if($errors->has('description'))
        <span class="help-block">{{$errors->first('description')}}</span>
        @endif
        </div>
    </div>
    
    <div class="form-group has-error">
        <label  class="col-sm-2 control-label">Nội dung</label>
        <div class="col-sm-10">
            <textarea name="content" class="form-control" placeholder="nội dung" rows="3"  cols="30"
            >{{old('content',isset($product->content) ? $product->content : '')}}</textarea>
            @if($errors->has('content'))
            <span class="help-block">{{$errors->first('content')}}</span>
            @endif 
        </div>
        
    </div>
    
    <div class="form-group has-error">
        <lable class="col-sm-2 control-label">Danh mục sản phẩm</lable>
        <div class="col-sm-10">
            <select class="form-control" name="category_id" >
                <option value="" >Chọn danh mục</option>
                @if(isset($listCat))
                    @foreach($listCat as $cat)
                        <option value="{{$cat->id}}"
                            {{old('category_id')==$cat->id?'selected': 
                                (isset($product->category_id) && $product->category_id==$cat->id)? 'selected':''}}>
                                {{$cat->cat_name}}</option>
                    @endforeach
                @endif
                
            </select>
        @if($errors->has('category_id'))
            <span class="help-block">{{$errors->first('category_id')}}</span>
        @endif
        </div>
    </div>
    <div class="form-group has-error">
        <label  class="col-sm-2 control-label">Số lượng</label>
        <div class="col-sm-10">
            <input type="text" 
                class="form-control" 
                name="quantity" 
                placeholder="tên danh mục"
                value="{{old('quantity',isset($product->quantity) ? $product->quantity : '')}}"
            >
            @if($errors->has('quantity'))
                <span class="help-block">{{$errors->first('quantity')}}</span>
            @endif
        </div>
    </div>
    <div class="form-group has-error">
        <lable class="col-sm-2 control-label">Giá sản phẩm</lable>
        <div class="col-sm-10">
        <input class="form-control" type="number" name="price" value="{{old('price',isset($product->price)? $product->price : 0)}}" />
        @if($errors->has('price'))
            <span class="help-block">{{$errors->first('price')}}</span>
        @endif
        </div>
    </div>
    <div class="form-group">
        <lable class="col-sm-2 control-label">Giảm giá %</lable>
        <div class="col-sm-10">
        <input class="form-control" type="number" name="sale" value="{{old('sale',isset($product->sale)? $product->sale : 0)}}"/>
        </div>
    </div>
    <div class="form-group">
        <label  class="col-sm-2 control-label">Avatar </label>
        <div class="col-sm-10">
        <input type="file" class="form-control" name="pro_avatar" >
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