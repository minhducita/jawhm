<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">{$msg[0].message}</h4>
    </div>

    <div class="modal-body">
        <h1>{$msg[1].message}</h1><br />
        {$msg[2].message}<br />
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onClick="jumpPage()">{$msg[3].message}</button>
    </div>
</div>

<script type="text/javascript" src="{$base}/mypage/themes/js/modal.js"></script>
<SCRIPT language="JavaScript">
<!--
    mnt = 5;
    url = "{$base}/mypage/school/index/index";
    function jumpPage() {
      location.href = url;
    }
    setTimeout("jumpPage()",mnt*1000)
//-->
</SCRIPT>