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
                            <h2 class="content-header-title float-start mb-0">Suppliers</h2>
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
                                Add New Supplier
                            </button>

                            <!-- Modal -->
                            <div class="modal fade text-start" id="inlineForm" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel33">Supplier </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="post" action="{{ route('suppliers.store') }}">
                                            @csrf
                                            <div class="modal-body">


                                                <label>Supplier ID: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="Supplier ID" class="form-control" required name="supplier_id" />
                                                </div>
                                                <label>Supplier Name: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="Supplier Name" class="form-control" required name="name" />
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

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" >Add Supplier</button>
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
                    <h4 class="card-title mb-0">Suppliers</h4>

                </div>
                <div class="card-body">

                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Supplier ID</th>
                                <th>Supplier Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suppliers as $key => $supplier)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $supplier->supplier_id }}</td>
                                <td>{{ $supplier->name }}</td>
                                <td>{{ $supplier->email }}</td>
                                <td>
                                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal{{$supplier->id}}">View</button> --}}

                                    {{-- <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-secondary mr-1">Edit</a> --}}
                                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{$supplier->id}}">Edit</button> --}}

                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal{{$supplier->id}}">View</button>
                                    {{-- <button type="button" class="btn btn-primary" onclick="openEditModal({{ $supplier->id }})">Edit</button> --}}
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" disabled>Edit</button>

                                    <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" disabled>Delete</button>
                                    </form>
                                </td>
                            </tr>




                            <!-- View Modal -->
<div class="modal fade" id="viewModal{{$supplier->id}}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">View Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="supplier_id">Supplier ID:</label>
                    <p>{{ $supplier->supplier_id }}</p>
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <p>{{ $supplier->name }}</p>
                </div>
                <div class="form-group">
                    <label for="price">Email:</label>
                    <p>{{ $supplier->price }}</p>
                </div>
                <div class="form-group">
                    <label for="price">Phone Number:</label>
                    <p>{{ $supplier->phone_number }}</p>
                </div>
                <div class="form-group">
                    <label for="price">Address:</label>
                    <p>{{ $supplier->address }}</p>
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
                                            <h5 class="modal-title" id="editModalLabel">Edit Supplier</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="post" action="{{ route('suppliers.update', $supplier->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="supplier_id">Supplier ID</label>
                                                    <input type="text" class="form-control" required id="supplier_id" name="supplier_id" value="{{ $supplier->supplier_id }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" required id="name" name="name" value="{{ $supplier->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="price">Email</label>
                                                    <input type="text" class="form-control" required id="email" name="email" value="{{ $supplier->email }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="price">Phone Number</label>
                                                    <input type="text" class="form-control" required id="phone_number" name="phone_number" value="{{ $supplier->phone_number }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="price">Address</label>
                                                    <input type="text" class="form-control" required id="address" name="address" value="{{ $supplier->address }}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Save changes</button>

                                            </div>
                                        </form>
                                        </div>
                                    </div>



                                </div>
                            @endforeach
                        </tbody>


                    </table>

                    <div class="pagination d-flex justify-content-end" >
                        {{ $suppliers->links('pagination::bootstrap-4') }}
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
            url: "{{ route('suppliers.edit', ':id') }}".replace(':id', id),
            method: 'get',
            success: function(data) {
                $('#supplier_id').val(data.supplier_id);
                $('#name').val(data.name);
                $('#price').val(data.price);
                $('form').attr('action', "{{ route('suppliers.update', ':id') }}".replace(':id', id));
            }
        });
    }
</script>

@endsection
