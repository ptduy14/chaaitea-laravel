@foreach ($admins as $admins)
            <tr>
                <td>{{$admins->id}}</td>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$admins->name}}</strong></td>
                <td>{{$admins->email}}</td>
                <td>{{$admins->phone}}</td>
                <td>
                    @foreach ($admins->getRoleNames() as $roleName)
                        <strong class="text-status-1">{{ucfirst($roleName)}}</strong>
                    @endforeach
                </td>
                <td>
                    @if ($admins->verify == 1)
                        <strong class="text-status-1">Hoạt động</strong>
                    @else
                        <strong class="text-status-0">đang khóa hoạt động </strong>
                    @endif
                </td>
                <td>
                    {{$admins->created_at}}
                </td>
                <td>
                    <a data-action='/admin/admin/edit' class="btn btn-warning  btn-sm btn-sm btn-edit-admin" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" value="{{$admins->id}}">Edit</a>
                    @if ($admins->verify == 0) 
                        <a data-action='/admin/admin/delete' class="btn btn-danger  btn-sm btn-del-admin" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" value="{{$admins->id}}">Delete</a>
                    @endif
                </td>
                
            </tr>
          @endforeach