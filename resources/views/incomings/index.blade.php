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
                            <h2 class="content-header-title float-start mb-0">Incomings</h2>
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
                                Add New Incoming
                            </button>

                            <!-- Modal -->
                            <div class="modal fade text-start" id="inlineForm" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel33">Incoming </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>





                                        <form method="post" action="{{ route('incomings.store') }}">
                                            @csrf
                                            <div class="modal-body">

                                                <label>Product: </label>
                                                <div class="mb-1">
                                                    <select name="product_id" class="form-control" required>
                                                        @foreach ($products as $product)
                                                            <option value="{{ $product->product_id }}">{{ $product->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <label>Supplier: </label>
                                                <div class="mb-1">
                                                    <select name="supplier_id" class="form-control" required>
                                                        @foreach ($suppliers as $supplier)
                                                            <option value="{{ $supplier->supplier_id }}">{{ $supplier->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <label>Quantity: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="Quantity" class="form-control" required name="quantity" />
                                                </div>
                                                {{-- <label>Incoming Invoice: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="Incoming Invoice" class="form-control" required name="incoming_invoice" />
                                                </div> --}}
                                                {{-- <label>Date: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="Date" class="form-control" required name="date" />
                                                </div> --}}
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" >Add Incoming</button>
                                                </div>
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
                    <h4 class="card-title mb-0">Incomings</h4>

                </div>
                <div class="card-body">

                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>

                                <th>Quantity</th>
                                <th>Product Name</th>
                                <th>Supplier Name</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($incomings as $key => $incoming)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                {{-- <td>{{ $incoming->products->name }}</td> --}}
                                <td>{{ $incoming->quantity }}</td>
                                <td>

                                        {{ $incoming->products->name }}

                                </td>
                                <td>

                                        {{ $incoming->suppliers->name }}

                                </td>

                                <td>{{ $incoming->date }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal{{$incoming->id}}">View</button>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" disabled>Edit</button>

                                    <form action="{{ route('incomings.destroy', $incoming->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" disabled>Delete</button>
                                    </form>
                                </td>
                            </tr>





 <!-- View Modal -->
<div class="modal fade" id="viewModal{{$incoming->id}}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">View Incoming</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="incoming_id">Product ID:</label>
                    <p>{{ $incoming->product_id }}</p>
                </div>
                <div class="form-group">
                    <label for="product_name">Product Name:</label>
                    <p>{{ $incoming->products->name }}</p>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <p>{{ $incoming->quantity }}</p>
                </div>
                <div class="form-group">
                    <label for="supplier_name">Supplier Name:</label>
                    <p>{{ $incoming->suppliers->name }}</p>
                </div>
                <div class="form-group">
                    <label for="date">Date:</label>
                    <p>{{ $incoming->date }}</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>






{{-- Edit Modal --}}

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Incoming</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="{{ route('incomings.update', $incoming->id) }}">
            @csrf
            @method('PUT')
            <div class="modal-body">
              <div class="form-group">
                <label for="supplier_id">Supplier</label>
                <select class="form-control" required id="supplier_id" name="supplier_id">
                  @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->supplier_id }}" {{ $incoming->supplier_id == $supplier->supplier_id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="comments">Comments</label>
                <textarea class="form-control" required id="comment" name="comment">{{ $incoming->comment }}</textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
          </form>
        </div>

    </div>
</div>






                            @endforeach
                        </tbody>


                    </table>

                    <div class="pagination d-flex justify-content-end" >
                        {{ $incomings->links('pagination::bootstrap-4') }}
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
            url: "{{ route('incomings.edit', ':id') }}".replace(':id', id),
            method: 'get',
            success: function(data) {
                $('#comment').val(data.comment);
                // $('#name').val(data.name);

                $('form').attr('action', "{{ route('incomings.update', ':id') }}".replace(':id', id));
            }
        });
    }
</script>

@endsection
