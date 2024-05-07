@extends('admin_layouts')


@section('admin_content')

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Users</h2>
                            <div class="breadcrumb-wrapper">

                            </div>
                        </div>
                    </div>
                </div>


                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#inlineForm" disabled>
                                Add New User
                            </button>

                            <!-- Modal -->
                            <div class="modal fade text-start" id="inlineForm" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel33">User </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="post" action="{{ route('users.store') }}">
                                            @csrf
                                            <div class="modal-body">



                                                <label>First Name: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="First Name" class="form-control" required name="first_name" />
                                                </div>
                                                <label>Last Name: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="Last Name" class="form-control" required name="last_name" />
                                                </div>
                                                <label>Username: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="Username" class="form-control" required name="username" />
                                                </div>
                                                <label>Email: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="Email" class="form-control" required name="email" />
                                                </div>
                                                <label>Phone Number: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="Phone Number" class="form-control" required name="phone_number" />
                                                </div>
                                                <label>Address: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="Address" class="form-control" required name="address" />
                                                </div>

                                                <label>Password: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="Password" class="form-control" required name="password" />
                                                </div>

                                                <label>User Type: </label>
                                                <div class="mb-1">
                                                    <select name="usertype_id" class="form-control" required>
                                                        @foreach ($usertype as $usertype)
                                                            <option value="{{ $usertype->usertype_id }}">{{ $usertype->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                                <label>Role: </label>
                                                <div class="mb-1">
                                                    <select name="role_id" class="form-control" required>
                                                        @foreach ($role as $role)
                                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <label>Location: </label>
                                                <div class="mb-1">
                                                    <select name="location_id" class="form-control" required>
                                                        @foreach ($location as $location)
                                                            <option value="{{ $location->location_id }}">{{ $location->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" >Add User</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="content-body">






    <!-- Hoverable rows start -->
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="card-title mb-0">Users</h4>

                </div>
                <div class="card-body">

                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Usertype</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>

                                    {{ $user->usertypes->name }}

                            </td>

                            <td>

                                {{ $user->roles->name }}

                        </td>
                                <td>
                                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal{{$user->id}}">View</button> --}}

                                    {{-- <a href="{{ route('users.edit', $user->id) }}" class="btn btn-secondary mr-1">Edit</a> --}}
                                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{$user->id}}">Edit</button> --}}

                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal{{$user->id}}">View</button>
                                    {{-- <button type="button" class="btn btn-primary" onclick="openEditModal({{ $user->id }})">Edit</button> --}}
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" disabled>Edit</button>

                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" disabled>Delete</button>
                                    </form>
                                </td>
                            </tr>




                            <!-- View Modal -->
<div class="modal fade" id="viewModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">View User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="user_id">Username:</label>
                    <p>{{ $user->username }}</p>
                </div>
                <div class="form-group">
                    <label for="name">First Name:</label>
                    <p>{{ $user->first_name }}</p>
                </div>
                <div class="form-group">
                    <label for="name">Last Name:</label>
                    <p>{{ $user->last_name }}</p>
                </div>
                <div class="form-group">
                    <label for="price">Email:</label>
                    <p>{{ $user->email }}</p>
                </div>
                <div class="form-group">
                    <label for="price">Phone Number:</label>
                    <p>{{ $user->phone_number }}</p>
                </div>
                <div class="form-group">
                    <label for="price">Address:</label>
                    <p>{{ $user->address }}</p>
                </div>

                <div class="form-group">
                    <label for="product_name">User Type:</label>
                    <p>{{ $user->usertypes->name }}</p>
                </div>


                <div class="form-group">
                    <label for="product_name">Role:</label>
                    <p>{{ $user->roles->name }}</p>
                </div>


                <div class="form-group">
                    <label for="product_name">Location:</label>
                    <p>{{ $user->locations->name }}</p>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



                            {{-- edit Modal --}}
                            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="post" action="{{ route('users.update', $user->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="user_id">User ID</label>
                                                    <p>{{ $user->user_id }}</p>
                                                </div>

                                                <div class="form-group">
                                                    <label for="price">Email</label>
                                                    <input type="text" class="form-control" required id="email" name="email" value="{{ $user->email }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="price">Phone Number</label>
                                                    <input type="text" class="form-control" required id="phone_number" name="phone_number" value="{{ $user->phone_number }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="price">Address</label>
                                                    <input type="text" class="form-control" required id="address" name="address" value="{{ $user->address }}">
                                                </div>

                                                {{-- <div class="form-group">
                                                    <label for="supplier_id">User Type</label>
                                                    <select class="form-control" required id="usertype_id" name="usertype_id">
                                                      @foreach($usertype as $usertype)
                                                        <option value="{{ $usertype->usertype_id }}" {{ $user->usertype_id == $usertype->usertype_id ? 'selected' : '' }}>{{ $usertype->name }}</option>
                                                      @endforeach
                                                    </select>
                                                  </div> --}}

                                                  <div class="form-group">
                                                    <label for="usertype_id">User Type</label>
                                                    <select class="form-control" required id="usertype_id" name="usertype_id">
                                                        @foreach($usertypes as $usertype)
                                                            <option value="{{ $usertype->id }}" {{ $user->usertype_id == $usertype->id ? 'selected' : '' }}>
                                                                {{ $usertype->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                                <div class="form-group">
                                                    <label for="role_id">Role</label>
                                                    <select class="form-control" required id="role_id" name="role_id">
                                                        @foreach($rolenames as $roleId => $roleName)
    <option value="{{ $roleId }}" {{ $user->role_id == $roleId ? 'selected' : '' }}>
        {{ $roleName }}
    </option>
@endforeach


                                                    </select>
                                                </div>


                                                  <div class="form-group">
                                                    <label for="location_id">Location</label>
                                                    <select class="form-control" required id="location_id" name="location_id">
                                                      @foreach($locations as $location)
                                                        <option value="{{ $location->location_id }}" {{ $user->location_id == $location->location_id ? 'selected' : '' }}>{{ $location->name }}</option>
                                                      @endforeach
                                                    </select>
                                                  </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Save changes</button>

                                            </div>
                                        </form>
                                        </div>
                                    </div>



                                </div>

                                {{-- end edit modal --}}
                            @endforeach
                        </tbody>


                    </table>


                    <div class="pagination d-flex justify-content-end" >
                        {{ $users->links('pagination::bootstrap-4') }}
                    </div>





                </div>
            </div>
        </div>
    </div>
    <!-- Hoverable rows end -->













            </div>
        </div>
    </div>

















<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>



<script>
    function openEditModal(id) {
        $('#editModal').modal('show');
        $.ajax({
            url: "{{ route('users.edit', ':id') }}".replace(':id', id),
            method: 'get',
            success: function(data) {
                $('#user_id').val(data.user_id);
                $('#name').val(data.name);
                $('#price').val(data.price);
                $('form').attr('action', "{{ route('users.update', ':id') }}".replace(':id', id));
            }
        });
    }
</script>

@endsection
