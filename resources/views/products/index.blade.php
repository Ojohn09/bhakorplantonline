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
                            <h2 class="content-header-title float-start mb-0">Products</h2>
                            <div class="breadcrumb-wrapper">

                            </div>
                        </div>
                    </div>
                </div>


                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <!-- Button trigger modal -->
                            @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2 )
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#inlineForm" disabled>
                                Add New Product
                            </button>
                            @endif

                            <!-- Modal -->
                            <div class="modal fade text-start" id="inlineForm" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel33">Product </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="post" action="{{ route('products.store') }}">
                                            @csrf
                                            <div class="modal-body">


                                                <label>Product ID: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="Product ID" class="form-control" required name="product_id" />
                                                </div>
                                                <label>Product Name: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="Product Name" class="form-control" required name="name" />
                                                </div>
                                                <label>Price: </label>
                                                <div class="mb-1">
                                                    <input type="number" placeholder="Price" class="form-control" required name="price" />
                                                </div>


                                                <label>Bulk Price: </label>
                                                <div class="mb-1">
                                                    <input type="number" placeholder="Bulk Price" class="form-control" required name="bulk_price" />
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary "  >Add Product</button>
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
                    <h4 class="card-title mb-0">Products</h4>

                </div>
                <div class="card-body">

                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Bulk Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $product->product_id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->bulk_price }}</td>
                                <td>
                                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal{{$product->id}}">View</button> --}}

                                    {{-- <a href="{{ route('products.edit', $product->id) }}" class="btn btn-secondary mr-1">Edit</a> --}}
                                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{$product->id}}">Edit</button> --}}

                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal{{$product->id}}">View</button>
                                    {{-- <button type="button" class="btn btn-primary" onclick="openEditModal({{ $product->id }})">Edit</button> --}}
                                    @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2 )
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" disabled>Edit</button>


                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" disabled>Delete</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>




                            <!-- View Modal -->
<div class="modal fade" id="viewModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">View Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="product_id">Product ID:</label>
                    <p>{{ $product->product_id }}</p>
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <p>{{ $product->name }}</p>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <p>{{ $product->price }}</p>
                </div>


                <div class="form-group">
                    <label for="price">Bulk Price:</label>
                    <p>{{ $product->bulk_price }}</p>
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
                                            <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="post" action="{{ route('products.update', $product->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="product_id">Product ID</label>
                                                    <input type="text" class="form-control" required id="product_id" name="product_id" value="{{ $product->product_id }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" required id="name" name="name" value="{{ $product->name }}">
                                                </div>



                                                <div class="form-group">
                                                    <label for="price">Price</label>
                                                    <input type="number" class="form-control" required id="price" name="price" value="{{ $product->price }}">
                                                </div>


                                                <div class="form-group">
                                                    <label for="bulk_price">Bulk Price</label>
                                                    <input type="number" class="form-control" required id="bulk_price" name="bulk_price" value="{{ $product->bulk_price }}">
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Save changes</button>

                                                </div>


                                            </div>

                                            </div>

                                        </form>
                                        </div>
                                    </div>



                                </div>
                            @endforeach
                        </tbody>


                    </table>



                    <div class="pagination d-flex justify-content-end" >
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>




                </div>
            </div>
        </div>
    </div>
    <!-- Hoverable rows end -->













            </div>
        </div>
    </div>







{{--



<div class="modal fade" id="viewModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="viewModalLabel">Product Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Product ID: {{$product->product_id}}</p>
          <p>Product Name: {{$product->name}}</p>
          <p>Product Price: {{$product->price}}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>














<div class="modal fade" id="editModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('products.update', $product->id) }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="product_id">Product ID</label>
                        <input type="text" class="form-control" required id="product_id" name="product_id" value="{{ $product->product_id }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" required id="name" name="name" value="{{ $product->name }}">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" required id="price" name="price" value="{{ $product->price }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>

                </div>
            </div>
        </div>
</div> --}}


















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
            url: "{{ route('products.edit', ':id') }}".replace(':id', id),
            method: 'get',
            success: function(data) {
                $('#product_id').val(data.product_id);
                $('#name').val(data.name);
                $('#price').val(data.price);
                $('#bulk_price').val(data.bulk_price);
                $('form').attr('action', "{{ route('products.update', ':id') }}".replace(':id', id));
            }
        });
    }
</script>

@endsection
