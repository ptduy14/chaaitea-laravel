@foreach ($customers as $customer)
            <tr>
                <td>{{$customer->id}}</td>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$customer->name}}</strong></td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->phone}}</td>
                <td>{{$customer->address}}</td>
                <td>
                    @if ($customer->verify == 1)
                        <strong class="text-status-1">đã kích hoạt </strong>
                    @else
                        <strong class="text-status-0">chưa kích hoạt </strong>
                    @endif
                </td>
            </tr>
          @endforeach