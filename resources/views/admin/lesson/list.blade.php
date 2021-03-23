@extends("admin.layout.default")

@section("content")
    <div class="container-fluid">
        <h1 class="mt-4">User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                Users
            </li>
        </ol>

        <div class="row">
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                <div class="form-group has-search">
                    <form action="/admin/lesson/list" method="get">
                        <div class="input-group">
                            <input type="text" placeholder="@lang('general.search')" name="search" value="{{ request()->get('search') }}">
                            <button type="submit" class="btn-success"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-8 col-sm-8 col-md-8 col-xs-8">
                <form action="/admin/lesson/list" method="get">
                    <label for="">Course: </label>
                    <div class="columns columns-left ">
                        <select name="course" class="form-control" onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}" {{ request()->get('course') == $course->id ? 'selected' : '' }}>
                                    {{ $course->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>

        </div>
        <br>
        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    @include("admin.lesson.table")
                    @include("admin.layout.pagination")
                </div>
            </div>
        </div>
    </div>
@endsection

