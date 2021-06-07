<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">お客様宛てファイルアップロード</h4>
        アプリケーションフォームの送信はこちらからお願いします。<br />
        ファイル名の規則は以下の通りに従ってください。<br />
        PGIC Application form.pdf
    </div>
    <div class="modal-body">
        <div class="form-container">
            <form method="post" enctype="multipart/form-data" id="fileinput">
                <div class="form-item">
                    <label>ファイル</label> <input id="file-input" type="file" name="_file"><br />
                </div>

                <div class="form-item">
                    <select class="form-control" name="attach_class">
                        <option value="23">LoA</option>
                        <option value="24">CoE</option>
                        <option value="25">HS情報</option>
                        <option value="26">PIC情報</option>
                        <option value="96">願書</option>
                        <option value="98">ホームステイ申込書</option>
                    </select>
                </div>

                <div class="form-controller">
                    <button id="upload_client" type="button" class='btn btn-primary' name="_submit">送信</button>
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