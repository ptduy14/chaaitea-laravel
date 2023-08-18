@foreach ($admins as $admin)
            <tr>
                <td>{{$admin->id}}</td>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$admin->name}}</strong></td>
                <td>{{$admin->email}}</td>
                <td>{{$admin->phone}}</td>
                <td>
                    @foreach ($admin->getRoleNames() as $roleName)
                        <strong class="text-status-1">{{ucfirst($roleName)}}</strong>
                    @endforeach
                </td>
                <td>
                    @if ($admin->verify == 1)
                        <strong class="text-status-1">Hoạt động</strong>
                    @else
                        <strong class="text-status-0">đang khóa hoạt động </strong>
                    @endif
                </td>
                <td>
                    {{$admin->created_at}}
                </td>
                <td>
                    <a data-action='/admin/admin/edit' class="btn btn-warning  btn-sm btn-sm btn-edit-admin" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" value="{{$admin->id}}">Edit</a>
                    @if ($admin->verify == 0) 
                        <a data-action='/admin/admin/delete' class="btn btn-danger  btn-sm btn-del-admin" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" value="{{$admin->id}}">Delete</a>
                    @endif
                </td>
                
            </tr>
          @endforeach