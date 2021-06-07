<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">パスポート閲覧</h4>
        お客様のパスポートのアップロードと確認が行えます。
    </div>
    <div class="modal-body">
        {if $flag.passport_flag == 1}
            <h3><a href="application/getfile?file_no=4&branch_no={$branch_no}" target="_blank">パスポート確認</a></h3>
        {/if}

        <div class="form-container">
            <form method="post" enctype="multipart/form-data" id="passport_upload">
                <div class="form-item">
                    <label>ファイル</label> <input id="file-input" type="file" name="_file"><br />
                </div>

                <div class="help-block">写真を撮る/アップロードする際に反射光が入っていないことを確認してください。</div>

                <div class="form-controller">
                    <button id="pass_upload" class="btn btn-primary">送信</button>
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
    $('#pass_upload').prop('disabled', true);
    $("#file-input").change(function(){
        inputCheck("pass_upload");
    });
</script>