<?php

	/* Displays the orange navigation */

?>

<link rel="stylesheet" type="text/css" media="screen" href="/sp/css/mailbox.css">
<!-- <div id="email_regis_2607">
	<form action="" method="POST">
		<div class="er-top clearfix">
			<div class="er-img">
				<img src="/images/mobile/bamukun_jawhm.png">
				<span>公式キャラクターばむくん</span>
			</div>
			<div class="er-content">
				<div class="er-p1">
					セミナーはまだ早いかな・・というアナタ
				</div>
				<div class="er-p2">
					気軽に情報収集しよう！
				</div>
			</div>
		</div>
		<div class="er-p3">
			ワーホリの基礎や最新情報を無料でお届け<br>
			乗り遅れ心配なし！タダだから今すぐ登録！
		</div>
		<div class="er-b1">
			<input type="email" name="email" placeholder="メールアドレスを入力してね" style="padding-top: 20px; padding-bottom: 20px">
			<input type="hidden" name="namae" value="ワーホリ大好き">
		</div>
		<div class="er-b2">
			<button type="button">無料メルマガを受け取る</button>
		</div>
	</form>
</div> -->
<script>
	/* 2607 email regis START */
	// $(document).ready(function(){
	// 	/*** CHECK REFERAL FROM PARDOT ***/
	// 	if( document.referrer.length !== 0 && document.referrer.indexOf("pardot") != -1 ){
	// 		alert("無料メルマガへのご登録ありがとうございました。");
	// 	};
		
	// 	$("#email_regis_2607 button").click(function(){
	// 		var txt_email = $("#email_regis_2607 input").val();
	// 		if(txt_email == '') {
	// 			alert('メールアドレスを入力してください');
	// 			return;
	// 		}
	// 		if(!validateEmail(txt_email)) {
	// 			alert('正しいメールアドレスを入力してください');
	// 			return;
	// 		}
	// 		// $("#email_regis_2607 form").attr('action', 'https://go.pardot.com/l/401302/2017-12-07/9d718t');
	// 		// $("#email_regis_2607 form").submit();
	// 		/*$.post("https://pi.pardot.com/l/401302/2017-12-07/9d718t",
	// 		{
	// 			email: txt_email,
	// 			namae: "ワーホリ大好き"
	// 		},
	// 		function(data, status){
	// 			console.log(data);
	// 			console.log(status);
	// 		});
	// 		*/
	// 	});
	// });

	function validateEmail(email) {
		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return re.test(email);
	}
	/* 2607 email regis END */
</script>

<div class="row tagMq" style ="background-color:#fff;" id="collapse1o" >

		<span id="sites_link"></span>

		<div class="list-header" href="#collapse1" >

			<p class="orange-p">

				<img style="width:10px !important; margin-top:-2px;" src="<?php echo network_site_url(); ?>/wp-content/uploads/2014/11/search-accordion2.png">	

				ジャンルからさがす

				<img class="orange-icons" src="<?php echo network_site_url(); ?>/wp-content/uploads/2015/01/orange-magnifyer.png">

			</p>

		</div>



	



	<div class="list" id="collapse1" style="">

		<ul>

			<?php

				$triangle = network_site_url() . 'wp-content/uploads/2014/11/triangle.gif';

			?>

			<li>

				<p class="p-country-list">

					<a href="<?php echo network_site_url(); ?>australia/">

						<img class="li-country-list" src="<?php echo $triangle; ?>" />

						オーストラリアについて

					</a>

				</p>

			</li>

			<li>

				<p class="p-country-list">

					<a href="<?php echo network_site_url(); ?>canada/">

						<img class="li-country-list" src="<?php echo $triangle; ?>" />

						カナダについて

					</a>

				</p>

			</li>

			<li>

				<p class="p-country-list">

					<a href="<?php echo network_site_url(); ?>newzealand/">

						<img class="li-country-list" src="<?php echo $triangle; ?>" />

						ニュージーランドについて

					</a>

				</p>

			</li>

			<li>

				<p class="p-country-list">

					<a href="<?php echo network_site_url(); ?>europe">

						<img class="li-country-list" src="<?php echo $triangle; ?>" />

						ヨーロッパについて

					</a>

				</p>

			</li>

			<li>

				<p class="p-country-list">

					<a href="<?php echo network_site_url(); ?>world/">

						<img class="li-country-list" src="<?php echo $triangle; ?>" />

						その他ワーホリ協定国について

					</a>

				</p>

			</li>

			<li>

				<p class="p-country-list">

					<a href="<?php echo network_site_url(); ?>tokyoblog/">

						<img class="li-country-list" src="<?php echo $triangle; ?>" />

						東京オフィスからの情報

					</a>

				</p>

			</li>

			<li>

				<p class="p-country-list">

					<a href="<?php echo network_site_url(); ?>osakablog/">

						<img class="li-country-list" src="<?php echo $triangle; ?>" />

						大阪オフィスからの情報

					</a>

				</p>

			</li>

			<li>

				<p class="p-country-list">

					<a href="<?php echo network_site_url(); ?>nagoyablog/">

						<img class="li-country-list" src="<?php echo $triangle; ?>" />

						名古屋オフィスからの情報

					</a>

				</p>

			</li>

			<li>

				<p class="p-country-list">

					<a href="<?php echo network_site_url(); ?>fukuokablog/">

						<img class="li-country-list" src="<?php echo $triangle; ?>" />

						福岡オフィスからの情報

					</a>

				</p>

			</li>

			<li>

				<p class="p-country-list">

					<a href="<?php echo network_site_url(); ?>okinawablog/">

						<img class="li-country-list" src="<?php echo $triangle; ?>" />

						沖縄オフィスからの情報

					</a>

				</p>

			</li>

		</ul>

		



	</div>

</div>





<div class="row tagMq" style="background-color:#fff; text-align: left;" id="collapse2o" >

		<span id="tags"></span>

		<div class="list-header" href="#collapse2" > 

			<p class="orange-p">

				<img class="li-tag-list" src="<?php echo network_site_url(); ?>/wp-content/uploads/2014/11/search-accordion2.png">

				なにを知りたい？

				<img class="orange-icons" src="<?php echo network_site_url(); ?>/wp-content/uploads/2015/01/orange-book.png">

			</p>

		</div>



	



	<div class="list" id="collapse2" style="">



		<?php get_template_part('maintop_tag_template'); ?>



	</div>

</div>