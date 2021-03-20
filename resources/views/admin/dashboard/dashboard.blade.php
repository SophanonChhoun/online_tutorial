@extends('admin.layout.default')

{{--@section("content")--}}
{{--    <div class="container-fluid">--}}
{{--        <h1 class="mt-4">Dashboard</h1>--}}
{{--        <ol class="breadcrumb mb-4">--}}
{{--            <li class="breadcrumb-item active">Dashboard</li>--}}
{{--        </ol>--}}

{{--        <div class="">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-3">--}}
{{--                    <div class="card-counter success">--}}
{{--                        <i class="fa fa-key"></i>--}}
{{--                        <span class="count-numbers">  {{$room_available }}</span>--}}
{{--                        <a href="/admin/rooms/list/1" style="color:white;">--}}
{{--                            <span class="count-name">Room Available</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-md-3">--}}
{{--                    <div class="card-counter warning">--}}
{{--                        <i class="fa fa-calendar"></i>--}}
{{--                        <span class="count-numbers">--}}
{{--                      {{ $check_in }}</span>--}}
{{--                        <span class="count-name">Check-In</span>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-md-3">--}}
{{--                    <div class="card-counter danger">--}}
{{--                        <i class="fa fa-usd"></i>--}}
{{--                        <span class="count-numbers">{{ $check_out }}</span>--}}
{{--                        <span class="count-name">Check-Out</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-3">--}}
{{--                    <div class="card-counter info">--}}
{{--                        <i class="fa fa-bookmark"></i>--}}
{{--                        <span class="count-numbers">--}}
{{--                     {{ $room_booked }}  </span>--}}
{{--                        <a href="/admin/rooms/list/0">--}}
{{--                            <span class="count-name">Room Booked</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="">--}}
{{--                <div class="row">--}}

{{--                    <div class="col-md-3">--}}

{{--                        <div class="card-counter primary">--}}
{{--                            <i class="fa fa-home"></i>--}}
{{--                            <span class="count-numbers">  {{$total_room }}</span>--}}
{{--                            <a href="/admin/rooms/list" style="color:white;"><span class="count-name">Room</span></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-md-3">--}}
{{--                        <div class="card-counter siliver">--}}
{{--                            <i class="fa fa-archive"></i>--}}
{{--                            <span class="count-numbers">--}}
{{--                      {{ $room_type }}</span>--}}
{{--                            <a href="/admin/room_type/list" style="color:white;"><span class="count-name">Room Type</span></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-md-3">--}}
{{--                        <div class="card-counter orange">--}}
{{--                            <i class="fa fa-users" aria-hidden="true"></i>--}}
{{--                            <span class="count-numbers">{{ $customer_today }}</span>--}}
{{--                            <a href="/admin/customer/list" style="color:white"><span class="count-name">New Customers</span></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3">--}}
{{--                        <div class="card-counter secondary">--}}
{{--                            <i class="fa fa-money"></i>--}}
{{--                            <span class="count-numbers">--}}
{{--                        {{$payment_today }}</span>--}}
{{--                            <a href="/admin/payments/list" style="color:white"><span class="count-name">Payment</span></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <form action="{{ url('/admin/report/show') }}" method="get">--}}
{{--                    <div class="row">--}}
{{--                            <div class="col-xs-4 col-lg-4" >--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>From :</label>   <input type="date" id="start_date"  name="start_date" >--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-xs-4 col-lg-4">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>To :</label>  <input type="date"  id="end_date" name="end_date">--}}
{{--                                </div></div>--}}
{{--                            <div class="col-xs-4 col-lg-4">--}}
{{--                                <input class="btn btn-primary" type="submit" value="show Report">--}}
{{--                            </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--                <div id="top_x_div" class="p-3 mb-2" style="height: 600px; width: 100%"></div>--}}
{{--                <h1 class="p-3 mb-2">Recently Booking</h1>--}}
{{--                    <table class="table table-bordered "  id="table_id">--}}
{{--                        <tr>--}}
{{--                            <th>ID</th>--}}
{{--                            <th>Customer</th>--}}
{{--                            <th>Hotel</th>--}}
{{--                            <th>Booking Type</th>--}}
{{--                            <th>Check in</th>--}}
{{--                            <th>Check out</th>--}}
{{--                            <th>Status</th>--}}
{{--                            <th colspan="2" class="text-center">Action</th>--}}
{{--                        </tr>--}}
{{--                        <div class="col-md-5"></div>--}}
{{--                        @forelse($data as $booking)--}}
{{--                            <tr>--}}
{{--                                <td>{{ $booking->id }}</td>--}}
{{--                                <td>--}}
{{--                                    <a href="{{ url('/admin/bookings/show/payment/'.$booking->id) }}">{{ $booking->customer->last_name ?? null }} {{ $booking->customer->first_name ?? null }}</a>--}}
{{--                                </td>--}}
{{--                                <td>{{ $booking->hotel->name }}</td>--}}
{{--                                <td>{{ $booking->booking_type->name }}</td>--}}
{{--                                <td>{{ $booking->check_in_date }}</td>--}}
{{--                                <td>{{ $booking->check_out_date }}</td>--}}
{{--                                <td>--}}
{{--                                    <input type="checkbox" data-toggle="modal" data-target="#status{{ $booking->id }}" @if($booking->is_enable) checked @endif>--}}
{{--                                    @include("admin.booking.status")--}}
{{--                                </td>--}}
{{--                                <td><a href="/admin/bookings/show/{{ $booking->id }}" class="btn btn-warning">Edit</a></td>--}}
{{--                                <td>--}}
{{--                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{ $booking->id }}">Delete</button>--}}
{{--                                    @include('admin.booking.delete')--}}
{{--                                </td>--}}
{{--                                @empty--}}
{{--                                    <td colspan="5" class="text-center">There is no value</td>--}}
{{--                            </tr>--}}
{{--                        @endforelse--}}
{{--                    </table>--}}
{{--    </div>--}}

{{--@endsection--}}

@section("script")
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
{{--                <script type="text/javascript">--}}
{{--                    google.charts.load('current', {'packages':['bar']});--}}
{{--                    google.charts.setOnLoadCallback(drawStuff);--}}

{{--                    function drawStuff() {--}}
{{--                        var data = new google.visualization.arrayToDataTable([--}}
{{--                            ['Room Type', 'Money'],--}}
{{--                            @foreach($roomTypes as $roomType)--}}
{{--                                ['{{$roomType->name}}',{{$roomType->total}}],--}}
{{--                            @endforeach--}}
{{--                        ]);--}}

{{--                        var options = {--}}
{{--                            width: 800,--}}
{{--                            legend: { position: 'none' },--}}
{{--                            chart: {--}}
{{--                                title: 'Room type',--}}
{{--                                subtitle: 'money get by each room type' },--}}
{{--                            axes: {--}}
{{--                                x: {--}}
{{--                                    0: { side: 'top', label: 'Currency dollar'} // Top x-axis.--}}
{{--                                }--}}
{{--                            },--}}
{{--                            bar: { groupWidth: "90%" }--}}
{{--                        };--}}

{{--                        var chart = new google.charts.Bar(document.getElementById('top_x_div'));--}}
{{--                        // Convert the Classic options to Material options.--}}
{{--                        chart.draw(data, google.charts.Bar.convertOptions(options));--}}
{{--                    };--}}
{{--                </script>--}}

@endsection
