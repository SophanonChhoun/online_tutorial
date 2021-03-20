<div class="modal fade" id="myModal{{ $user->id }}" role="dialog">
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
                    <p>Are you sure you want to delete {{ $user->name ?? null }}?</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ url('admin/user/delete/'.$user->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">@lang('general.delete')</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('general.close')</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
