-<div class="cell auto-size padding20 bg-white" id="cell-content">
    <h1 class="text-light">Manage Calendar <span class="mif-calendar place-right"></span></h1>
    <hr class="thin bg-grayLighter">
    <div class="container box padding10 bg-white">
        <div class="row clearfix">
            <div id="calendar">
            </div>
        </div>
    </div> 

    <div class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="error"></div>
                    <form class="form-horizontal" id="crud-form">
                        <div class="container">
                            <div class="form-group">
                                <label  for="title">Title</label>
                                <input id="title" name="title" type="text" class="form-control input-md" />
                            </div>
                            <div class="form-group">
                                <label for="time">Time</label>
                                <div class="col-md-4 input-append bootstrap-timepicker">
                                    <input id="time" name="time" type="text" class="form-control input-md" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="description">Description</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="color">Color</label>
                                <div class="col-md-4">
                                    <input id="color" name="color" type="text" class="form-control input-md" readonly="readonly" />
                                    <span class="help-block">Click to pick a color</span>
                                </div>
                            </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>


</div>
</div>
</div>
</div>
</div>
</body>