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
                            <h2 class="content-header-title float-start mb-0">Locations</h2>
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
                                Add New Location
                            </button>

                            <!-- Modal -->
                            <div class="modal fade text-start" id="inlineForm" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel33">Location </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>



                                        {{-- <form method="post" action="{{ route('locations.store') }}">
                                            @csrf
                                            <div class="modal-body">


                                                <label>Location ID: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="Location ID" class="form-control" required name="location_id" />
                                                </div>
                                                <label>Location Name: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="Location Name" class="form-control" required name="name" />
                                                </div>
                                                <label>Price: </label>
                                                <div class="mb-1">
                                                    <input type="number" placeholder="Price" class="form-control" required name="price" />
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" >Add Location</button>
                                            </div>
                                        </form> --}}


                                        <form method="post" action="{{ route('locations.store') }}">
                                            @csrf
                                            <div class="modal-body">
                                                <label>Location ID: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="Location ID" class="form-control" required name="location_id" />
                                                </div>
                                                <label>Location Name: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="Location Name" class="form-control" required name="name" />
                                                </div>
                                                <label>Address: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="Address" class="form-control" required name="address" />
                                                </div>
                                                <label>Phone: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="Phone" class="form-control" required name="phone" />
                                                </div>
                                                <label>Email: </label>
                                                <div class="mb-1">
                                                    <input type="email" placeholder="Email" class="form-control" required name="email" />
                                                </div>
                                                <label>Website: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="Website" class="form-control" required name="website" />
                                                </div>
                                                <label>Description: </label>
                                                <div class="mb-1">
                                                    <textarea class="form-control" required placeholder="Description" name="description"></textarea>
                                                </div>
                                                <label>Image: </label>
                                                <div class="mb-1">
                                                    <input type="file" placeholder="Image" class="form-control" required name="image" />
                                                </div>
                                                <label>Longitude: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="Longitude" class="form-control" required name="longitude" />
                                                </div>
                                                <label>Latitude: </label>
                                                <div class="mb-1">
                                                    <input type="text" placeholder="Latitude" class="form-control" required name="latitude" />
                                                </div>
                                                <label>Status: </label>
                                                <div class="mb-1">
                                                    <select name="status" class="form-control" required>
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>

                                                    </select>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" >Add Location</button>
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
                    <h4 class="card-title mb-0">Locations</h4>

                </div>
                <div class="card-body">

                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Location ID</th>
                                <th>Location Name</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($locations as $key => $location)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $location->location_id }}</td>
                                <td>{{ $location->name }}</td>
                                <td>{{ $location->phone }}</td>
                                <td>

                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal{{$location->id}}">View</button>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" disabled>Edit</button>

                                    <form action="{{ route('locations.destroy', $location->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" disabled>Delete</button>
                                    </form>
                                </td>
                            </tr>




                            <!-- View Modal -->
<div class="modal fade" id="viewModal{{$location->id}}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">View Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="location_id">Location ID:</label>
                    <p>{{ $location->location_id }}</p>
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <p>{{ $location->name }}</p>
                </div>
                <div class="form-group">
                    <label for="price">Address:</label>
                    <p>{{ $location->address }}</p>
                </div>

                <div class="form-group">
                    <label for="price">Phone:</label>
                    <p>{{ $location->phone }}</p>
                </div>

                <div class="form-group">
                    <label for="price">Email:</label>
                    <p>{{ $location->email }}</p>
                </div>

                <div class="form-group">
                    <label for="price">Website:</label>
                    <p>{{ $location->website }}</p>
                </div>

                <div class="form-group">
                    <label for="price">Status:</label>
                    <p>{{ $location->status == 1 ? 'Active' : 'Inactive' }}</p>

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
                                            <h5 class="modal-title" id="editModalLabel">Edit Location</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        {{-- <form method="post" action="{{ route('locations.update', $location->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="location_id">Location ID</label>
                                                    <input type="text" class="form-control" required id="location_id" name="location_id" value="{{ $location->location_id }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" required id="name" name="name" value="{{ $location->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="price">Price</label>
                                                    <input type="text" class="form-control" required id="price" name="price" value="{{ $location->price }}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Save changes</button>

                                            </div>
                                        </form> --}}

                                        <form method="post" action="{{ route('locations.update', $location->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" required id="name" name="name" value="{{ $location->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control" required id="address" name="address" value="{{ $location->address }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" class="form-control" required id="phone" name="phone" value="{{ $location->phone }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" required id="email" name="email" value="{{ $location->email }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="website">Website</label>
                                                    <input type="text" class="form-control" required id="website" name="website" value="{{ $location->website }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control" required id="description" name="description">{{ $location->description }}</textarea>
                                                </div>
                                                {{-- <div class="form-group">
                                                    <label for="image">Image</label>
                                                    <input type="file" class="form-control" required id="image" name="image">
                                                </div> --}}
                                                <div class="form-group">
                                                    <label for="longitude">Longitude</label>
                                                    <input type="text" class="form-control" required id="longitude" name="longitude" value="{{ $location->longitude }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="latitude">Latitude</label>
                                                    <input type="text" class="form-control" required id="latitude" name="latitude" value="{{ $location->latitude }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="status">Status</label>

                                                    <select class="form-control" required id="status" name="status">
                                                        <option value="1" {{ $location->status == 1 ? 'selected' : '' }}>Active</option>
                                                        <option value="0" {{ $location->status == 0 ? 'selected' : '' }}>Inactive</option>
                                                    </select>


                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Save changes</button>

                                                    </div>


                                                        {{-- <div class="mb-1">
                                                        <select name="status" class="form-control" required>
                                                            <option value="1">Active</option>
                                                            <option value="0">Inactive</option>

                                                        </select>
                                                    </div> --}}

                                        </div>
                                    </div>


                                </div>
                            @endforeach
                        </tbody>


                    </table>

                    <div class="pagination d-flex justify-content-end" >
                        {{ $locations->links('pagination::bootstrap-4') }}
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
            url: "{{ route('locations.edit', ':id') }}".replace(':id', id),
            method: 'get',
            success: function(data) {
                $('#name').val(data.name);

                $('form').attr('action', "{{ route('locations.update', ':id') }}".replace(':id', id));
            }
        });
    }
</script>

@endsection
