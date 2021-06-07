<?php
require_once './../include/links.php';

$links_obj = new Links();
$header_obj = new Header();

$header_obj->title_page = '2021 年版 ワーキングホリデー 初心者向け完全ガイド';
$header_obj->description_page = '2021 年版 ワーキングホリデー 初心者向け完全ガイド,ワーキングホリデーとは、18 歳～ 30 歳の日本国民が海外で「学ぶ」「働く」「暮らす」といった海外生活が総合的に体験でき
る制度です。1980 年 12 月に初めてオーストラリアと日本の間で始まったワーキングホリデー協定は 2020 年で 40 年を迎えました。現在は、
26 か国もの協定国があります。(2020 年 12 月時点 )';
$header_obj->keywords_page = 'ワーキングホリデープランは,ワーキングホリデー,ワーホリ,留学,ビザ,方法';
$header_obj->fncFacebookMeta_function = true;
$header_obj->add_css_files = '<link href="css/style-pc.css" rel="stylesheet" type="text/css">';
$header_obj->add_style = '';
$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="./images/top_pc.webp" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '2021 年版 ワーキングホリデー 初心者向け完全ガイド';

$header_obj->display_header_2();

include('../../calendar_module/mod_event_horizontal.php');

?>

<div id="maincontent">
	<?php echo $header_obj->breadcrumbs(); ?>

	<br>
	<div class="text-center">
		<img class="lazyload" data-src="./images/main_pc.webp" alt="2021 年版 ワーキングホリデー 初心者向け完全ガイド" />
	</div>
	<div>
		<h2 class="top-text">
			2021年版ワーキングホリデー初心者向け完全ガイド
		</h2>
		<p>ワーキングホリデーとは、<mark>18 歳～ 30 歳の日本国民が海外で「学ぶ」「働く」「暮らす」といった海外生活が総合的に体験できる制度です。<mark></p>
		<br>
		<p>1980 年 12 月に初めてオーストラリアと日本の間で始まったワーキングホリデー協定は 2020 年で 40 年を迎えました。現在は、26 か国もの協定国があります。(2020 年 12 月時点 )</p>
		<br>
		<p>語学力の向上、海外での就労経験、友人との出会い、異文化理解など・・・日本にいるだけでは味わうことができない経験となるのがワーキングホリデーです。自由に様々なことにチャレンジできるワーキングホリデーは人生の中で一番楽しい、そして自分の価値観をも変えてしまう経験になること間違いなしです。</p>
		<br>
		<p>こちらのページでは、2021 年のワーキングホリデー最新情報をお伝えします。</p>
	</div>

	<table class="tableofcontents">
		<tbody>
			<tr>
				<th>目次</th>
			</tr>
			<tr>
				<td>
					<ul>
						<li><a href="#1">１．　ワーキングホリデー３つのポイント</a></li>
						<li><a href="#2">２．　2021 年度 ワーキングホリデー 人気国 ( 当協会調べ )</a></li>
						<li><a href="#3">３．　2021 年度 ワーキングホリデー各国のビザ情報</a></li>
						<li><a href="#4">４．　ワーキングホリデー 出発までの流れ</a></li>
						<li><a href="#5">５．　もっと成功する！ワーキングホリデー渡航プラン</a></li>
						<li><a href="#6">６．　目的別 ワーキングホリデーおすすめプラン</a></li>
						<li><a href="#7">７．　ワーホリ協会でのサポート</a></li>
					</ul>
				</td>
			</tr>
		</tbody>
	</table>

	<h2 id="1" class="sec-title">ワーキングホリデー３つのポイント</h2>
	<div class="points-block">
		<div class="img">
			<img class="lazyload" data-src="./images/point_1.webp" alt="point_1">
		</div>
		<div class="title"><mark class="pink">ワーキングホリデープランは自由自在！</mark></div>
		<div class="content">
			<p>ワーキングホリデーとは、日本と協定を結んだ国で 1 ～ 2 年間の滞在が許され、その間に観光、就学、就労ができる特別な制度です。ワーキングホリデー期間はどこに滞在しても、どこを旅行しても、どこで仕事をしても、どこの学校に通ってもよいと、非常に自由度が高いのが特徴です。そのため、みなさんが現地でやりたいことや叶えたい夢を現実にできるチャンスがたくさんあります。</p>
			<br>
			<p>自由度が高い半面、ワーキングホリデをする目標と目的をしっかりと持ち、それに合わせたプラン作りをしないと、「ただ行ってきただけ」になってしまいます。自由自在に外国でいろいろなことができるワーキングホリデー期間に後悔を残さないよう、事前にしっかりとプラン作りをしていきましょう。</p>
		</div>
	</div>
	<div class="points-block">
		<div class="img">
			<img class="lazyload" data-src="./images/point_2.webp" alt="point_2">
		</div>
		<div class="title"><mark class="pink">フルタイムで働きながら海外生活ができる！</mark></div>
		<div class="content">
			<p>ワーキングホリデー中は、その国でのフルタイムの就労が認められています。1 ～ 2 年間という長期間英語漬けの環境で働けるうえ、さらに必要な生活費を現地で稼ぐことができます。貯金ができるくらいお金が稼げる国もあります。そのため、これまで「留学したいけれど費用が高すぎるから…」と諦めていた方にも大変有効です。</p>
			<br>
			<p>初期費用が抑えられるだけでなく、現地のカフェやレストラン、ホテルや農場などさまざまな勤務先でのお仕事を通してたくさんの貴重な経験が積めます。特に将来外資系企業や海外での就職を目指している方は、海外での実務経験があることで就職を有利に進めることができますので、ワーキングホリデーの制度の強みを生かして海外での就労経験を付けることが最適です。</p>
		</div>
	</div>
	<div class="points-block">
		<div class="img">
			<img class="lazyload" data-src="./images/point_3.webp" alt="point_3">
		</div>
		<div class="title"><mark class="pink">しっかりと英語の勉強もできる！</mark></div>
		<div class="content">
			<p>ワーキングホリデー期間中は、語学学校に通って英語などの言語を勉強することができます。英語を話せるようになりたい、英語を使って現地でお仕事がしたい、さらには現地で進学、就職、日本で転職活動の際に必要な資格が取りたい、などみなさんの目指す姿に合わせて語学学校、およびコースを選ぶことができます。</p>
			<br>
			<p>ワーキングホリデーでは学校に通える期間が決まっている国もありますので、学生ビザと組み合わせることでしっかりと勉強をする期間を確保し、語学力を伸ばしましょう。</p>
		</div>
	</div>
	<div class="top-move">
		<p><a href="#header">▲TOP に戻る</a></p>
	</div>

	<h2 id="2" class="sec-title">2021 年度 ワーキングホリデー 人気国 ( 当協会調べ )</h2>
	<div class="countryx-block">
		<div class="header">
			<img class="lazyload" data-src="./images/country_aus.webp" alt="australia-country">
		</div>
		<div class="body">
			<div class="title">
				美しい海と都会が魅力の国<br>
				オーストラリア
			</div>
			<div class="content">
				<p>ワーキングホリデーで 1 番人気の渡航先がオーストラリアです。温暖な気候、大自然、給料、治安など、様々な要因で愛される国です。</p>
				<br>
				<p>フレンドリーな国民性と、日本と時差が１時間しか変わらないことから、海外滞在が初めての人でも安心して生活する事が出来ます。また、最長 3 年間滞在する事が出来るため長く滞在したいという方にもオススメです。</p>
				<br>
				<p>大きな都市でシティライフを送りたい方はシドニー、落ち着いた環境で都会と自然を満喫したい方はブリスベンなど目的や趣味嗜好に合わせた都市選びが出来ます。</p>
				<p>「英語試験対策コース」や、カフェで働くスキルを磨くことができる「バリスタ訓練コース」などを扱う学校が多いので、ワーキングホリデー中にしっかりと結果を残したいという方は健闘してみてください。</p>
			</div>
			<div class="linkbox">
				<p>
					<合わせて読みたい>
				</p>
				<p><a href="/wh/australia/">・オーストラリアのワーキングホリデー情報</a></p>
				<p><a href="/country/australia/">・オーストラリアの国情報</a></p>
			</div>
		</div>
	</div>
	<div class="countryx-block">
		<div class="header">
			<img class="lazyload" data-src="./images/country_can.webp" alt="canada-country">
		</div>
		<div class="body">
			<div class="title">
				雄大な銀世界と多文化の国<br>
				カナダ
			</div>
			<div class="content">
				<p>多数の移民でできた国がカナダです。夏はカラッとしていて過ごしやすく、冬は美しい雪景色を楽しむ事が出来ます。</p>
				<br>
				<p>ニューヨークやシアトルなどアメリカの大都市がすぐ近いので、「週末は日帰りアメリカ旅行」といった楽しみ方も出来てしまいます。</p>
				<br>
				<p>カナダ最大のとしトロント、自然と都会が共存したバンクーバー、英語とフランス語の 2つの言語が公用語であるモントリオールなど、都市によって全く環境が異なるため自分に合った都市が見つけられます。</p>
				<p>カナダの語学学校は就職に生かせる「ビジネス英語コース」や「インターンシップ制度」が充実しているため、帰国後のキャリアが心配という方にもオススメです。</p>
			</div>
			<div class="linkbox">
				<p>
					<合わせて読みたい>
				</p>
				<p><a href="/wh/canada/">・カナダのワーキングホリデー情報</a></p>
				<p><a href="/country/canada/">・カナダの国情報</a></p>
			</div>
		</div>
	</div>
	<div class="countryx-block">
		<div class="header">
			<img class="lazyload" data-src="./images/country_nz.webp" alt="newzealand-country">
		</div>
		<div class="body">
			<div class="title">手つかずの大自然と安全な国<br>ニュージーランド
			</div>
			<div class="content">
				<p>大自然を満喫できる事で人気の国がニュージーランドです。</p><br>
				<p>スカイダイビング、マリンアクティビティ、ウィンタースポーツ、オーロラ鑑賞など大自然を贅沢に使ったアクティビティを楽しむことが出来ます。また、人気の英語圏では比較的諸費用が安く予算を抑えてワーキングホリデーをする事が出来るため、節約しながら、しっかりと勉強したいという方にもオススメです。</p><br>
				<p>多くの方が一番大きな都市であり、語学学校も多数設立されているオークランドから生活をスタートします。</p><br>
				<p>ニュージーランドの語学学校は「試験対策コース」が充実しており、児童向け英語教師になる事が出来る「TECSOL コース」など教育に興味がある方にもオススメです。</p>
			</div>
			<div class="linkbox">
				<p>
					<合わせて読みたい>
				</p>
				<p><a href="/wh/newzealand/">・ニュージーランドのワーキングホリデー情報</a></p>
				<p><a href="/country/newzealand/">・ニュージーランドの国情報</a></p>
			</div>
		</div>
	</div>
	<div class="countryx-block">
		<div class="header">
			<img class="lazyload" data-src="./images/country_uk.webp" alt="newzealand-country">
		</div>
		<div class="body">
			<div class="title">長い歴史を持つ文化と芸術の国<br>イギリス
			</div>
			<div class="content">
				<p>根強い人気を誇る英語発祥の国がイギリスです。</p><br>
				<p>建築、文化、音楽、ファッションなど、あらゆるジャンルの歴史と最先端に囲まれた夢のような生活をする事が出来ます。</p><br>
				<p>イギリスのワーキングホリデーは滞在期間が 2 年間なので、イギリスでアルバイト以上の経験をしてみたいという方にオススメです。</p><br>
				<p>一番人気の都市はロンドンです。映画やドラマで見た光景や想像するイギリスの街並みが目の前に広がりますよ！</p><br>
				<p>ビザが抽選式で倍率も非常に高く、お仕事探しでは他国と比較して高い英語力が求められるため語学学校での十分な就学期間と準備が必要になります。</p>
			</div>
			<div class="linkbox">
				<p>
					<合わせて読みたい>
				</p>
				<p><a href="/wh/uk/">・イギリスのワーキングホリデー情報</a></p>
				<p><a href="/country/unitedkingdom/">・イギリスの国情報</a></p>
			</div>
		</div>
	</div>
	<div class="countryx-block last-child">
		<div class="header">
			<img class="lazyload" data-src="./images/country_ire.webp" alt="newzealand-country">
		</div>
		<div class="body">
			<div class="title">ケルト文化溢れるエメラルドの国<br>アイルランド
			</div>
			<div class="content">
				<p>自然豊かな環境でゆったりと過ごせる国がアイルランドです。</p><br>
				<p>陽気な国民性で比較的治安も良く、伝統的なアイルランドの音楽とギネスビールを楽しんでください。</p><br>
				<p>イギリスと同様にビザは抽選式ですが、イギリスと比べると格段にビザを取得しやすく、渡航費用もヨーロッパ諸国と比べて抑える事ができるので、近年アイルランドへのワーキングホリデー渡航者が急増しています。</p><br>
				<p>アイルランドの 1 番大きな都市はダブリンです。人口の 30％以上が生活しており、オシャレな街で安心して生活を始める事が出来ます。</p>
			</div>
			<div class="linkbox">
				<p>
					<合わせて読みたい>
				</p>
				<p><a href="/wh/ireland/">・アイルランドのワーキングホリデー情報</a></p>
				<p><a href="/country/ireland/">・アイルランドの国情報</a></p>
			</div>
		</div>
	</div>
	<div class="top-move">
		<p><a href="#header">▲TOP に戻る</a></p>
	</div>

	<h2 id="3" class="sec-title">2021 年度 ワーキングホリデー各国のビザ情報</h2>
	<p class="pb-10">ワーキングホリデー制度には共通のルールがありますので、まずは確認していきましょう。</p>
	<p class="text-bold">【年齢制限について】</p>
	<p>　査証申請時の年齢が 18 歳以上 30 歳以下であること</p>
	<p>　<mark>POINT：</mark>31 歳の誕生日を迎える前にビザ申請をすれば間に合います</p>
	<br>
	<p class="text-bold">【ビザ ( 査証 ) について】</p>
	<p>　以前にワーキングホリデー査証を発給されたことがないこと。</p>
	<p>　<mark>POINT：</mark>１つの国に対して１回のみワーキングホリデービザを取得する事ができます</p>
	<br>
	<p class="text-bold">【滞在期間について】</p>
	<p>　滞在期間は基本的に入国より 1 年間与えられます。</p>
	<p>　<mark>POINT：</mark>イギリスは 2 年間。オーストラリアとニュージーランドは一定条件を達成すれば期間の延長ができます</p>
	<br>
	<p class="text-bold">【各国ビザ条件の比較】</p>
	<div class="p-10">
		<img class="lazyload" data-src="./images/visa.webp" alt="各国ビザ条件の比較">
		<div>
			<p>※上記のデータは 2020 年度の制度を参考にして作成されているため、2021 年度は変更になる可能性があります。</p>
			<p>※1. カナダは例年 1 月より抽選が開始され、定員が一杯になり次第終了します。</p>
			<p>※2. ニュージーランドは申請にあたり別途　X-ray( レントゲン ) 審査が必要。約 1 万 2 千円。また観光税＄35の支払いも必要です。</p>
			<p>※3. イギリスは申請にあたり別途、NHS 保険申請料金が必要。約 13.5 万円。</p>
			<p>※4. 例年 1 月と 7 月に抽選会が開催され、当選者のみビザ申請を行う事が可能です。</p>
		</div>
	</div>
	<div class="top-move">
		<p><a href="#header">▲TOP に戻る</a></p>
	</div>

	<h2 id="4" class="sec-title">ワーキングホリデー　出発までの流れ</h2>
	<div class="steps-block">
		<div class="header">
			【STEP1】まずはワーキングホリデー制度について十分な知識を得よう!
		</div>
		<div class="body">
			<div class="content">ワーキングホリデーとはどんな制度なのか、どの国に行けるのか、どんなことができるのか、どれくらいの語学力が必要なのか、国や都市の魅力や特徴、ビザ取得の注意点、費用の目安、失敗しない海外渡航のコツ、ビザの上手な使い方などなど、まずはワーキングホリデーに関する基本的な知識を調べましょう！基本的な情報があれば、それだけワーキングホリデーのプランが立てやすくなります。
			</div>
			<div class="text-center">
				<div class="labelct">ワーキングホリデーの基本が分かる　「初心者セミナー」</div>
			</div>
		</div>
	</div>
	<div class="text-center p-10">
		<div class="arrow-bottom"></div>
	</div>
	<div class="steps-block">
		<div class="header">
			【STEP2】具体的に目的・目標をイメージしよう！
		</div>
		<div class="body">
			<div class="content">成功するワーキングホリデーにするためには、あなたがワーキングホリデーをする目的や目標を具体的にイメージする事が何より大切です。例えばワーキングホリデーの目的が「語学力を身につけたい」だったとしたらもう一歩踏み込んで、「どれくらいレベルの語学力を身につけたいか」まで考えてみてください。そこまでイメージすることができれば、あなただけの渡航プランを見つけることができます。</div>
			<div class="text-center">
				<div class="labelct">目的・目標に合わせてプランを作る　「プランニングセミナー」</div>
			</div>
		</div>
	</div>
	<div class="text-center p-10">
		<div class="arrow-bottom"></div>
	</div>
	<div class="steps-block">
		<div class="header">
			【STEP3】自分に合った都市 / 語学学校を選ぼう!
		</div>
		<div class="body">
			<div class="content">
				目的・目標が決まったら、それに合わせてワーキングホリデーをする国、都市、語学学校などを決めましょう。海外には非常に多くの語学学校がありますが、都市や学校ごとに特徴がありますので、あなたのやりたいことが明確になっていればかなり絞り込むことができるはずです。都市や語学学校が決まれば渡航日までの具体的な流れや費用も分かります。
			</div>
			<div class="text-center">
				<div class="labelct">自分だけの渡航計画を立てる　「国別渡航計画相談会」</div>
			</div>
		</div>
	</div>
	<div class="text-center p-10">
		<div class="arrow-bottom"></div>
	</div>
	<div class="steps-block">
		<div class="header">
			【STEP4】学校申込み / ビザ申請をしよう！
		</div>
		<div class="body">
			<div class="content">基本的に学校の申込みやビザ申請は、すべてのプランが決まってから行いましょう。この段階でまだ不安がある、気になることがあるようでしたら、当協会のカウンセラーなどプロに相談してみてください！また、当協会ではわかりにくいビザ申請で失敗しないための全面サポートを行っております。是非ご活用ください。</div>
			<div class="text-center">
				<div class="labelct">一対一でしっかり相談　「個別カウンセリング」</div>
			</div>
		</div>
	</div>
	<div class="text-center p-10">
		<div class="arrow-bottom"></div>
	</div>
	<div class="steps-block">
		<div class="header">
			【STEP5】出発直前の最終確認！
		</div>
		<div class="body">
			<div class="content">すべての申込みが終わったら、出発準備の最終段階に入ります。海外保険の手続きやお金の持って行き方、現地での携帯電話、航空券やビザについて、空港での送迎、市役所での手続き、その他日本でやっておかなくてはならないことなどを必ず事前に調べておきましょう。そして最後に荷造りと持ち物の確認ができれば、あなたのワーキングホリデーがスタートします！
			</div>
			<div class="text-center">
				<div class="labelct">みんなで確認　「出発前オリエンテーション」</div>
			</div>
		</div>
	</div>
	<br><br>
	<div class="link-img text-center">
		<a href="/seminar/"><img class="lazyload" data-src="./images/banner_seminar.webp" alt="セミナーの検索・ご予約はこちらから"></a>
		<p>▲ セミナーの検索・ご予約はこちらから ▲</p>
	</div>
	<div class="top-move">
		<p><a href="#header">▲TOP に戻る</a></p>
	</div>

	<h2 id="5" class="sec-title">もっと成功する！ワーキングホリデー渡航プラン</h2>
	<p class="text01">ワーキングホリデーは非常に自由度の高いので、しっかり目的・目標を作りプランを準備してから渡航しないと、思ったように成長することができず、納得できないワーキングホリデーになってしまいます。</p>
	<p class="text01">ここでは、「英語の上達」「帰国後の就職に繋がる経験」といった観点からみたときの「<mark>成功するワーキングホリデープラン</mark>」をご紹介します。</p>
	<h3 class="h3-01">やりがちなワーキングホリデーのプラン</h3>
	<p class="text01"><mark>「行けば何とかなるだろう」の考えで渡航。</mark>日常会話はできるものの、<mark>現地で働くには英語力が足りないため</mark>、なかなか働き先が見つからない。結果、<mark>英語をあまり使わない日本食レストランでキッチンのアルバイトを</mark>スタート。生活費を稼げるので海外生活は継続できるが、<mark>英語を使わないため語学力が思ったように伸びず</mark>、あっという間に 1 年が経過してしまい、そのまま帰国。海外で 1 年生活していたが<mark>自分の納得のいく経験にならなかった。</mark></p>
	<div class="text-center">
		<img class="lazyload" data-src="./images/plan_1.webp" alt="日本食レストラン（キッチン）">
	</div>

	<h3 class="h3-01">一般的な成功するワーキングホリデーのプラン</h3>
	<p class="text01">ある程度語学力は必要なことが分かっているので、<mark>まずは基礎力 ( 読む、書く、聞く、話す ) の 4 技能を身に着ける</mark>ために語学学校へ。会話に困らなくなり、現地の生活にも慣れ始めるた<mark>4 ヶ月目から</mark>、海外での仕事を経験するため日本食レストランの接客のアルバイトを始める。6 カ月ほど働いて基本的な接客英語とスキルを身に着けたら、<mark>最後にローカルでの仕事を経験し</mark>帰国する。語学力はもちろん、<mark>完全に英語の環境で仕事をした経験は、自分の自信にもつながった。</mark>
	</p>
	<div class="text-center"><img class="lazyload" data-src="./images/plan_2.webp" alt="語学学校 日本食レストラン（接客）-> ローカル  -> レストラン">
	</div>

	<h3 class="h3-01">もっと成功する！ワーキングホリデーのプラン</h3>
	<p class="text01">ワーキングホリデーで滞在できる期間が決まっているので、<mark>語学学校で勉強する期間を前倒しして、先に学生ビザで 6 ヶ月間しっかり英語力の底上げと専門スキルを身に着ける。</mark>語学学校を終えたらビザをワーキングホリデーに切り替え、英語力とスキルがある状態で仕事探しをスタートできる。そのため日本食のレストランで働く期間も短くなって、すぐにローカルジョブで働けるようになった。時間をかけてしっかりと経験とスキルを身に着けたので、<mark>帰国後の就職では大きなアドバンテージになった。</mark>
	</p>
	<div class="text-center">
		<img class="lazyload" data-src="./images/plan_3.webp" alt="語学学校 日本食レストラン（接客）-> ローカル  -> レストラン">
	</div>
	<div class="top-move">
		<p><a href="#header">▲TOP に戻る</a></p>
	</div>

	<h2 id="6" class="sec-title">目的別 ワーキングホリデーおすすめプラン</h2>
	<p class="text01">あなたの目標・目標を達成し、不安も解消できる。そんなおすすめワーキングホリデープランをご紹介します。</p>
	<ul class="plan-block">
		<li>
			<a href="#plan_a">
				<img class="lazyload" data-src="./images/person_a.webp" alt="person a">
				<br>
				海外生活を満喫したい
			</a>
		</li>
		<li>
			<a href="#plan_b">
				<img class="lazyload" data-src="./images/person_b.webp" alt="person b">
				<br>
				語学力を身につけたい
			</a>
		</li>
		<li>
			<a href="#plan_c">
				<img class="lazyload" data-src="./images/person_c.webp" alt="person c">
				<br>
				英語を使って働きたい
			</a>
		</li>
		<li>
			<a href="#plan_d">
				<img class="lazyload" data-src="./images/person_d.webp" alt="person d">
				<br>
				就活に活かしたい
			</a>
		</li>
	</ul>
	<h3 id="plan_a" class="h3-01">とにかく海外の生活を満喫したい！</h3>
	<div class="msg">
		<div class="msg-img">
			<img class="lazyload" data-src="./images/person_a.webp" alt="person a">
		</div>
		<div class="msg-box">
			<div class="arrow">
				<div class="outer"></div>
				<div class="inner"></div>
			</div>
			<div class="message-body">
				<p>せっかく海外にいるのだから日本でできないことをたくさんしたい！</p>
				<p>自由に海外生活を楽しみたいけど、英語に自信なくて生活できるか不安・・・</p>
				<br>
			</div>
		</div>
	</div>
	<div class="msg">
		<div class="msg-img">
			<img class="lazyload" data-src="./images/bam.webp" alt="bam">
		</div>
		<div class="msg-box">
			<div class="arrow">
				<div class="outer"></div>
				<div class="inner"></div>
			</div>
			<div class="message-body">
				<p>とにかく海外生活そのものを満喫したいあなたは、ワーキングホリデーがピッタリです。</p> <br>
				<p>ワーキングホリデーでは、「学ぶ」「働く」「暮らす」といった海外生活が総合的に体験できます。ワーキングホリデーは１年という限られた時間ですので、渡航前にやりたいことリストを作っておきましょう。</p> <br>
				<p>ただし、仕事、旅、友人作りなど、英語力がある方が海外での生活を満喫できるチャンスは広がります。少しでも英語力を伸ばすためにも、短期間で効率よく勉強ができる語学学校に通うこともお勧めします。世界中から生徒が集まるので友人作りもできて、アクティビティも参加できるので、楽しいキャンパスライフが送れますよ。</p>
			</div>
		</div>
	</div>
	<div class="linkbox">
		<a href="/school">
			ワーキングホリデー中に通える語学学校についてもっと詳しく知る
		</a>
	</div>

	<h3 id="plan_b" class="h3-01">しっかり語学力をアップしたい！</h3>
	<div class="msg">
		<div class="msg-img">
			<img class="lazyload" data-src="./images/person_b.webp" alt="person b">
		</div>
		<div class="msg-box">
			<div class="arrow">
				<div class="outer"></div>
				<div class="inner"></div>
			</div>
			<div class="message-body">
				<br>
				<p>英語の勉強は苦手だけど、海外でしっかり語学力を伸ばして帰国したいなぁ・・・。</p>
				<br>
			</div>
		</div>
	</div>
	<div class="msg">
		<div class="msg-img">
			<img class="lazyload" data-src="./images/bam.webp" alt="bam">
		</div>
		<div class="msg-box">
			<div class="arrow">
				<div class="outer"></div>
				<div class="inner"></div>
			</div>
			<div class="message-body">
				<p>海外でしっかりとした語学力を身に着けたいあなたには、学生ビザとワーキングホリデーを組み合わせて使うプランがぴったりです。</p> <br>
				<p>ワーキングホリデーは就学期間に限りがあるので、まずは学生ビザを使ってしっかりと語学力を伸ばし、その後ワーキングホリデーに切り替えて身に着けた語学力を仕事などを通してアウトプットすることで、より高いレベルの語学力を身に着けることができます。 </p> <br>
				<p>学校では自分の語学レベルに合った授業を受けることができるので、英語が苦手な人でも安心です。また、学校で語学と一緒に専門スキルを学んでおけば、海外で働くときにとても役立ちます。</p>
			</div>
		</div>
	</div>
	<div class="linkbox">
		<a href="/school">
			ワーキングホリデー中に通える語学学校についてもっと詳しく知る
		</a>
	</div>


	<h3 id="plan_c" class="h3-01">英語を使ってグローバルに働きたい！</h3>
	<div class="msg">
		<div class="msg-img">
			<img class="lazyload" data-src="./images/person_c.webp" alt="person c">
		</div>
		<div class="msg-box">
			<div class="arrow">
				<div class="outer"></div>
				<div class="inner"></div>
			</div>
			<div class="message-body">
				<br>
				<p>世界中の人たちと一緒に英語を使って働きたい！</p>
				<br>
			</div>
		</div>
	</div>
	<div class="msg">
		<div class="msg-img">
			<img class="lazyload" data-src="./images/bam.webp" alt="bam">
		</div>
		<div class="msg-box">
			<div class="arrow">
				<div class="outer"></div>
				<div class="inner"></div>
			</div>
			<div class="message-body">
				<p>海外の人たちと一緒に働きたい！というあなたには、インターンシッププログラムがぴったりです。</p>
				<br>
				<p>海外で働くためには中上級（TOEIC750 ～ 850 点）の英語力が求められます。無計画にワーキングホリデーをして、「仕事が見つからず、資金も底をつき早期帰国をした」なんていう例も少なくはありません。まずは語学力と専門知識の習得をし、現地企業でインターンシップをする。そしてその後ワーキングホリデーに切り替えるととても有意義な時間を過ごすことができるでしょう。</p>
				<br>
				<p>「帰国後の就職や転職に活かせる経験をしたい！」という経験重視派の方にもおすすめです。</p>
			</div>
		</div>
	</div>
	<div class="linkbox">
		<a href="/blog/osakablog/%e6%b5%b7%e5%a4%96%e3%81%8a%e5%bd%b9%e7%ab%8b%e3%81%a1%e6%83%85%e5%a0%b1/6541/">
			カナダインターンシッププログラム（co-op）について詳しく知る
		</a>
	</div>

	<h3 id="plan_d" class="h3-01">ワーキングホリデーの経験を帰国後の就職に活かしたい！</h3>
	<div class="msg">
		<div class="msg-img">
			<img class="lazyload" data-src="./images/person_d.webp" alt="person d">
		</div>
		<div class="msg-box">
			<div class="arrow">
				<div class="outer"></div>
				<div class="inner"></div>
			</div>
			<div class="message-body">
				<p>帰国後の就職活動が心配です。</p>
				<p>新卒採用や、転職に有利になる渡航プランってありますか？</p>
				<br>
			</div>
		</div>
	</div>
	<div class="msg">
		<div class="msg-img">
			<img class="lazyload" data-src="./images/bam.webp" alt="bam">
		</div>
		<div class="msg-box">
			<div class="arrow">
				<div class="outer"></div>
				<div class="inner"></div>
			</div>
			<div class="message-body">
				<p>ワーキングホリデーの経験を帰国後の就職に活かしたいあなたには、学生ビザを使った長期留学がぴったりです。
				</p>
				<br>
				<p>IELTS やケンブリッジ検定などの英語資格や、TESOL・TECSOL・J-shine と呼ばれる英語教授資格、バリスタの資格などは履歴書に書くことができるので、帰国後の就職活動で確実にご自身の武器となります。
				</p>
				<br>
				<p>専門的な語学スキルや知識の習得は、帰国後の就職活動では大きく評価をされるポイントとなるので、積極的に挑戦してみてください。</p>
			</div>
		</div>
	</div>
	<div class="linkbox">
		<a href="/blog/fukuokablog/%E6%B5%B7%E5%A4%96%E3%81%8A%E5%BD%B9%E7%AB%8B%E3%81%A1%E6%83%85%E5%A0%B1/992/">
			海外で取得できる語学資格について詳しく知る
		</a>
	</div>
	<div class="link-img text-center">
		<a href="/seminar/"><img class="lazyload" data-src="./images/banner_seminar.webp" alt="セミナーの検索・ご予約はこちらから"></a>
		<p>▲ セミナーの検索・ご予約はこちらから ▲</p>
	</div>
	<div class="top-move">
		<p><a href="#header">▲TOP に戻る</a></p>
	</div>

	<h2 id="7" class="sec-title">ワーホリ協会でのサポート</h2>
	<p class="text01">ワーキングホリデーや留学に興味があるけれど、海外で何ができるのか？ 何をしなければいけないのか？ どんな準備や手続きが必要なのか？ どのくらい費用がかかるのか？ 渡航先で困ったときはどうすればよいのか？ わからない事が多すぎて、もっとわからなくなってしまいます。
	</p>
	<p class="text01">そんな皆様を支援するために当協会では、ワーホリ成功のためのメンバーサポート制度をご用意しています。当協会のメンバーになれば、個別相談をはじめビザ取得のお手伝い、出発前の準備、到着後のサポートまで、フルにサポートさせていただきます。
	</p>
	<h3 class="h3-01">日本ワーキング・ホリデー協会　６つのサポート</h3>
	<div class="support-block">
		<ul>
			<li>
				<div class="header">
					<p>年間 6000 回以上！</p>
					<p>種類豊富なセミナーを毎日開講</p>
				</div>
				<div class="body">
					<p>ワーキングホリデーや留学の情報収集ができる無料のセミナーを毎日開講しております。</p>
					<br>
					<p>年間２万人以上の方が参加する、大人気のセミナーです。</p>
				</div>
			</li>
			<li>
				<div class="header">
					<p>プロと考える、あなただけの</p>
					<p>オリジナル留学プラン</p>
				</div>
				<div class="body">
					<p>経験豊富なプロの留学カウンセラーがお客様ひとりひとりに寄り添った最適なプランを一から一緒に考え、自己実現のサポートをいたします。</p>
				</div>
			</li>
			<li>
				<div class="header">
					<p>お客様を第一に考える</p>
					<p>充実のサポート内容</p>
				</div>
				<div class="body">
					<p>メンバー登録をしていただくと、個別カウンセリングのほかビザ申請サポートや語学学校、宿泊先のお手続きなど出発前から渡航後までさまざまなサポートを受けることができます。</p>
				</div>
			</li>
			<li>
				<div class="header">
					<p>世界初のサービス</p>
					<p>安心の留学安心信託</p>
				</div>
				<div class="body">
					<p>お客様の大切な留学費用は、全額信託し、管理・保全しています。そのため、万が一の場合でも信託法により皆様からお預かりした留学費用は全額守られます。</p>
				</div>
			</li>
			<li>
				<div class="header">
					<p>渡航中もサポート！</p>
					<p>充実した現地オフィス</p>
				</div>
				<div class="body">
					<p>いくつかの各国主要都市にて「現地サポートオフィス」をご利用いただけます。こちらではトラブル対応時など日本語でご相談が可能です。</p>
				</div>
			</li>
			<li>
				<div class="header">
					<p>キャリアカウンセラーによる</p>
					<p>帰国後の就職サポート</p>
				</div>
				<div class="body">
					<p>渡航前の方、帰国された方向けにそれぞれセミナーを開催しています。将来のキャリア設計についてもキャリアカウンセラーの資格を持ったスタッフと一緒にお考えいただけます。</p>
				</div>
			</li>
		</ul>
	</div>
	<div class="link-img text-center pt-20 pb-20">
		<a href="/seminar/"><img class="lazyload" data-src="./images/banner_member.webp" alt=""></a>
	</div>
	<div class="top-move">
		<p><a href="#header">▲TOP に戻る</a></p>
	</div>

	<h2 id="st7" class="sec-title">その他のワーキングホリデーに関する情報</h2>
	<div class="links-block">
		<ul>
			<li><a href="/seminar">ワーキングホリデー＆留学　無料セミナー</a></li>
			<li><a href="/system.html">ワーキングホリデーについて</a></li>
			<li><a href="/start.html">はじめてのワーキングホリデー</a></li>
			<li><a href="https://lin.ee/8nCk50S" target="_blank" rel="noreferrer">ワーホリ協会　公式 LINE アカウント</a></li>
			<li><a href="/school">世界の語学学校情報</a></li>
			<li><a href="/qa.html">よくある質問</a></li>
		</ul>
	</div>
	<div class="link-img text-center pt-20 pb-20">
		<a href="/ryugakusupport"><img class="lazyload" data-src="./images/banner_ryugaku.webp" alt=""></a>
	</div>
</div>
</div>
</div>

<?php fncMenuFooter($header_obj->footer_type, false); ?>

<!-- Scripts -->
<?php $header_obj->display_script(); ?>

</body>

</html>