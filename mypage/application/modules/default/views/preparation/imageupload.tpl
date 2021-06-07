<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">フライト画像アップロード</h4>
        お客様のフライト情報を確認できる画像のアップロードを行います。<br />
        プレビューは元のページで確認できるようになります。
    </div>
    <div class="modal-body">

        <div class="form-container">
            <form method="post" enctype="multipart/form-data" id="flight-upload">
                <div class="form-item">
                    <label>ファイル</label> <input id="file-input" type="file" name="_file"><br />
                </div>

                <div class="help-block">写真を撮る/アップロードする際に反射光が入っていないことを確認してください。</div>

                <div class="form-controller">
                    <input type="hidden" name="token" value="{$token}">
                    <input type="hidden" name="action_tag" value="flight-image">
                    <input id="flight_upload" type="button" class='btn btn-primary' name="_submit" value="送信" disabled="disabled">
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="themes/js/bootstrap.min.js"></script>
<script type="text/javascript" src="themes/js/common.js"></script>
<script type="text/javascript" src="themes/js/modal.js"></script>

<script>
    $("#survey-input").change(function(){
        inputCheck("survey_upload");
    });
</script>