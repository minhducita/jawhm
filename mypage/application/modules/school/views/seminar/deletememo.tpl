<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">{$msg[0].message}</h4>
    </div>

    <div class="modal-body">
        <h1>{$msg[1].message}</h1><br />
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="reload">{$msg[2].message}</button>
    </div>
</div>

<script type="text/javascript" src="{$base}/mypage/themes/js/modal.js"></script>
<script>
<!--
    mnt = 5;
    url = "{$base}/mypage/school/seminar/detail";
    function jumpPage() {
      location.href = url;
    }
    setTimeout("jumpPage()",mnt*1000);
//-->
</script>