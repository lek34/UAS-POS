<div id="payment{{ $id }}" class="modal fade">
    <div class="modal-dialog modal-confirm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form id="form" method="post" action="{{ $route }}">
                @csrf
                <div class="modal-body">
                    <div class="text-center mb-13">
                        <div class="icon-box">
                            <i class="fa fa-exclamation"></i>
                        </div>
                    </div>
                    <br>
                    <p>
                        How much do you want to pay
                        <b>{{ $model->$modelAttribute }}</b> kontrakbeli?
                        This process cannot be undone.
                    </p>

                    <input type="hidden" class="form-control" value="{{ $id }}" id="{{$kontrak}}"
                        name="{{$kontrak}}">
                    <div class="row mb-2">
                        <label class="form-group">Tanggal :</label>
                        <div class="input-group date">
                            <input type="date" class="form-control" value="" placeholder="Select date"
                                id="tanggal" name="tanggal">
                        </div>
                    </div>

                    <div class="row">
                        <label class="form-group">Harga :</label>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="text" class="form-control" id="totalbayar" name="totalbayar" value="0">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
