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
                            <h2 class="content-header-title float-start mb-0">Inventories</h2>
                            <div class="breadcrumb-wrapper">

                            </div>
                        </div>
                    </div>
                </div>


                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">



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
                    <h4 class="card-title mb-0">Inventories</h4>

                </div>
                <div class="card-body">

                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Incoming Or Sale</th>
                                <th>Quantity</th>
                                <th> Current Quantity</th>

                                <th>Date</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inventories as $key => $inventory)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                {{-- <td>{{ $inventory->products->name }}</td> --}}

                                <td>

                                        {{ $inventory->products->name }}

                                </td>
                                <td>{{ $inventory->incoming_or_sale }}</td>
                                <td>{{ $inventory->quantity }}</td>
                                <td>{{ $inventory->current_quantity }}</td>


                                <td>{{ $inventory->created_at }}</td>

                            </tr>





 <!-- View Modal -->
{{-- <div class="modal fade" id="viewModal{{$inventory->id}}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">View Inventory</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="inventory_id">Product ID:</label>
                    <p>{{ $inventory->product_id }}</p>
                </div>
                <div class="form-group">
                    <label for="product_name">Product Name:</label>
                    <p>{{ $inventory->products->name }}</p>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <p>{{ $inventory->quantity }}</p>
                </div>
                <div class="form-group">
                    <label for="supplier_name">Expected Quantity:</label>
                    <p>{{ $inventory->expected_quantity }}</p>
                </div>

                <div class="form-group">
                    <label for="supplier_name"> Quantity Difference:</label>
                    <p>{{    $inventory->quantity - $inventory->expected_quantity }}</p>
                </div>



                <div class="form-group">
                    <label for="date">Comment:</label>
                    <p>{{ $inventory->comment }}</p>
                </div>

                <div class="form-group">
                    <label for="date">Date:</label>
                    <p>{{ $inventory->date }}</p>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> --}}












                            @endforeach
                        </tbody>


                    </table>





                   

                    <div class="pagination d-flex justify-content-end" >
                        {{ $inventories->links('pagination::bootstrap-4') }}
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
            url: "{{ route('inventories.edit', ':id') }}".replace(':id', id),
            method: 'get',
            success: function(data) {
                $('#inventory_id').val(data.inventory_id);
                $('#name').val(data.name);
                $('#price').val(data.price);
                $('form').attr('action', "{{ route('inventories.update', ':id') }}".replace(':id', id));
            }
        });
    }
</script>

@endsection
