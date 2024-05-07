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
                            <h2 class="content-header-title float-start mb-0">Usertypes</h2>
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
                                Add New Usertype
                            </button>

                            <!-- Modal -->
                            <div class="modal fade text-start" id="inlineForm" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel33">Usertype </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="post" action="{{ route('usertypes.store') }}">
                                            @csrf
                                            <div class="modal-body">


                                                <label>Usertype ID: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="Usertype ID" class="form-control" required name="usertype_id" />
                                                </div>
                                                <label> Name: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder=" Name" class="form-control" required name="name" />
                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" >Add Usertype</button>
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
                    <h4 class="card-title mb-0">Usertypes</h4>

                </div>
                <div class="card-body">

                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Usertype ID</th>
                                <th> Name</th>

                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usertypes as $key => $usertype)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $usertype->usertype_id }}</td>
                                <td>{{ $usertype->name }}</td>

                                <td>
                                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal{{$usertype->id}}">View</button> --}}

                                    {{-- <a href="{{ route('usertypes.edit', $usertype->id) }}" class="btn btn-secondary mr-1">Edit</a> --}}
                                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{$usertype->id}}">Edit</button> --}}

                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal{{$usertype->id}}">View</button>
                                    {{-- <button type="button" class="btn btn-primary" onclick="openEditModal({{ $usertype->id }})">Edit</button> --}}
                                    {{-- <button type="button" class="btn btn-primary" onclick="openEditModal({{ $usertype->id }})">Edit</button> --}}
                                    {{-- <button type="button" class="btn btn-primary edit-btn" data-id="{{ $usertype->id }}">Edit</button> --}}
                                    <button type="button" class="btn btn-primary" onclick="openEditModal({{ $usertype->id }})">Edit</button>

                                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $usertype->id }}">Edit</button> --}}
                                    <form action="{{ route('usertypes.destroy', $usertype->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>




                            <!-- View Modal -->
<div class="modal fade" id="viewModal{{$usertype->id}}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">View Usertype</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="usertype_id">Usertype ID:</label>
                    <p>{{ $usertype->usertype_id }}</p>
                </div>
                <div class="form-group">
                    <label for="name"> Name:</label>
                    <p>{{ $usertype->name }}</p>
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
                <h5 class="modal-title" id="editModalLabel">Edit Usertype</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('usertypes.update', ':id') }}" id="editForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="usertype_id">Usertype ID</label>
                        <input type="text" class="form-control" id="usertype_id" name="usertype_id" disabled>
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" required id="name" name="name">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- end edit Modal --}}


                            @endforeach
                        </tbody>


                    </table>


                    <div class="pagination d-flex justify-content-end" >
                        {{ $usertypes->links('pagination::bootstrap-4') }}
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
        url: "{{ route('usertypes.edit', ':id') }}".replace(':id', id),
        method: 'get',
        success: function(data) {
            $('#usertype_id').val(data.usertype_id);
            $('#name').val(data.name);

            $('#editForm').attr('action', "{{ route('usertypes.update', ':id') }}".replace(':id', id));

            console.log('openEditModal called with id', id);
        }
    });
}

    // console.log('openEditModal called with id', id);


</script>
@endsection
