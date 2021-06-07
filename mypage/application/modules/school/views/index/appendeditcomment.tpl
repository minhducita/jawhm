<br />
<h3>{$msg[0].message}</h3>
{$msg[1].message}<br />
{$msg[2].message}<br />
<button type="button" class="btn btn-primary" id="comment_renew">{$msg[3].message}</button>
<script>
<!--
    var no = {$no}
    $('#collapse_'+no).css('height', 225+'px');

    mnt = 5;
    setTimeout("jumpPage()",mnt*1000)

    $('#comment_renew').click(function() {
        jumpPage();
    });

    function jumpPage() {
        submit_action('school/index/contactreload', null, 'refresh');
    }
//-->
</script>