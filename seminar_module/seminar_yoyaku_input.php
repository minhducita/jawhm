<?php
session_start();
//header('Access-Control-Allow-Origin:*');
//header("P3P: CP='UNI CUR OUR'");
header('Access-Control-Allow-Origin:http://'.$_GET['acao']);
//header('Access-Control-Allow-Origin:http://mryugaku.dev.platetec.com');
//header('Access-Control-Allow-Origin:http://sabusan.jp');
//header('Access-Control-Allow-Origin:http://srs.jawhm.or.jp');
header('Access-Control-Allow-Credentials:true');
$output = "";

function get_select_countries()
{
	$countries = array(
                'アメリカ',
		'オーストラリア',
		'ニュージーランド',
		'カナダ',
		'韓国',
		'フランス',
		'ドイツ',
		'イギリス',
		'アイルランド',
		'デンマーク',
		'ノルウェー',
		'台湾',
		'香港',
		'未定',
	);

	$output = "";
	$output .= '
	<style type="text/css">
#countries_checkbox label {
  display: inline-block;
  padding-right: 20px;
}
</style>
	<div id="countries_checkbox">
';
	foreach ($countries as $one) {
		$output .= '<label><input type="checkbox" name="興味国[]" value="' . $one . '">&nbsp;' . $one . '</label>';
	}
	$output .= '</div>';

	return $output;
}

function get_select_yotei()
{
	$yotei = array(
		'3ヶ月以内',
		'6ヶ月以内',
		'1年以内',
		'2年以内',
		'未定',
	);

	$output = "";
	$output .= '
<select class="timestart" name="出発時期">
	<option value="">選択してください</option>
';
	foreach ($yotei as $one) {
		$output .= '<option value="' . $one . '">' . $one . '</option>';
	}
	$output .= "</select>";
	return $output;
}
if (@$_SESSION['mem_id'] != '') {

	$ini = parse_ini_file('../../bin/pdo_member.ini', FALSE);
	$db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->query('SET CHARACTER SET utf8');
	$stt = $db->prepare('SELECT id, email, namae, furigana, tel, country FROM memlist WHERE id = :id ');
	$stt->bindValue(':id', $_SESSION['mem_id']);
	$stt->execute();
	$member_info = $stt->fetch();

	$output .= '

		<div style="margin: 10px;"></div>
		<div class="tab-form">
        	<div class="left">
            	<p>お名前</p>
            </div>
            <div class="double flex">' . $member_info['namae'] . ' 様
            	<input type="hidden" name="お名前" id="txt_name" value="' . $member_info['namae'] . '" size=20>
				<input type="hidden" name="フリガナ" id="txt_furigana" value="' . $member_info['furigana'] . '" size=20>
				<input type="hidden" name="メール" id="txt_mail" value="' . $member_info['email'] . '" size=40><br/>
				<input type="hidden" name="電話番号" id="txt_tel" value="' . $member_info['tel'] . '" size=20>
			</div>
        </div>
		<div id="lg_hajimete" class="tab-form">
            <p class="left">興味のある国</p>
            <div id="countries_checkbox" class="right flex">
                <ul>
                    <li><input type="checkbox" name="興味国[]" value="アメリカ">アメリカ</li>
                    <li><input type="checkbox" name="興味国[]" value="カナダ">カナダ</li>
                    <li><input type="checkbox" name="興味国[]" value="アイルランド">アイルランド</li>
                    <li><input type="checkbox" name="興味国[]" value="デンマーク">デンマーク</li>
                </ul>
                <ul>
                    <li><input type="checkbox" name="興味国[]" value="オーストラリア">オーストラリア</li>
                    <li><input type="checkbox" name="興味国[]" value="韓国">韓国</li>
                    <li><input type="checkbox" name="興味国[]" value="フランス">フランス</li>
                    <li><input type="checkbox" name="興味国[]" value="香港">香港</li>
                </ul>
                <ul>
                    <li><input type="checkbox" name="興味国[]" value="ニュージーランド">ニュージーランド</li>
                    <li><input type="checkbox" name="興味国[]" value="ドイツ">ドイツ</li>
                    <li><input type="checkbox" name="興味国[]" value="ノルウェー">ノルウェー</li>
                    <li><input type="checkbox" name="興味国[]" value="未定">未定</li>
                </ul>
                <ul>
                    <li><input type="checkbox" name="興味国[]" value="イギリス">イギリス</li>
                    <li><input type="checkbox" name="興味国[]" value="台湾">台湾</li>
                </ul>
            </div>
        </div>
        <div class="tab-form">
            <p class="left">出発予定時期</p>
            <div class="right">' . get_select_yotei() . '</div>
        </div>
        <div class="tab-form">
            <p class="left">その他</p>
            <div class="right top">
                <textarea name="その他" id="txt_memo" value="" size=50></textarea>
            </div>
        </div>
        <div class="bottom">
            <p>このフォームでは<span style="font-weight: bold;"> 仮予約 </span>を行います。</p>
			<p>予約確認のメールをお送りしますので、メールの指示に従って予約を確定させてください。</p>
			<br>
            <p>なお、ご入力頂いたお客様の個人情報は、<a href="https://www.jawhm.or.jp/privacy.html" target="_blank">当協会のプライバシーポリシー</a>に従い取扱を行います。</p>
        </div>
            		';
} else {
	$output = '
		<div style="margin: 10px;"></div>
		<div class="tab-form">
        	<div class="left">
            	<p>お名前</p>
                <p class="redd">必須</p>
            </div>
            <div class="double flex">
            	<input type="text" autofocus="" name="お名前" id="txt_name" value="" size=10 required="" placeholder="姓 . 例）　山田">
            	<input type="text" name="お名前2" id="txt_name2" value="" size=10 required="" placeholder="名 . 例）太郎">
			</div>
        </div>
		<div class="tab-form">
        	<div class="left">
            	<p>ふりがな</p>
                <p class="redd">必須</p>
        	</div>
            <div class="double flex">
            	<input type="text" name="フリガナ" id="txt_furigana" value="" size=10 required="" placeholder="せい . 例） やまだ">
                <input type="text" name="フリガナ2" id="txt_furigana2" value="" size=10 required="" placeholder="めい . 例）たろう">
            </div>
        </div>
		<div class="tab-form">
        	<div class="left">
            	<p>当日連絡の付く<br>電話番号</p>
            	<p class="redd">必須</p>
            </div>
            <div class="right">
            	<input name="電話番号" id="txt_tel" value="" size=20 required="" type="tel" placeholder="09012345678">
            </div>
        </div>
		<div class="tab-form">
        	<div class="left">
            	<p>メールアドレス</p>
            	<p class="redd">必須</p>
            </div>
        	<div class="right">
            	<input required="" name="メール" id="txt_mail" value="" size=40 type="email" placeholder="info@jawhm.or.jp">
                <p><span><input type="checkbox" id="style-checkbox" name="mailkaiin-input" checked onclick="check_mailkaiin(this);"/><label for="style-checkbox"></label></span>このメールアドレスをメール会員(無料)に登録する</p>

				<input type="hidden" name="mailkaiin" value="on"/>
        	</div>
        </div>
		<div class="tab-form">
        	<div class="left" style="background:#fff"></div>
            <div class="right">
            	※予約確認のメールをお送りします。必ず有効なアドレスを入力してください。<br>
                <b>ご注意</b> <a href="http://www.jawhm.or.jp/blog/tokyoblog/今日の協会オフィス/2610/" target="_blank">hotmail、live.jp等のメアドをご利用の方へ</a>
            </div>
        </div>
		<div class="tab-form">
        	<p class="left">興味のある国</p>
            <div id="countries_checkbox" class="right flex">
            	<ul>
                	<li><input type="checkbox" name="興味国[]" value="アメリカ">アメリカ</li>
                    <li><input type="checkbox" name="興味国[]" value="カナダ">カナダ</li>
                    <li><input type="checkbox" name="興味国[]" value="アイルランド">アイルランド</li>
                    <li><input type="checkbox" name="興味国[]" value="デンマーク">デンマーク</li>
                </ul>
                <ul>
                    <li><input type="checkbox" name="興味国[]" value="オーストラリア">オーストラリア</li>
                    <li><input type="checkbox" name="興味国[]" value="韓国">韓国</li>
                    <li><input type="checkbox" name="興味国[]" value="フランス">フランス</li>
                    <li><input type="checkbox" name="興味国[]" value="香港">香港</li>
                </ul>
                <ul>
                	<li><input type="checkbox" name="興味国[]" value="ニュージーランド">ニュージーランド</li>
                	<li><input type="checkbox" name="興味国[]" value="ドイツ">ドイツ</li>
                	<li><input type="checkbox" name="興味国[]" value="ノルウェー">ノルウェー</li>
                	<li><input type="checkbox" name="興味国[]" value="未定">未定</li>
                </ul>
                <ul>
                	<li><input type="checkbox" name="興味国[]" value="イギリス">イギリス</li>
                	<li><input type="checkbox" name="興味国[]" value="台湾">台湾</li>
                </ul>
        	</div>
        </div>
		<div class="tab-form">
        	<p class="left">出発予定時期</p>
            <div class="right">' . get_select_yotei() . '</div>
        </div>
		<div class="tab-form" style="display:none;">
        	<p class="left">同伴者有無</p>
            <div class="right flex" id="event_ul">
            	<label style="display:none;"><input type="checkbox" name="同伴者" id="txt_dohan">同伴者あり</label>
            	<p style="width:100%;margin-top:0px;">※同伴者がいる場合はその他に記載してください。</p>
            </div>
        </div>
        <script>
            attr =  document.getElementById("txt_id").value;

            if (attr == 35089) {
                document.getElementById("event_ul").innerHTML = "<label style=\'display:none;\'><input type=\'checkbox\' name=\'同伴者\' id=\'txt_dohan\'>同伴者あり</label><ul><li style=\'color:red;font-weight:bold;\'>※こちらのイベントには同伴者不可となっております。</li><li style=\'color:red;font-weight:bold;\'>※お連れ様とのご参加をご希望の場合はそれぞれご予約ください。</li></ul>";
            }
        </script>
        <div class="tab-form">
        	<p class="left">その他の情報</p>
            <div class="right top">
            	<textarea name="その他" id="txt_memo" value="" placeholder="" size=50>・お住いの都道府県：
・現地で成し遂げたい目標：
・具体的な英語力の目標：</textarea>
            </div>
        </div>
        <div class="bottom">
        	<p>このフォームでは<span style="font-weight: bold;"> 仮予約 </span>を行います。</p>
			<p>予約確認のメールをお送りしますので、メールの指示に従って予約を確定させてください。</p>
			<br>
            <p>なお、ご入力頂いたお客様の個人情報は、<a href="http://www.jawhm.or.jp/privacy.html" target="_blank">当協会のプライバシーポリシー</a>に従い取扱を行います。</p>
        </div>
            		';
}
echo $output;