<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">学校宛てファイルアップロード</h4>
        重要ファイルについてはこちらから送信をお願いします。
    </div>
    <div class="modal-body">
        <div class="form-container">
            <form method="post" enctype="multipart/form-data" id="fileinput">
                <div class="form-item">
                    <label>ファイル</label> <input id="file-input" type="file" name="_file"><br />
                </div>

                <div class="form-item">
                    <select class="form-control" name="attach_class">
                        <option value="97">入力済み願書</option>
                    </select>
                </div>

                <div class="form-controller">
                    <button id="upload_school" type="button" class='btn btn-primary' name="_submit">送信</button>
                    <input type="hidden" name="token" value="{$token}">
                    <input type="hidden" name="action_tag" value="fileupload">
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/common.js"></script>
<script type="text/javascript" src="themes/js/modal.js"></script>

<script>
    $("#file-input").on('change', function(){
        inputCheck("upload_file");
    });
</script>