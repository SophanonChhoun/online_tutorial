
<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>@lang('general.status')</th>
        <th colspan="2" class="text-center">@lang('general.action')</th>
    </tr>
    @forelse($data as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>
                <input type="checkbox" id="itemStatus{{ $category->id }}" @if($category->is_enable) checked @endif>
                @include("admin.category.status")
            </td>
            <td><a href="/admin/category/show/{{ $category->id }}" class="btn btn-warning">@lang('general.edit')</a></td>
            <td>
                <button type="button" class="btn btn-danger" id="myBtn{{ $category->id }}">@lang('general.delete')</button>
                @include('admin.category.delete')
            </td>
            @empty
                <td colspan="4" class="text-center">There is no value</td>
        </tr>
    @endforelse
</table>
