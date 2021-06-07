<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">アンケート画像アップロード</h4>
        お客様のご渡航中の画像のアップロードを行います。<br />
        プレビューは元のページで確認できるようになります。
    </div>
    <div class="modal-body">

        <div class="form-container">
            <form method="post" enctype="multipart/form-data" id="survey-upload">
                <div class="form-item">
                    <label>ファイル</label> <input id="file-input" type="file" name="_file"><br />
                </div>

                <div class="form-controller">
                    <button id="survey_upload" class='btn btn-primary'>送信</button>
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
    $('#survey_upload').prop('disabled', true);
    $("#file-input").change(function(){
        inputCheck("survey_upload");
    });
</script>