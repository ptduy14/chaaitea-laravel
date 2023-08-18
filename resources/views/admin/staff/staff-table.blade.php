@foreach ($staffs as $staff)
            <tr>
                <td>{{$staff->id}}</td>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$staff->name}}</strong></td>
                <td>{{$staff->email}}</td>
                <td>{{$staff->phone}}</td>
                <td>
                    @foreach ($staff->getRoleNames() as $roleName)
                        <strong class="text-status-1">{{ucfirst($roleName)}}</strong>
                    @endforeach
                </td>
                <td>
                    @if ($staff->verify == 1)
                        <strong class="text-status-1">Hoạt động</strong>
                    @else
                        <strong class="text-status-0">đang khóa hoạt động </strong>
                    @endif
                </td>
                <td>
                    {{$staff->created_at}}
                </td>
                @if (in_array('admin', Auth::user()->getRoleNames()->toArray()))
                    <td>
                        <a data-action='/admin/staff/edit' class="btn btn-warning  btn-sm btn-sm btn-edit-admin" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" value="{{$staff->id}}">Edit</a>
                        @if ($staff->verify == 0) 
                            <a data-action='/admin/staff/delete' class="btn btn-danger  btn-sm btn-del-admin" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" value="{{$staff->id}}">Delete</a>
                        @endif
                    </td>  
                @endif 
            </tr>
          @endforeach