<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">{$msg[0].message}</h4>
        {$msg[1].message}
    </div>
    <div class="modal-body">
        <div class="form-container">
            <form method="post" enctype="multipart/form-data" id="fileinput">
                <div class="form-item">
                    <label>{$msg[2].message}</label> <input id="file-input" type="file" name="_file"><br />
                </div>

                <div class="form-item">
                    <select class="form-control" name="attach_class">
                        <option value="21">{$msg[5].message}</option>
                        <option value="22">{$msg[6].message}</option>
                        <option value="23">{$msg[7].message}</option>
                        <option value="24">{$msg[8].message}</option>
                        <option value="100">{$msg[9].message}</option>
                        <option value="26">{$msg[10].message}</option>
                    </select>
                </div>

                <div class="form-controller">
                    <button id="upload_file" type="button" class='btn btn-primary' name="_submit">{$msg[3].message}</button>
                    <input type="hidden" name="token" value="{$token}">
                    <input type="hidden" name="action_tag" value="fileupload">
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{$msg[4].message}</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/common.js"></script>
<script type="text/javascript" src="themes/js/modal.js"></script>

<script>
    $("#file-input").on('change', function(){
        inputCheck("upload_file");
    });
</script>