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
                            <h2 class="content-header-title float-start mb-0">Customers</h2>
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
                                Add New Customer
                            </button>

                            <!-- Modal -->
                            <div class="modal fade text-start" id="inlineForm" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel33">Customer </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="post" action="{{ route('customers.store') }}">
                                            @csrf
                                            <div class="modal-body">


                                                <label>Customer ID: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="Customer ID" class="form-control" required name="customer_id" />
                                                </div>
                                                <label>First Name: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="First Name" class="form-control" required name="first_name" />
                                                </div>
                                                <label>Last Name: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="Last Name" class="form-control" required name="last_name" />
                                                </div>

                                                <label>Customer Type: </label>
                                                <div class="mb-1">
                                                    <select name="customertype_id" class="form-control" required>
                                                        @foreach ($customertypes as $customertype)
                                                            <option value="{{ $customertype->customertype_id }}">{{ $customertype->name }}</option>
                                                        @endforeach
                                                    </select>
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

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" >Add Customer</button>
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
                    <h4 class="card-title mb-0">Customers</h4>

                </div>
                <div class="card-body">

                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $key => $customer)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $customer->customer_id }}</td>
                                <td>{{ $customer->first_name }}</td>
                                <td>{{ $customer->last_name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>
                                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal{{$customer->id}}">View</button> --}}

                                    {{-- <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-secondary mr-1">Edit</a> --}}
                                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{$customer->id}}">Edit</button> --}}

                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal{{$customer->id}}">View</button>
                                    {{-- <button type="button" class="btn btn-primary" onclick="openEditModal({{ $customer->id }})">Edit</button> --}}
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" disabled>Edit</button>

                                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" disabled>Delete</button>
                                    </form>
                                </td>
                            </tr>




                            <!-- View Modal -->
<div class="modal fade" id="viewModal{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">View Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="customer_id">Customer ID:</label>
                    <p>{{ $customer->customer_id }}</p>
                </div>
                <div class="form-group">
                    <label for="name">First Name:</label>
                    <p>{{ $customer->first_name }}</p>
                </div>
                <div class="form-group">
                    <label for="name">Last Name:</label>
                    <p>{{ $customer->last_name }}</p>
                </div>

                <div class="form-group">
                    <label for="product_name">Customer Type:</label>
                    <p>{{ $customer->customertypes->name }}</p>
                </div>


                <div class="form-group">
                    <label for="price">Email:</label>
                    <p>{{ $customer->email }}</p>
                </div>
                <div class="form-group">
                    <label for="price">Phone Number:</label>
                    <p>{{ $customer->phone_number }}</p>
                </div>
                <div class="form-group">
                    <label for="price">Address:</label>
                    <p>{{ $customer->address }}</p>
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
                                            <h5 class="modal-title" id="editModalLabel">Edit Customer</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="post" action="{{ route('customers.update', $customer->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="customer_id">Customer ID</label>
                                                    <p>{{ $customer->customer_id }}</p>
                                                </div>

                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="text" class="form-control" required id="email" name="email" value="{{ $customer->email }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone_number">Phone Number</label>
                                                    <input type="text" class="form-control" required id="phone_number" name="phone_number" value="{{ $customer->phone_number }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control" required id="address" name="address" value="{{ $customer->address }}">
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
                        {{ $customers->links('pagination::bootstrap-4') }}
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
            url: "{{ route('customers.edit', ':id') }}".replace(':id', id),
            method: 'get',
            success: function(data) {
                $('#customer_id').val(data.customer_id);
                $('#name').val(data.name);
                $('#price').val(data.price);
                $('form').attr('action', "{{ route('customers.update', ':id') }}".replace(':id', id));
            }
        });
    }
</script>

@endsection
