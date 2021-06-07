{include file=$header}
<ol class="breadcrumb" style="margin-top:70px;">
  <li><a href="http://www.jawhm.or.jp/">ワーキング・ホリデー(ワーホリ)協会</a></li>
  <li>メンバー専用ページトップ</li>
</ol>

<div class="contents-wrapper">
	<h2>メンバー専用ページ</h2>
	日本ワーキングホリデー協会にメンバー登録して頂いたお客様専用ページです。<br />
	以下よりご希望のメニューを選択してください。
</div>

<ul style="list-style-type:none; ">
	<li><a href="{$base}/client/seminar/index"><span class="glyphicon glyphicon-bookmark">セミナー予約確認</span></a></li>
	<li><a href="{$base}/client/member/index"><span class="glyphicon glyphicon-edit"></span>会員情報変更</a></li>
	<li><a href=""><span class="glyphicon glyphicon-user"></span>一言相談</a></li>
</ul>

<div style="width: 60%;">
	{$username} 様の達成状況 {$current_achievement|escape} / {$total_achievement|escape} <a href=""><span class="glyphicon glyphicon-list-alt"></span>詳細を見る</a>
	<div class="progress">
 		<div class="progress-bar" role="progressbar" aria-valuenow="{$percent|escape}" aria-valuemin="0" aria-valuemax="100" style="width: {$percent|escape}%;">
			{$percent|escape}%
		</div>
	</div>
	次のステップ: {$next_step|escape}
</div>

{include file=$footer}