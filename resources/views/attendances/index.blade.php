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
                            <h2 class="content-header-title float-start mb-0">Attendances</h2>
                            <div class="breadcrumb-wrapper">

                            </div>
                        </div>
                    </div>
                </div>

{{--
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#inlineForm">
                                Clock In
                            </button>

                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal2" data-bs-target="#inlineForm2">
                                Clock Out
                            </button>

                            <!-- clockin Modal -->
                            <div class="modal fade text-start" id="inlineForm" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel33">Attendance Clock In </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>





                                        <form method="post" action="{{ route('attendances.store') }}">
                                            @csrf
                                            <div class="modal-body">
                                                <label>User: </label>
                                                <div class="mb-1">
                                                    <select name="user_id" class="form-control">
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->first_name . ' ' . $user->last_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Mark Attendance</button>
                                                </div>
                                            </div>
                                        </form>





                                                </div>
                                </div>
                            </div>

                            <!-- clockout Modal -->









                        </div>
                    </div>
                </div>
 --}}




                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <!-- Button trigger modal for clockin -->
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#inlineForm" disabled>
                                Clock In
                            </button>

                            <!-- Button trigger modal for clockout -->
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#inlineForm2" disabled>
                                Clock Out
                            </button>

                            <!-- clockin Modal -->
                            <div class="modal fade text-start" id="inlineForm" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel33">Attendance Clock In </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="post" action="{{ route('attendances.store') }}">
                                            @csrf
                                            <div class="modal-body">
                                                <label>User: </label>
                                                <div class="mb-1">
                                                    <select name="user_id" class="form-control" required>
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->first_name . ' ' . $user->last_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Mark Attendance</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- clockout Modal -->
                            <div class="modal fade text-start" id="inlineForm2" tabindex="-1" aria-labelledby="myModalLabel34" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel34">Attendance Clock Out </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form  method="post" action="{{ route('attendances.clock-out') }}">
                                            @csrf
                                            <div class="modal-body">
                                                <label>User: </label>
                                                <div class="mb-1">
                                                    <select name="user_id" class="form-control">
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->first_name . ' ' . $user->last_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Mark Attendance</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> </div>
            </div>
            <div class="content-body">







    <!-- Hoverable rows start -->
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="card-title mb-0">Attendances</h4>

                </div>
                <div class="card-body">

                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>

                                <th>Staff Name</th>
                                <th>Clock in</th>
                                <th>Clock Out</th>
                                <th>Status</th>
                                 <th>Date</th>
                                {{-- <th>Actions</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendances as $key => $attendance)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                {{-- <td>{{ $attendance->products->name }}</td> --}}

                                <td>

                                    {{ (!empty($attendance->user->first_name) ? $attendance->user->first_name . ' ' : '') . (!empty($attendance->user->last_name) ? $attendance->user->last_name : '') }}


                                </td>

                                <td>{{ $attendance->clock_in }}</td>
                                <td>

                                        {{ $attendance->clock_out }}

                                </td>

                                <td>{{ $attendance->status }}</td>


                                <td>{{ $attendance->created_at }}</td>

                            </tr>















                            @endforeach
                        </tbody>


                    </table>
                    <div class="pagination d-flex justify-content-end" >
                        {{ $attendances->links('pagination::bootstrap-4') }}
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



@endsection
