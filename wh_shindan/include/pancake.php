<div class="big-title">
	語学学校セミナー
</div>
<div class="image-main">
	<img src="../img/shindan_seminar_school.png" />
</div>
<div class="commonL-area">
	海外の語学学校で働くスタッフ方を<br />
	特別講師としてお招きし、学校情報や<br />
	現地での生活について話していただく<br />
	セミナーです。
</div>
<div class="commonL-area">
	また、海外のリアルタイムな情報や<br />
	体験談も聞くことができます。
</div>
<div class="commonL-area">
	学校によっては年に数回しか開催されず、<br />
	ここでしか聞けない限定情報が満載ですよ！
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
			<td class="side-R"><a class="panel-a" href="panel-sub-fukuoka-sp"><img src="../img/button_fukuoka.png" /></a></td>
		</tr>
		<tr>
			<td class="side-L"><a class="panel-a" href="panel-sub-online-sp"><img src="../img/button_online.png" /></a></td>
			<td class="side-R">&nbsp;</td>
		</tr>
	</table>
</div>
<div class="bar-area">
	<img src="../img/shindan_bar.png" />
</div>
<div class="seminarbox">
	<div id="panel-sub-tokyo-sp" class="panel-sub">
		<h4>初心者セミナー　東京会場</h4>
		<?php
		$config['list']['place_default'] = 'tokyo';
		$sm = new SeminarModule($config);
		$exists = $sm->show();
		if(!$exists) echo "<p>現在セミナースケジュールの調整中です。</p>";
		?>
		<p class="moreView"><a href="/seminar/seminar">セミナー情報をもっと見る</a></p>
	</div>
	<div id="panel-sub-osaka-sp" class="panel-sub">
		<h4>初心者セミナー　大阪会場</h4>
		<?php
		$config['list']['place_default'] = 'osaka';
		$sm = new SeminarModule($config);
		$exists = $sm->show();
		if(!$exists) echo "<p>現在セミナースケジュールの調整中です。</p>";
		?>
		<p class="moreView"><a href="/seminar/seminar">セミナー情報をもっと見る</a></p>
	</div>
	<div id="panel-sub-nagoya-sp" class="panel-sub">
		<h4>初心者セミナー　名古屋会場</h4>
		<?php
		$config['list']['place_default'] = 'nagoya';
		$sm = new SeminarModule($config);
		$exists = $sm->show();
		if(!$exists) echo "<p>現在セミナースケジュールの調整中です。</p>";            ?>
		<p class="moreView"><a href="/seminar/seminar">セミナー情報をもっと見る</a></p>
	</div>
	<div id="panel-sub-fukuoka-sp" class="panel-sub">
		<h4>初心者セミナー　福岡会場</h4>
		<?php
		$config['list']['place_default'] = 'fukuoka';
		$sm = new SeminarModule($config);
		$exists = $sm->show();
		if(!$exists) echo "<p>現在セミナースケジュールの調整中です。</p>";
		?>
		<p class="moreView"><a href="/seminar/seminar">セミナー情報をもっと見る</a></p>
	</div>
	<div id="panel-sub-online-sp" class="panel-sub">
		<h4>初心者セミナー　オンライン会場</h4>
		<p class="pad10">
			日本ワーキング・ホリデー協会のメンバー登録をすると、<br>
			オンラインでセミナーを受けることが出来るようになります！<br><br>
		</p>
		<a class="memBtn" href="/mem/">
			<img class="btn-hover" src="/shindan/images/btn_member.png" alt="メンバー登録する！">
		</a>
	</div>
</div>