@foreach ($orders as $order)
    <tr>
        <td>{{$order->order_id}}</td>
        <td>{{$order->reciver}}</td>
        <td>₫{{number_format($order->total_money)}}</td>
        <td>{{$order->order_date}}</td>
        <td><a class="btn btn-info btn-sm" href="/admin/order-detail/{{$order->order_id}}">View</a></td>
        <td>
            <select id="smallSelect" class="form-select form-select-sm status_field" {{$order->order_status === 'đã hoàn thành' || $order->order_status === 'đang giao hàng' || $order->order_status === 'đã hủy' ? 'disabled'  : ''}}>
            <option value="đang xử lí" {{$order->order_status === 'đang xử lí' ? 'selected' : ''}}>Đang xử lí</option>
            <option value="đang giao hàng" {{$order->order_status === 'đang giao hàng' ? 'selected' : ''}}>Đang giao hàng</option>
            <option hidden='hidden' value="đã hoàn thành" {{$order->order_status === 'đã hoàn thành' ? 'selected'  : ''}}>Đã hoàn thành</option>
            <option hidden='hidden' value="đã hủy" {{$order->order_status === 'đã hủy' ? 'selected'  : ''}}>Đã hủy</option>
            </select>
        </td>
        <td>
            @if ($order->order_status === 'đã hoàn thành' || $order->order_status === 'đang giao hàng')
                
            @else
                <button type="submit" class="btn btn-success btn-sm btn-save-change-order" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{$order->order_id}}" hidden>Save</button>
            @endif
        </td>
    </tr>
@endforeach