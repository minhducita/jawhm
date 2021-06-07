<div class="result-container">
    <h3>ログインに成功しました。</h3><br />
    5秒後にインデックスページに移動します。<br />
    <a href="{$base}/mypage/index/index">インデックスページに移動</a>
</div>
<SCRIPT language="JavaScript">
<!--
    loadingView(false);
    mnt = 5;
    url = "{$base}/mypage/index/index";
    function jumpPage() {
      location.href = url;
    }
    setTimeout("jumpPage()",mnt*1000)
//-->
</SCRIPT>