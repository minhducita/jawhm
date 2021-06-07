<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">記入済みホームステイ申込書アップロード</h4>
        お客様の記入済みホームステイ申込書をアップロードできます。
    </div>
    <div class="modal-body">
        <div class="form-container">
            <form method="post" enctype="multipart/form-data" id="homestay-upload">
                <div class="form-item">
                    <label>ファイル</label> <input id="file-input" type="file" name="_file"><br />
                </div>

                <div class="form-controller">
                    <input id="homestay_upload" type="button" class='btn btn-primary' name="_submit" value="送信" disabled="disabled">
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
    $("#file-input").change(function(){
        inputCheck("homestay_upload");
    });
</script>