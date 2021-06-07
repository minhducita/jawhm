{include file=$header}
<ol class="breadcrumb" style="margin-top:70px;">
  <li><a href="staff/index/index">スタップトップページ</a></li>
  <li><a href="staff/index/manage">管理項目</a></li>
  <li>保険加入情報アップロード</li>
</ol>

<div class="wrapper">
    <div class="title">
    <h1>保険加入情報アップロード</h1>
    </div>

    <div class="form-container">
        <form method="post" action="staff/adopt/insuranceprocess" enctype="multipart/form-data">
            <div class="form-item">
                <label>ファイル</label>
                <input id="file-input" type="file" name="_file"><br />
                CSVファイルのネーミングは以下のように指定してください<br />
                insurance20140801.csv<br />
            </div>

            <div class="form-controller">
                <input id="fileCheck" type="submit" class='btn btn-primary' name="_submit" value="送信">
            </div>
            <div class="help-brolck">処理に時間がかかりますので、しばらくそのままでお待ちください。</div>
        </form>
    </div>
</div>
<script type="text/javascript" src="{$base}/mypage/themes/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="{$base}/mypage/themes/js/common.js"></script>
<script>
$('#fileCheck').prop('disabled', true);
$("#file-input").change(function(){
    inputCheck("fileCheck");
});
</script>
{include file=$footer}