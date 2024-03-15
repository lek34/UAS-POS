<div id="delete{{ $id }}" class="modal fade">
    <div class="modal-dialog modal-confirm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="fa fa-exclamation"></i>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>
                    Do you really want to delete this
                    @if ($model)
                        <b>{{ $model->$modelAttribute }}</b>?
                    @else
                        record?
                    @endif
                    This process cannot be undone.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                <form method="post" action="{{ $route }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
