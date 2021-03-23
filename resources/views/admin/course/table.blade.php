
<table class="table table-bordered">
    <tr>
        <th>Title</th>
        <th>Duration</th>
        <th>Author</th>
        <th>Category</th>
        <th>Header Image</th>
        <th>@lang('general.status')</th>
        <th colspan="2" class="text-center">@lang('general.action')</th>
    </tr>
    @forelse($data as $course)
        <tr>
            <td>{{ $course->title }}</td>
            <td>{{ $course->durations }}</td>
            <td>{{ $course->author->name ?? null}}</td>
            <td>{{ $course->category->name ?? null }}</td>
            <td><img src="{{ $course->media->file_url ?? asset('image/noimage.png') }}" class="img-responsive" style="max-height: 200px;max-width: 200px"></td>
            <td>
                <input type="checkbox" id="itemStatus{{ $course->id }}" @if($course->is_enable) checked @endif>
                @include("admin.course.status")
            </td>
            <td><a href="/admin/course/show/{{ $course->id }}" class="btn btn-warning">@lang('general.edit')</a></td>
            <td>
                <button type="button" class="btn btn-danger" id="myBtn{{ $course->id }}">@lang('general.delete')</button>
                @include('admin.course.delete')
            </td>
            @empty
                <td colspan="7" class="text-center">There is no value</td>
        </tr>
    @endforelse
</table>
