{include file=$header}
<ol class="breadcrumb" style="margin-top:70px;">
  <li><a href="{$base}/mypage/staff/index/index">スタップトップページ</a></li>
  <li>管理項目</li>
</ol>

<div class="list-group">
    <h4 class="panel-title">
        <a class="list-group-item btn-info-custom">管理項目一覧</a>
    </h4>

    <a href="staff/adopt/insuranceupload" class="list-group-item">保険加入情報アップロード</a>
    <a href="staff/adopt/insuranceerrorlist" class="list-group-item">保険加入情報取込みエラー一覧</a>
    <a href="staff/edit/schoollist" class="list-group-item">学校担当者管理一覧</a>
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse" class="list-group-item">メンテナンス</a>
    <div id="collapse" class="panel-collapse collapse">
        <a href="staff/edit/index" class="list-group-item">達成状況・催促メール・確認メール一覧文言変更</a>
        <a href="staff/edit/stepchart" class="list-group-item">ステップチャート文言変更</a>
        <a href="staff/edit/nextstep" class="list-group-item">次のステップ文言変更</a>
        <a href="staff/edit/schoollang" class="list-group-item">学校ページ言語修正</a>
        <a href="staff/edit/airport" class="list-group-item">空港名編集</a>
    </div>
</div>
{include file=$footer}