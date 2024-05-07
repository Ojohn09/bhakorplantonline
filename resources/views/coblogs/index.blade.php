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
                            <h2 class="content-header-title float-start mb-0">Coblogs</h2>
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
                                Add New Close of business log
                            </button>

                            <!-- Modal -->
                            <div class="modal fade text-start" id="inlineForm" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel33">Coblog </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>





                                        <form method="post" action="{{ route('coblogs.store') }}">
                                            @csrf
                                            <div class="modal-body">

                                                <label>Product: </label>
                                                <div class="mb-1">
                                                    <select name="product_id" class="form-control" required>
                                                        @foreach ($product as $product)
                                                            <option value="{{ $product->product_id }}">{{ $product->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <label>Quantity: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="Quantity" class="form-control" required name="quantity" />
                                                </div>
                                                <label>Comment : </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="Comment" class="form-control" required name="comment" />
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" >Add Coblog</button>
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
                    <h4 class="card-title mb-0">Coblogs</h4>

                </div>
                <div class="card-body">

                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2 )
                                <th> Expected Quantity</th>
                                @endif


                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coblogs as $key => $coblog)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                {{-- <td>{{ $coblog->products->name }}</td> --}}

                                <td>

                                        {{ $coblog->products->name }}

                                </td>
                                <td>{{ $coblog->quantity }}</td>
                                @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2 )
                                <td>{{ $coblog->expected_quantity }}</td>
                                @endif


                                <td>{{ $coblog->date }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal{{$coblog->id}}">View</button>

                                </td>
                            </tr>




 <!-- View Modal -->
<div class="modal fade" id="viewModal{{$coblog->id}}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">View Coblog</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="coblog_id">Product ID:</label>
                    <p>{{ $coblog->product_id }}</p>
                </div>
                <div class="form-group">
                    <label for="product_name">Product Name:</label>
                    <p>{{ $coblog->products->name }}</p>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <p>{{ $coblog->quantity }}</p>
                </div>

                @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2 )
                <div class="form-group">
                    <label for="supplier_name">Expected Quantity:</label>
                    <p>{{ $coblog->expected_quantity }}</p>
                </div>


                <div class="form-group">
                    <label for="supplier_name"> Quantity Difference:</label>
                    <p>{{    $coblog->quantity - $coblog->expected_quantity }}</p>
                </div>

                @endif



                <div class="form-group">
                    <label for="date">Comment:</label>
                    <p>{{ $coblog->comment }}</p>
                </div>

                <div class="form-group">
                    <label for="date">Date:</label>
                    <p>{{ $coblog->date }}</p>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>












                            @endforeach
                        </tbody>


                    </table>

                    <div class="pagination d-flex justify-content-end" >
                        {{ $coblogs->links('pagination::bootstrap-4') }}
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
            url: "{{ route('coblogs.edit', ':id') }}".replace(':id', id),
            method: 'get',
            success: function(data) {
                $('#coblog_id').val(data.coblog_id);
                $('#name').val(data.name);
                $('#price').val(data.price);
                $('form').attr('action', "{{ route('coblogs.update', ':id') }}".replace(':id', id));
            }
        });
    }
</script>

@endsection
