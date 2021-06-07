<?php
require_once '../../include/header.php';
$header_obj = new Header();

$header_obj->title_page='日本ワーキング・ホリデー協会（ワーホリ)| 年2万人超のセミナー来場者数';
$header_obj->description_page='ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。年間25,000人以上の方に、セミナーに参加頂いています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。ワーホリなら日本ワーキングホリデー協会';
if($header_obj->computer_use() == false && $_SESSION['pc'] != 'on'){
	$header_obj->add_css_files = "<link href='/css/top/top_mobile.css' rel='stylesheet' type='text/css'>";
}
$header_obj->add_css_files = "<link href='../css/style.css' rel='stylesheet' type='text/css'>";
$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../../images/mainimg/top-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = 'メンバーログイン | メンバー専用ページ';
$header_obj->full_link_tag = true;

$header_obj->display_header();
?>

<body>

<div id="questions_wrap">
	<div class="image-area">
		<img src="../img/shindan_header02.png" />
	</div>
	<div class="head-area">
		<div class="head-done">
			第<span id="done_num">1</span>問
		</div>
		<div class="head-rest">
			<div class="rest-circle">
				残り<br /><span id="rest_num">17</span>問
			</div>
		</div>
	</div>
	<div class="question-area" id="question_area">&nbsp;</div>
	<div class="answer-head">
		&nabla; 自分に近いものを選んで下さい &nabla;
	</div>
	
	<div class="wrap-answer">
		<div class="common-answer" onclick="answer_click(1)">
			かなり当てはまる<span class="gt-answer">&gt;</span>
		</div>
		<div class="common-answer" onclick="answer_click(2)">
			当てはまる<span class="gt-answer">&gt;</span>
		</div>
		<div class="common-answer" onclick="answer_click(3)">
			やや当てはまる<span class="gt-answer">&gt;</span>
		</div>
		<div class="common-answer" onclick="answer_click(4)">
			やや当てはまらない<span class="gt-answer">&gt;</span>
		</div>
		<div class="common-answer" onclick="answer_click(5)">
			当てはまらない<span class="gt-answer">&gt;</span>
		</div>
		<div class="common-answer" onclick="answer_click(6)">
			全く当てはまらない<span class="gt-answer">&gt;</span>
		</div>
	</div>
	
	<div class="back-question">
		<span onclick="back_click()"><u>&lt; 前の質問に戻る</u></span>
	</div>
</div>
<?php fncMenuFooter($header_obj->footer_type); ?>
<script>
	<?php
	define("QUESTION1", "「限定モノ」や「流行モノ」に弱く、すぐ欲しくなる");
	define("QUESTION2", "どうしても必要なもの以外、買わないほうだ");
	define("QUESTION3", "一流・有名ブランド、メーカーの商品を買うのが好きだ（衣料品、バッグ、時計など）");
	define("QUESTION4", "口コミ情報を参考にすることが多い");
	define("QUESTION5", "最低限の情報を持っていれば十分だ");
	define("QUESTION6", "趣味や興味関心ごとなどのうんちくはたくさん持っている");
	define("QUESTION7", "周りのみんなが持っているモノを自分だけ持っていないと不安に感じる");
	define("QUESTION8", "周りの人がみんな買っているならその商品は間違いなく良いモノだと思う");
	define("QUESTION9", "周りの人が持っているモノなどを見て思わず自分も欲しくなってしまうことが多い");
	define("QUESTION10", "丈夫で長持ちするモノを選ぶことが多い");
	define("QUESTION11", "情報は広く浅く知っていれば十分だと思う");
	define("QUESTION12", "情報は人より早く知っていることが多い");
	define("QUESTION13", "情報収集に時間をかけるのはもったいない");
	define("QUESTION14", "情報収集は自ら積極的に行うほうだ");
	define("QUESTION15", "買い物をすること自体が楽しく、好きだ");
	define("QUESTION16", "面白いと思った情報は周りの人に話したくなる");
	define("QUESTION17", "流行に左右されない、長年使い続けられるものを選ぶことが多い");
	define("QUESTION18", "良いと思った情報はできるだけ多くの人と共有することが多い");
	$questions = array(QUESTION1,QUESTION2,QUESTION3,QUESTION4,QUESTION5,QUESTION6,QUESTION7,QUESTION8,QUESTION9,QUESTION10,QUESTION11,QUESTION12,QUESTION13,QUESTION14,QUESTION15,QUESTION16,QUESTION17,QUESTION18);
	$q_original = $questions;
	shuffle($questions);
	?>
	var log_answer = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
	var s_pancake = 0; var s_macaron = 0; var s_fr_bread = 0; var s_donuts = 0; var s_cookie = 0; var s_bread = 0;
	var questions = [
		"<?php echo $questions[0]; ?>",
		"<?php echo $questions[1]; ?>",
		"<?php echo $questions[2]; ?>",
		"<?php echo $questions[3]; ?>",
		"<?php echo $questions[4]; ?>",
		"<?php echo $questions[5]; ?>",
		"<?php echo $questions[6]; ?>",
		"<?php echo $questions[7]; ?>",
		"<?php echo $questions[8]; ?>",
		"<?php echo $questions[9]; ?>",
		"<?php echo $questions[10]; ?>",
		"<?php echo $questions[11]; ?>",
		"<?php echo $questions[12]; ?>",
		"<?php echo $questions[13]; ?>",
		"<?php echo $questions[14]; ?>",
		"<?php echo $questions[15]; ?>",
		"<?php echo $questions[16]; ?>",
		"<?php echo $questions[17]; ?>"
	];
	var q_original = [
		"<?php echo $q_original[0]; ?>",
		"<?php echo $q_original[1]; ?>",
		"<?php echo $q_original[2]; ?>",
		"<?php echo $q_original[3]; ?>",
		"<?php echo $q_original[4]; ?>",
		"<?php echo $q_original[5]; ?>",
		"<?php echo $q_original[6]; ?>",
		"<?php echo $q_original[7]; ?>",
		"<?php echo $q_original[8]; ?>",
		"<?php echo $q_original[9]; ?>",
		"<?php echo $q_original[10]; ?>",
		"<?php echo $q_original[11]; ?>",
		"<?php echo $q_original[12]; ?>",
		"<?php echo $q_original[13]; ?>",
		"<?php echo $q_original[14]; ?>",
		"<?php echo $q_original[15]; ?>",
		"<?php echo $q_original[16]; ?>",
		"<?php echo $q_original[17]; ?>"
	];
	var question = 0;
	document.getElementById("question_area").innerHTML = questions[question];
	
	function answer_click(level)
	{
		log_answer[question] = level;
		if(question != 17) {
			question++;
			change_content();
		} else {
			go_result();
		}
	}
	function back_click()
	{
		if(question != 0) {
			question--;
			change_content();
		}
	}
	function change_content()
	{
		document.getElementById("question_area").innerHTML = questions[question];
		document.getElementById("done_num").innerHTML = question+1;
		document.getElementById("rest_num").innerHTML = 18-(question+1);
	}
	function go_result()
	{
		var order_origin, max_val;
		for (var i=0; i<18; i++) {
			order_origin = get_order_origin(questions[i]);
			score_by_question(order_origin, log_answer[i]);
		}

		max_val = find_max_value();
		if(s_pancake == max_val) { window.location.replace("../pancake"); return true; }
		if(s_macaron == max_val) { window.location.replace("../macaron"); return true; }
		if(s_bread == max_val) { window.location.replace("../bread"); return true; }
		if(s_donuts == max_val) { window.location.replace("../donuts"); return true; }
		if(s_fr_bread == max_val) { window.location.replace("../fr_bread"); return true; }
		if(s_cookie == max_val) { window.location.replace("../cookie"); return true; }
	}
	function find_max_value()
	{
		var max_value = s_pancake;
		if(s_macaron > max_value) { max_value = s_macaron; }
		if(s_bread > max_value) { max_value = s_bread; }
		if(s_donuts > max_value) { max_value = s_donuts; }
		if(s_fr_bread > max_value) { max_value = s_fr_bread; }
		if(s_cookie > max_value) { max_value = s_cookie; }
		
		return max_value;
	}
	function get_order_origin(questStr)
	{
		if(questStr == "<?php echo QUESTION1; ?>") { return 1; }
		if(questStr == "<?php echo QUESTION2; ?>") { return 2; }
		if(questStr == "<?php echo QUESTION3; ?>") { return 3; }
		if(questStr == "<?php echo QUESTION4; ?>") { return 4; }
		if(questStr == "<?php echo QUESTION5; ?>") { return 5; }
		if(questStr == "<?php echo QUESTION6; ?>") { return 6; }
		if(questStr == "<?php echo QUESTION7; ?>") { return 7; }
		if(questStr == "<?php echo QUESTION8; ?>") { return 8; }
		if(questStr == "<?php echo QUESTION9; ?>") { return 9; }
		if(questStr == "<?php echo QUESTION10; ?>") { return 10; }
		if(questStr == "<?php echo QUESTION11; ?>") { return 11; }
		if(questStr == "<?php echo QUESTION12; ?>") { return 12; }
		if(questStr == "<?php echo QUESTION13; ?>") { return 13; }
		if(questStr == "<?php echo QUESTION14; ?>") { return 14; }
		if(questStr == "<?php echo QUESTION15; ?>") { return 15; }
		if(questStr == "<?php echo QUESTION16; ?>") { return 16; }
		if(questStr == "<?php echo QUESTION17; ?>") { return 17; }
		if(questStr == "<?php echo QUESTION18; ?>") { return 18; }
	}
	function score_by_question(quest, level)
	{
		if(quest == 1) {
			if(level == 1) { s_pancake++; } if(level == 2) { s_macaron++; } if(level == 3) { s_bread++; }
			if(level == 4) { s_donuts++; } if(level == 5) { s_cookie++; } if(level == 6) { s_fr_bread++; }
		}
		if(quest == 2) {
			if(level == 1) { s_donuts++; } if(level == 2) { s_fr_bread++; } if(level == 3) { s_bread++; }
			if(level == 4) { s_cookie++; } if(level == 5) { s_macaron++; } if(level == 6) { s_pancake++; }
		}
		if(quest == 3) {
			if(level == 1) { s_macaron++; } if(level == 2) { s_bread++; } if(level == 3) { s_pancake++; }
			if(level == 4) { s_cookie++; } if(level == 5) { s_donuts++; } if(level == 6) { s_fr_bread++; }
		}
		if(quest == 4) {
			if(level == 1) { s_macaron++; } if(level == 2) { s_bread++; } if(level == 3) { s_donuts++; }
			if(level == 4) { s_pancake++; } if(level == 5) { s_cookie++; } if(level == 6) { s_fr_bread++; }
		}
		if(quest == 5) {
			if(level == 1) { s_cookie++; } if(level == 2) { s_macaron++; } if(level == 3) { s_fr_bread++; }
			if(level == 4) { s_donuts++; } if(level == 5) { s_pancake++; } if(level == 6) { s_bread++; }
		}
		if(quest == 6) {
			if(level == 1) { s_bread++; } if(level == 2) { s_pancake++; } if(level == 3) { s_donuts++; }
			if(level == 4) { s_fr_bread++; } if(level == 5) { s_macaron++; } if(level == 6) { s_cookie++; }
		}
		if(quest == 7) {
			if(level == 1) { s_pancake++; } if(level == 2) { s_macaron++; } if(level == 3) { s_fr_bread++; }
			if(level == 4) { s_bread++; } if(level == 5) { s_cookie++; } if(level == 6) { s_donuts++; }
		}
		if(quest == 8) {
			if(level == 1) { s_fr_bread++; } if(level == 2) { s_macaron++; } if(level == 3) { s_bread++; }
			if(level == 4) { s_pancake++; } if(level == 5) { s_cookie++; } if(level == 6) { s_donuts++; }
		}
		if(quest == 9) {
			if(level == 1) { s_macaron++; } if(level == 2) { s_pancake++; } if(level == 3) { s_bread++; }
			if(level == 4) { s_fr_bread++; } if(level == 5) { s_cookie++; } if(level == 6) { s_donuts++; }
		}
		if(quest == 10) {
			if(level == 1) { s_fr_bread++; } if(level == 2) { s_bread++; } if(level == 3) { s_donuts++; }
			if(level == 4) { s_cookie++; } if(level == 5) { s_macaron++; } if(level == 6) { s_pancake++; }
		}
		if(quest == 11) {
			if(level == 1) { s_pancake++; } if(level == 2) { s_macaron++; } if(level == 3) { s_cookie++; }
			if(level == 4) { s_fr_bread++; } if(level == 5) { s_donuts++; } if(level == 6) { s_bread++; }
		}
		if(quest == 12) {
			if(level == 1) { s_bread++; } if(level == 2) { s_pancake++; } if(level == 3) { s_macaron++; }
			if(level == 4) { s_donuts++; } if(level == 5) { s_fr_bread++; } if(level == 6) { s_cookie++; }
		}
		if(quest == 13) {
			if(level == 1) { s_pancake++; } if(level == 2) { s_fr_bread++; } if(level == 3) { s_macaron++; }
			if(level == 4) { s_cookie++; } if(level == 5) { s_donuts++; } if(level == 6) { s_bread++; }
		}
		if(quest == 14) {
			if(level == 1) { s_pancake++; } if(level == 2) { s_bread++; } if(level == 3) { s_macaron++; }
			if(level == 4) { s_fr_bread++; } if(level == 5) { s_donuts++; } if(level == 6) { s_cookie++; }
		}
		if(quest == 15) {
			if(level == 1) { s_pancake++; } if(level == 2) { s_macaron++; } if(level == 3) { s_bread++; }
			if(level == 4) { s_donuts++; } if(level == 5) { s_cookie++; } if(level == 6) { s_fr_bread++; }
		}
		if(quest == 16) {
			if(level == 1) { s_pancake++; } if(level == 2) { s_donuts++; } if(level == 3) { s_fr_bread++; }
			if(level == 4) { s_macaron++; } if(level == 5) { s_bread++; } if(level == 6) { s_cookie++; }
		}
		if(quest == 17) {
			if(level == 1) { s_bread++; } if(level == 2) { s_fr_bread++; } if(level == 3) { s_donuts++; }
			if(level == 4) { s_cookie++; } if(level == 5) { s_macaron++; } if(level == 6) { s_pancake++; }
		}
		if(quest == 18) {
			if(level == 1) { s_donuts++; } if(level == 2) { s_pancake++; } if(level == 3) { s_bread++; }
			if(level == 4) { s_macaron++; } if(level == 5) { s_fr_bread++; } if(level == 6) { s_cookie++; }
		}
	}
</script>
</body>
</html>
