
<table class="table table-bordered">
    <tr>
        <th>Title</th>
        <th>Duration in minute</th>
        <th>Course</th>
    </tr>
    @forelse($data as $lesson)
        <tr>
            <td>{{ $lesson->title }}</td>
            <td>{{ $lesson->duration }}</td>
            <td>{{ $lesson->course->title ?? null }}</td>
            @empty
                <td colspan="3" class="text-center">There is no value</td>
        </tr>
    @endforelse
</table>
