@extends("admin.layout.default")

@section("content")
    <div class="container-fluid">
        <h1 class="mt-4">Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                Categorys
            </li>
        </ol>

        <div class="row">
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                <div class="form-group has-search">
                    <form action="/admin/category/list" method="get">
                        <div class="input-group">
                            <input type="text" placeholder="@lang('general.search')" name="search" value="{{ request()->get('search') }}">
                            <button type="submit" class="btn-success"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                <form action="/admin/category/list" method="get">
                    <label for="">Status: </label>
                    <div class="columns columns-left btn-group">
                        <select name="is_enable" class="form-control" onchange="this.form.submit()">
                            <option value="">All</option>
                            <option value="1" {{ request()->get('is_enable') == '1' ? 'selected' : '' }}>
                                @lang('general.active')
                            </option>
                            <option value="0" {{ request()->get('is_enable') == '0' ? 'selected' : '' }}>
                                @lang('general.inactive')
                            </option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                <a href="/admin/category/create" class="btn btn-primary" style="margin-bottom: 30px">@lang('general.create')</a>
            </div>

        </div>

        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    @include("admin.category.table")
                    @include("admin.layout.pagination")
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script>
        const data = @json($data);

    </script>
    <script>
        function status(item)
        {
            $(document).ready(function(){
                $("#myBtn"+item.id).click(function(){
                    $("#myModal"+item.id).modal();
                });
                $("#itemStatus"+item.id).click(function(){
                    $("#status"+item.id).modal();
                });
            });
        }
        data.data.forEach(status);

    </script>
@endsection
