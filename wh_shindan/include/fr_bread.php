<div class="big-title">
	プランニング法セミナー
</div>
<div class="image-main">
	<img src="../img/shindan_seminar_plan.png" />
</div>
<div class="commonL-area">
	「出発するまで」「出発してから」<br />
	「帰ってきた後」ついて、<br />
	どんなプランが皆さんに合っているか、<br />
	どうやってプランニングをして行くのかを<br />
	ご紹介するセミナーです。
</div>
<div class="commonL-area">
	渡航プランを作るために<br />
	何が必要なのかをお伝えするので<br />
	無駄なく計画を立てることができます。
</div>
<div class="medium-title">
	このセミナーに参加する
</div>
<div class="commonL-area">
	セミナーは各会場で随時開催中です。<br />
	お近くの会場を選択してください。
</div>
<div class="button-group">
	<table>
		<tr>
			<td class="side-L"><a class="panel-a" href="panel-sub-tokyo-sp"><img src="../img/button_tokyo.png" /></a></td>
			<td class="side-R"><a class="panel-a" href="panel-sub-osaka-sp"><img src="../img/button_osaka.png" /></a></td>
		</tr>
		<tr>
			<td class="side-L"><a class="panel-a" href="panel-sub-nagoya-sp"><img src="../img/button_nagoya.png" /></a></td>
			<td class="side-R">&nbsp;</td>
		</tr>
	</table>
</div>
<div class="bar-area">
	<img src="../img/shindan_bar.png" />
</div>

<div class="seminarbox">
  <div id="panel-sub-tokyo-sp" class="panel-sub">
		<h4>年内渡航相談会セミナー　東京会場</h4>
		<?php
		$config['list']['place_default'] = 'tokyo';
		$sm = new SeminarModule($config);
		$exists = $sm->show();
		if(!$exists) echo "<p>現在セミナースケジュールの調整中です。</p>";
		?>
		<p class="moreView"><a href="/seminar/seminar">セミナー情報をもっと見る</a></p>
	</div>
	<div id="panel-sub-osaka-sp" class="panel-sub">
		<h4>年内渡航相談会セミナー　大阪会場</h4>
		<?php
		$config['list']['place_default'] = 'osaka';
		$sm = new SeminarModule($config);
		$exists = $sm->show();
		if(!$exists) echo "<p>現在セミナースケジュールの調整中です。</p>";
		?>
		<p class="moreView"><a href="/seminar/seminar">セミナー情報をもっと見る</a></p>
	</div>
	<div id="panel-sub-nagoya-sp" class="panel-sub">
		<h4>年内渡航相談会セミナー　名古屋会場</h4>
		<?php
		$config['list']['place_default'] = 'nagoya';
		$sm = new SeminarModule($config);
		$exists = $sm->show();
		if(!$exists) echo "<p>現在セミナースケジュールの調整中です。</p>";
		?>
		<p class="moreView"><a href="/seminar/seminar">セミナー情報をもっと見る</a></p>
	</div>
</div><!-- /.seminarbox -->