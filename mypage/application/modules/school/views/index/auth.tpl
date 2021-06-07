<div class="result-container">
    <h3>{$msg[0].message}</h3><br />
    {$msg[1].message}<br />
    <a href="{$base}/mypage/school/index/index">{$msg[2].message}</a>
</div>
<script>
<!--
    loadingView(false);
    mnt = 5;
    url = "{$base}/mypage/school/index/index";
    function jumpPage() {
      location.href = url;
    }
    setTimeout("jumpPage()",mnt*1000)
//-->
</script>