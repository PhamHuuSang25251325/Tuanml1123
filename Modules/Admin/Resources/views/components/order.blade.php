@if($orders)
<table class="table table-hover">
    <tr>
        <th>STT</th>
        <th>Sản phẩm</th>
        <th>Số lượng mua</th>
        <th>Giá sản phẩm</th>
    </tr>
        @foreach($orders as $key=>$item)
            <tr>
            <td>{{$key+1}}</td>
            <td>
                <img src="{{parse_url_file($item->product->pro_avatar)}}" style="width: 60px"/></br>
                {{$item->product->pro_name}}
                
            </td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->pro_price}}</td>
            </tr>
        @endforeach
    
</table>
@endif