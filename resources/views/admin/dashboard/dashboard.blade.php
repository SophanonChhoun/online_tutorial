@extends('admin.layout.default')

@section("content")
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        <div class="">
            <div class="row">
                <div class="col-md-4">
                    <div class="card-counter success">
                        <i class="fa fa-key"></i>
                        <span class="count-numbers">  {{$users ?? null }}</span>
                        <a href="/admin/user/list" style="color:white;">
                            <span class="count-name">Users</span>
                        </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card-counter warning">
                        <i class="fa fa-key"></i>
                        <span class="count-numbers">  {{$customers ?? null }}</span>
                        <a href="/admin/customer/list" style="color:white;">
                            <span class="count-name">Customers</span>
                        </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card-counter danger">
                        <i class="fa fa-key"></i>
                        <span class="count-numbers">  {{$categories ?? null }}</span>
                        <a href="/admin/category/list" style="color:white;">
                            <span class="count-name">Categories</span>
                        </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card-counter info">
                        <i class="fa fa-key"></i>
                        <span class="count-numbers">  {{$courses ?? null }}</span>
                        <a href="/admin/course/list" style="color:white;">
                            <span class="count-name">Courses</span>
                        </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card-counter siliver">
                        <i class="fa fa-bookmark"></i>
                        <span class="count-numbers"> {{ $lessons ?? null }}  </span>
                        <a href="/admin/lesson/list">
                            <span class="count-name">Lessons</span>
                        </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card-counter orange">
                        <i class="fa fa-bookmark"></i>
                        <span class="count-numbers">
                         {{ $enrollCourses ?? null }}  </span>
                        <span class="count-name">Enroll Courses</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section("script")
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@endsection
