@php

$firstname =  Auth::user()->first_name;
   $lastname =  Auth::user()->last_name;
   $username = "$firstname $lastname"

@endphp

@extends('admin_layouts')


@section('admin_content')





<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Dashboard Analytics Start -->
            <section id="dashboard-analytics">
                <div class="row match-height">
                    <!-- Greetings Card starts -->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="card card-congratulations">
                            <div class="card-body text-center">

                                <div class="avatar avatar-xl bg-primary shadow">
                                    <div class="avatar-content">
                                        <i data-feather="award" class="font-large-1"></i>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h1 class="mb-1 text-white">Welcome {{$username}},</h1>
                                    <p class="card-text m-auto w-75">
                                        You have  <strong> {{$products}}  </strong> kg of products in your plant.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Greetings Card ends -->

                    <!-- daily sales count -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header flex-column align-items-start pb-0">
                                <div class="avatar bg-light-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="users" class="font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="fw-bolder mt-1"> {{$sales_today_count}}</h2>
                                <p class="card-text">Number Of sales made today</p>
                            </div>
                            <div id="gained-chart"></div>
                        </div>
                    </div>
                    <!-- daily sales count ends -->





                    <!-- daily sales value -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header flex-column align-items-start pb-0">
                                <div class="avatar bg-light-warning p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="package" class="font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="fw-bolder mt-1">₦ {{ number_format($sales_today, 2, '.', ',') }}</h2>
                                <p class="card-text">Today's Sales value</p>
                            </div>
                            <div id="order-chart"></div>
                        </div>
                    </div>
                    <!-- daily sales value ends -->
                </div>














                <!-- List DataTable -->

                <!--/ List DataTable -->
            </section>
            <!-- Dashboard Analytics end -->





              <!-- Dashboard Analytics month Start -->
              <section id="dashboard-analytics1">
                <div class="row match-height">

                    <!-- daily sales kg starts -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header flex-column align-items-start pb-2">
                                <div class="avatar bg-light-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="users" class="font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="fw-bolder mt-1"> {{$sales_today_kg}}</h2>
                                <p class="card-text">Number Of kg sold today</p>
                            </div>
                            <div id="gained-chart"></div>
                        </div>
                    </div>
                    <!-- daily sales kg ends -->

   <!-- daily sales kg starts -->
   <div class="col-lg-3 col-sm-6 col-12">
    <div class="card">
        <div class="card-header flex-column align-items-start pb-2">
            <div class="avatar bg-light-primary p-50 m-0">
                <div class="avatar-content">
                    <i data-feather="users" class="font-medium-5"></i>
                </div>
            </div>
            <h2 class="fw-bolder mt-1"> {{$sales_this_month_count}}</h2>
            <p class="card-text">Number Of sales made this month</p>
        </div>
        <div id="gained-chart"></div>
    </div>
</div>
<!-- daily sales kg ends -->

   <!-- daily sales kg starts -->
   <div class="col-lg-3 col-sm-6 col-12">
    <div class="card">
        <div class="card-header flex-column align-items-start pb-2">
            <div class="avatar bg-light-primary p-50 m-0">
                <div class="avatar-content">
                    <i data-feather="users" class="font-medium-5"></i>
                </div>
            </div>
            <h2 class="fw-bolder mt-1"> ₦ {{ number_format($sales_this_month, 2, '.', ',') }}</h2>
            <p class="card-text">This Month's Sales value</p>
        </div>
        <div id="gained-chart"></div>
    </div>
</div>
<!-- daily sales kg ends -->

   <!-- daily sales kg starts -->
   <div class="col-lg-3 col-sm-6 col-12">
    <div class="card">
        <div class="card-header flex-column align-items-start pb-2">
            <div class="avatar bg-light-primary p-50 m-0">
                <div class="avatar-content">
                    <i data-feather="users" class="font-medium-5"></i>
                </div>
            </div>
            <h2 class="fw-bolder mt-1"> {{$sales_this_month_kg}}</h2>
            <p class="card-text">Number Of kg sold this month</p>
        </div>
        <div id="gained-chart"></div>
    </div>
</div>
<!-- daily sales kg ends -->




            </section>
            <!-- Dashboard Analytics month end -->






              <!-- Dashboard Analytics year Start -->
              <section id="dashboard-analytics1">
                <div class="row match-height">



   <!-- yearly sales kg starts -->
   <div class="col-lg-3 col-sm-6 col-12">
    <div class="card">
        <div class="card-header flex-column align-items-start pb-2">
            <div class="avatar bg-light-primary p-50 m-0">
                <div class="avatar-content">
                    <i data-feather="users" class="font-medium-5"></i>
                </div>
            </div>
            <h2 class="fw-bolder mt-1"> {{$sales_this_year_count}}</h2>
            <p class="card-text">Number Of sales made this year</p>
        </div>
        <div id="gained-chart"></div>
    </div>
</div>
<!-- daily sales kg ends -->

   <!-- daily sales kg starts -->
   <div class="col-lg-3 col-sm-6 col-12">
    <div class="card">
        <div class="card-header flex-column align-items-start pb-2">
            <div class="avatar bg-light-primary p-50 m-0">
                <div class="avatar-content">
                    <i data-feather="users" class="font-medium-5"></i>
                </div>
            </div>
            <h2 class="fw-bolder mt-1"> ₦ {{ number_format($sales_this_year, 2, '.', ',') }}</h2>
            <p class="card-text">This Year's Sales value</p>
        </div>
        <div id="gained-chart"></div>
    </div>
</div>
<!-- daily sales kg ends -->

   <!-- daily sales kg starts -->
   <div class="col-lg-3 col-sm-6 col-12">
    <div class="card">
        <div class="card-header flex-column align-items-start pb-2">
            <div class="avatar bg-light-primary p-50 m-0">
                <div class="avatar-content">
                    <i data-feather="users" class="font-medium-5"></i>
                </div>
            </div>
            <h2 class="fw-bolder mt-1"> {{$sales_this_year_kg}}</h2>
            <p class="card-text">Number Of kg sold this year</p>
        </div>
        <div id="gained-chart"></div>
    </div>
</div>
<!-- daily sales kg ends -->




            </section>
            <!-- Dashboard Analytics Year end -->


            <form action="{{ route('database.sync') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-primary">
                   Sync Records
                </button>
            </form>

        </div>
    </div>
</div>
<!-- END: Content-->
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
