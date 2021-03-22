<div class="modal fade" id="status{{ $course->id }}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('general.sure')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to update {{ $course->name ?? null }} status?</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ url('admin/course/update/status/'.$course->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="is_enable" value="{{ $course->is_enable ? 0 : 1 }}">
                        <button type="submit" class="btn btn-warning">Update</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('general.close')</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
