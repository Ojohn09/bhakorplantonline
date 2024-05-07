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
                            <h2 class="content-header-title float-start mb-0">Pos</h2>
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
                                Add New Sale
                            </button>

                            <!-- Modal -->
                            <div class="modal fade text-start" id="inlineForm" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel33">Sale </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>





                                        <form method="post" action="{{ route('pos.store') }}">
                                            @csrf
                                            <div class="modal-body">

                                                <label>Location: </label>
                                                <div class="mb-1">
                                                    <select name="location_id" class="form-control" required>
                                                        @foreach ($location as $location)
                                                            <option value="{{ $location->location_id }}">{{ $location->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <label>Attendant : </label>
                                                <div class="mb-1">
                                                    <select name="user_id" class="form-control" required>
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->first_name. ' ' . $user->last_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <label>Customer: </label>
                                                <div class="mb-1">
                                                    <select name="customer_id" id="customer_id" class="form-control" required>
                                                        @foreach ($customers as $customer)
                                                            <option value="{{ $customer->customer_id }}">{{ $customer->first_name. ' ' .$customer->last_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                {{-- <label>Product: </label>
                                                <div class="mb-1">
                                                    <select name="product_id" class="form-control" required>
                                                        @foreach ($product as $p)
                                                            <option value="{{ $p->product_id }}">{{ $p->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div> --}}

                                                <label>Product: </label>
                                                <div class="mb-1">
                                                    <select name="product_id" id="product_id" class="form-control" required>
                                                        <option value="">-- Select a product --</option>
                                                        @foreach ($products as $product)
                                                        <option value="{{ $product->product_id }}">{{ $product->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <label>Payment Type: </label>
                                                <div class="mb-1">
                                                    <select name="payment_type" id="payment_type" class="form-control" required>
                                                        <option value="Cash"> Cash</option>
                                                        <option value="POS"> POS</option>
                                                        <option value="Transfer"> Transfer</option>



                                                    </select>
                                                </div>

                                                <label>Quantity: </label>
                                                {{-- <div class="mb-1">
                                                    <input type="text" placeholder="Quantity" class="form-control" required name="quantity" />
                                                </div> --}}

                                                <div class="mb-1">
                                                    <input type="text" placeholder="Quantity" class="form-control" required name="quantity" id="quantity" />
                                                </div>


                                                 <label>Amount: </label>

                                               <div class="mb-1">
        <input type="text" placeholder="Amount" class="form-control"  name="amount" id="amount" readonly  />
    </div>


                                                {{-- <label>Amount: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="Amount" class="form-control" required name="amount" />
                                                </div> --}}

                                                {{-- <label>Pos Invoice: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="Pos Invoice" class="form-control" required name="pos_invoice" />
                                                </div> --}}
                                                {{-- <label>Date: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="Date" class="form-control" required name="date" />
                                                </div> --}}
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" >Add Sale</button>
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
                    <h4 class="card-title mb-0">Pos</h4>

                </div>
                <div class="card-body">

                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Invoice ID</th>


                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Amount</th>


                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pos as $key => $pos)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $pos->pos_invoice }}</td>
                                {{-- <td>{{ $pos->products->name }}</td> --}}

                                <td>

                                        {{ $pos->products->name }}

                                </td>
                                <td>{{ $pos->quantity }}</td>


                                <td>{{ $pos->amount }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal{{$pos->id}}">View</button>
                                    {{-- <button type="button" class="btn btn-primary print-btn" data-id="{{ $pos->id }}">Print</button> --}}
                                    {{-- <button type="button" class="btn btn-primary" onclick="window.open('{{ route('prints2') }}')">Print</button> --}}

                                    {{-- <a href="{{ route('print.pos', $pos->id) }}" class="btn btn-primary" id="basic-alert" >Print</a> --}}
                                    {{-- <button type="button" class="btn btn-primary print-pos" data-id="{{ $pos->id }}">Print</button> --}}

                                    {{-- <form method="POST" action="{{ route('printpos', $pos->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Print Receipt</button>
                                    </form> --}}


                                    {{-- <form action="{{ route('pos.destroy', $pos->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form> --}}
                                </td>
                            </tr>





 <!-- View Modal -->
<div class="modal fade" id="viewModal{{$pos->id}}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">View Sale</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="pos_id">Product ID:</label>
                    <p>{{ $pos->product_id }}</p>
                </div>
                <div class="form-group">
                    <label for="product_name">Product Name:</label>
                    <p>{{ $pos->products->name }}</p>
                </div>
                <div class="form-group">
                    <label for="supplier_name">User Name:</label>
                    <p>{{ $pos->customers->first_name. ' ' . $pos->customers->last_name  }}</p>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <p>{{ $pos->quantity }}</p>
                </div>


                <div class="form-group">
                    <label for="quantity">Price:</label>
                    <p>{{ $pos->amount }}</p>
                </div>



                <div class="form-group">
                    <label for="quantity">Payment Type:</label>
                    <p>{{ $pos->payment_type }}</p>
                </div>



                <div class="form-group">
                    <label for="date">Date:</label>
                    <p>{{ $pos->created_at }}</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<!-- View Modal -->
<div class="modal fade" id="viewModal{{$pos->id}}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">View Pos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="pos_id">Product ID:</label>
                    <p>{{ $pos->product_id }}</p>
                </div>
                <div class="form-group">
                    <label for="product_name">Product Name:</label>
                    <p>{{ $pos->products->name }}</p>
                </div>
                <div class="form-group">
                    <label for="supplier_name">User Name:</label>
                    <p>{{ $pos->customers->name }}</p>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <p>{{ $pos->quantity }}</p>
                </div>

                <div class="form-group">
                    <label for="date">Date:</label>
                    <p>{{ $pos->created_at }}</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




{{-- Edit Modal --}}
{{--
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Pos</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="{{ route('pos.update', $pos->id) }}">
            @csrf
            @method('PUT')
            <div class="modal-body">
              <div class="form-group">
                <label for="supplier_id">Supplier</label>
                <select class="form-control" required id="supplier_id" name="supplier_id">
                  @foreach($supplier as $supplier)
                    <option value="{{ $supplier->id }}" {{ $pos->supplier_id == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="comments">Comments</label>
                <textarea class="form-control" required id="comments" name="comments">{{ $pos->comment }}</textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
          </form>
        </div>

    </div>
</div> --}}






                            @endforeach
                        </tbody>


                    </table>

                    <div class="pagination d-flex justify-content-end" >
                        {{-- {{ $pos->links('pagination::bootstrap-4') }} --}}
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
            url: "{{ route('pos.edit', ':id') }}".replace(':id', id),
            method: 'get',
            success: function(data) {
                $('#pos_id').val(data.pos_id);
                $('#name').val(data.name);
                $('#price').val(data.price);
                $('form').attr('action', "{{ route('pos.update', ':id') }}".replace(':id', id));
            }
        });
    }
</script>
{{-- <script type="text/javascript">
    $(document).ready(function() {
        $('#product_id').change(function() {
            var product_id = $(this).val();
            if (product_id != '') {
                $.get('{{ url('get-product-price') }}' + '/' + product_id, function(price) {
                    if (price) {
                        $('#amount').val(price);
                    } else {
                        $('#amount').val('');
                        alert('Failed to fetch product price.');
                    }
                });
            }
        });

        $('#quantity').change(function() {
            var quantity = $(this).val();
            var price = $('#amount').val();
            if (quantity != '' && price != '') {
                var amount = parseFloat(quantity) * parseFloat(price);
                $('#amount').val(amount.toFixed(2));
            }
        });


        $('#amount').change(function() {
            var amount = $(this).val();
            var price2 = $('#quantity').val();
            if (amount != '' && price2 != '') {
                var quantity = parseFloat(amount) / parseFloat(price2);
                $('#quantity').val(quantity.toFixed(2));
            }
        });



    });
</script> --}}


<script>
$(document).ready(function() {
    $('#product_id').change(function() {
        var product_id = $(this).val();

         var customer_id = $('#customer_id').val();
        if (product_id != '') {
            $.get('{{ url('get-product-price') }}/' + product_id + '/' + customer_id, function(price) {
                if (price) {
                    $('#amount').val(price);
                } else {
                    $('#amount').val('');
                    alert('Failed to fetch product price.');
                }
            });
        }
    });

    $('#quantity').change(function() {
        var quantity = parseFloat($(this).val());
        if (!isNaN(quantity)) {
            var product_id = $('#product_id').val();
            var customer_id = $('#customer_id').val();
            if (product_id != '') {
                $.get('{{ url('get-product-price') }}/' + product_id + '/' + customer_id, function(price) {
                    if (price) {
                        var amount = quantity * price;
                        $('#amount').val(amount.toFixed(2));
                    } else {
                        $('#amount').val('');
                        alert('Failed to fetch product price.');
                    }
                });
            }
        }
    });
});






</script>

<script>
    // Get the print button
    const printBtn = document.getElementById('print-receipt');

    // Add a click event listener to the button
    printBtn.addEventListener('click', async (event) => {
        event.preventDefault();

        try {
            // Make a GET request to the /print-pos route to generate and print the receipt
            const response = await fetch('{{ route('printpos') }}');
            if (response.ok) {
                alert('Print successful!');
                // Redirect back to the POS index page after printing
                window.location.href = '{{ route('pos.index') }}';
            } else {
                throw new Error('Failed to print receipt.');
            }
        } catch (error) {
            console.error(error);
            alert('Failed to print receipt.');
        }
    });
</script>




@endsection
