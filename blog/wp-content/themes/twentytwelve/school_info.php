<?php

/**

 * 各学校、日本スタッフブログの学校情報部の編集を行うことができます。

 * $school_name = ''; 部は画面の 「学校名：」の右側の表示される値となります。

 * $school_link = ''; 部は上記学校名に追加するリンクURLとなります。空の場合は、リンクは追加されません。

 * $img_link = network_home_url() . ''; 部は表示エリアの左側に表示される画像のURLとなります。

 * $link = '';　部は画面の「所在地：」の右側に表示される学校のURLの値および、そのリンク先両方の設定です。

 * $info = ''; 部は学校の紹介文となります。紹介文の入力部に、<br>（改行）や、<a>(リンク)といったHTMLタグを入れることにより、

 * 表示を調整することができます。 

 *

 * 修正前はお手数ですが、必ずコードの内容をバックアップとして、メモ帳等に保存しておいてください。

 * （入力間違い等で表示がおかしくなった場合は、バックアップファイルより元に戻してください。

 * by Joseph B.

 */



$color = $setting[0];

$fcolor = $setting[1];



/* Display 所在地 in information

 * 0 = No | 1 = Yes

 * Note: For PC site only.

 */

$display_link = 0;

/* ---------------------------- */

 

/* =============オーストアリアの学校 ================ */



	if ($blog_id == 2) { /* Australia Page */

		if ($p_id == 2) { // 語学学校 セルク School (selc)

			/* SELC School */

			$school_name = 'SELC';

			$school_link = 'www.jawhm.or.jp/school/aus_selc/';

			$img_link = network_home_url() . 'wp-content/uploads/2014/10/sImg_11.jpg';

			$link = 'www.selc.net/jp/';

			$info = 'セルクは創立３０年の実績、多彩なコースと豊富なレベル、実力派の講師陣と三拍子揃った学校！中でも講師陣は個性豊かで実力派の講師が揃っているとして高く評価されています。英語講師としての資格保持者はもちろんのこと、IELTSやケンブリッジ検定の現役試験官が多数在籍していて、アクティビティなどにも積極的に参加するフレンドリーで学生思いの講師が集まっているのも魅力的！';

		}

		if ($p_id == 17) { // ブラウンズ

			/* BROWNS School */

			$school_name = 'Browns English Language School';

			$school_link = 'www.jawhm.or.jp/school/aus_browns/';

			$img_link = network_home_url() . 'wp-content/uploads/sites/2/2014/11/browns_info.jpg';

			$link = 'www.brownsels.com.au/';

			$info = '独自のカリキュラム“Activate 8”を用いた、英語の総合力を高めるシステムが特徴的！この“Activate 8”は従来の「読む、聞く、書く、話す」のスキルに加え「語彙、文法、発音、場面英語」も一緒に補うことで、より総合的な英語力を高めることが出来るプログラムです。さらに！８つのクラスはレベルごとに分割されていて、自分のレベルにあったクラスで勉強することができます。';

		}

		if ($p_id == 15) { // 語学学校 インパクト (Impact)

			/* IMPACT School */

			$school_name = 'Impact English College';

			$school_link = 'www.jawhm.or.jp/school/aus_impact/';

			$img_link = network_home_url() . 'wp-content/uploads/sites/2/2014/11/impact_info.jpg';

			$link = 'www.impactenglish.com.au/';

			$info = '「生徒のための英語学校」というポリシーを掲げているインパクト・イングリッシュ・カレッジ。生徒を最優先に考えた様々なサービスや施設、また教師やスタッフは「留学生がもっとも効果的に英語力を上達できる方法」を念頭に指導にあたってくれるので、質の高い教育をうけることが出来ます。校内はイングリッシュオンリーが徹底されているのですが、日本人スタッフが個別のカウンセリングで対応してくれるので、英語が不安な方でも安心！しっかりとしたサポート体制も人気の理由です。';

		}

		if ($p_id == 25) { // 語学学校 インフォーラム (inforum)

			/* Inforum School */

			$school_name = 'Inforum Education Australia';

			$school_link = 'www.jawhm.or.jp/school/aus_inforum/';

			$img_link = network_home_url() . 'wp-content/uploads/sites/2/2014/11/inforum_info.jpg';

			$link = 'www.inforum.com.au/site/';

			$info = '多くの語学学校が巨大化する中、全校生徒１２０人のアットホームで人のつながりと授業の質を重視する学校がインフォーラムです！アットホームでフレンドリーな校風は、日本ベストスクール賞で総合世界6位にランクインするなど非常に高い評価を得ています。サイモン校長のオフィスは勉強や日常生活の相談だけでなく、普通に話しに来る生徒たちでいつもいっぱい！この校長の生徒に対する姿勢が全てのスタッフに反映し、どのスタッフも本当に生徒思いでフレンドリーです。日本語での復習会、ビジネスプレゼン、バリスタコース、IELTS保証プログラム、充実のアクティビティーなど、初心者からアドバンスまで、他には無いプログラムで留学生活をお楽しみください！';

		}

		if ($p_id == 26) { // 語学学校 ILSC

			/* ILSC School */

			$school_name = 'ILSC Australia';

			$school_link = 'www.jawhm.or.jp/school/aus_ilsc/';

			$img_link = network_home_url() . 'wp-content/uploads/sites/2/2014/11/ilsc_info.jpg';

			$link = 'www.ilsc.com.au/';

			$info = 'ILSCは、カナダ・バンクーバーに本社を持ち世界７都市にキャンパスを展開する大規模教育グループです。全ての授業が選択制で、豊富な種類のクラスから自分で選んで自分らしい留学を自由にコーディネートできるのが特徴！質の高い教師ときめ細かな学生サポートで、短期から長期までそれぞれに合った留学をアレンジすることが可能なのです。また国際色豊かなクラスメートや豊富なアクティビティで、留学生活を満喫できること間違いなしです！';

		}

		if ($p_id == 27) { // 語学学校 ナビタス(navitas)

			/* Navitas English School */

			$school_name = 'Navitas English';

			$school_link = 'www.jawhm.or.jp/school/aus_navitas/';

			$img_link = network_home_url() . 'wp-content/uploads/sites/2/2014/11/navitas_info.jpg';

			$link = 'www.navitasenglish.com/';

			$info = 'Navitasは最短期間で学位を取得したい留学生に最適な学校です。カレッジ卒業生の大学進学率はなんと全国平均で９０％！プログラムは留学生だけを対象に組まれ、大学での学位取得に欠かせない語学力と基礎学力をしっかり身につけることを重視しているため、大学の１・２年次にスムーズに進める学習スキルと自信を養うことができるのです。小論文作成、プレゼンテーション、リサーチ、ノート取りなどの英語スキルの向上や、専攻分野ごとのファンデーションスタディーなど、個々の学生のニーズに応じたコースを選び、必要期間受講することができます。また最新の専門設備が整っていて、アカデミックな面と生活面の両面で十分なサポートを受けることができるのも魅力の一つです。';

		}

		if ($p_id == 28) { // 語学学校 ICQA

			/* ICQA School */

			$school_name = 'International College of Queensland Australia';

			$school_link = 'www.jawhm.or.jp/school/aus_icqa/';

			$img_link = network_home_url() . 'wp-content/uploads/sites/2/2014/11/icqa_info.jpg';

			$link = 'www.icqa.com.au/';

			$info = '平均１２名と少人数なクラスで、クラスメートだけでなく講師陣も非常に国際的なのが特徴です。ICQAの講師陣は海外で英語を教えていた方がたくさんいらっしゃいます。だから英語を母国語としない学生が英語を勉強するときに、どこが難しいか、何が理解できないか、どんな方法で勉強すれば効果的か、といったことをよく誰よりもよく理解しています。その理解があるからこそ、きめの細かいカウンセリングをしてそれぞれの学生が目標を達成できるように最後までサポート出来るのです！';

		}

		if ($p_id == 29) { // 語学学校 OHC オーストラリア

			/* Holmes Institute School */

			$school_name = 'Holmes Institute';

			$school_link = 'www.jawhm.or.jp/school/aus_ohc/';

			$img_link = network_home_url() . 'wp-content/uploads/sites/2/2014/11/holmes_info.jpg';

			$link = 'www.holmes.edu.au/';

			$info = 'オーストラリアに５校開校しているホルムズは、全キャンパスが同じカリキュラムで統一されており、キャンパス間の移動が簡単に行えます。どの学校も都心部の近くにあり「この街は自分に合わないかも」なんて場合にも安心です。またクラスメートは多国籍でもイングリッシュ・オンリー・ポリシーがあり、校舎内は英語しか使用してはいけない決まりがあるので徹底的に英語漬けの生活をおくれます！';

		}

		if ($p_id == 30) { // 語学学校 フュージョン・イングリッシュ(fusion)

			/* Fusion English School */

			$school_name = 'Fusion English';

			$school_link = 'www.jawhm.or.jp/school/aus_fusion/';

			$img_link = network_home_url() . 'wp-content/uploads/sites/2/2014/11/fusion_info.jpg';

			$link = 'www.fusionenglish.com.au/';

			$info = 'メルボルンの中心部にキャンパスがあり、国籍バランスの良さはメルボルンで一番いい語学学校として知られるFusion English。ヨーロッパや南アメリカからの学生が多く、日本人が少ない環境で学びたい学生には最高の環境が整っています。アクティブティも豊富にあり、一番人気は有給ホテル・リゾートインターンシップ。海外で語学を勉強し、旅行もしてお金も稼げるプログラムで、とびきりの体験ができること間違いありません！ ';

		}

		if ($p_id == 31) { // 語学学校 グリニッジ・イングリッシュ・カレッジ (greenwich)

			/* Greenwich English College School */

			$school_name = 'Greenwich English College';

			$school_link = 'www.jawhm.or.jp/school/aus_greenwich/';

			$img_link = network_home_url() . 'wp-content/uploads/sites/2/2014/11/greenwich_info.jpg';

			$link = 'www.greenwichcollege.com.au/';

			$info = 'シドニーの中心にキャンパスを構えるグリニッジ・イングリッシュ・カレッジは、オーストラリアでも大規模の学校です！ 毎週アクティビティがあるので、他のクラスの生徒や先生たちとすぐに仲良くなることが出来るでしょう。スタッフの方はとても親身になって生徒をサポートしてくれるアットホームな環境なので、海外生活が不安な方でも安心です。また、ケンブリッジ検定を始め、数多くの資格コースを取りそろえているので、スキルアップを目的にしている人にもお勧めの学校です。 	

';

		}

		if ($p_id == 32) { // IH Sydney (Internationla House Sydney)

			$school_name = 'International House Sydney';

			$school_link = 'www.jawhm.or.jp/school/aus_ih/';

			$img_link = network_home_url() . 'wp-content/uploads/sites/2/2014/11/ihsydney_info.jpg';

			$link = 'www.ihsydney.com.au/';

			$info = 'アイ・エイチ・シドニーはオーストラリア政府及びケンブリッジ大学の認定を受けた、オーストラリアをはじめ、世界各国に毎年たくさんの英語教師を送り出すスクールして、世界中から注目されている英語教師育成訓練専門校です！ 英語を母国語としていない成人の人に対して、英語講師として英語を英語で指導できるようになる、Certificate IV in TESOLコースや、小学校英語指導者を目指す、J-SHINEコースがあり、非常に質の高い英語を身につけることが出来ます。英語プラス何か、資格取得を目指されている方へは最適な環境です！';

		}

		if ($p_id == 33) { // 語学学校 ビバ・カレッジ(viva)

			/* VIVA College Australia School */

			$school_name = 'VIVA College Australia';

			$school_link = 'www.jawhm.or.jp/school/aus_viva/';

			$img_link = network_home_url() . 'wp-content/uploads/sites/2/2014/11/vivia_info.jpg';

			$link = 'www.vivacollege.com/';

			$info = '質の高い授業およびケアーの行き届い学校として知られているブリスベンにあるViva Collegeは1993 年に留学生の為の英語コースを提供する学校としてスタートし、後にビジネスコースおよび英語教師訓 練コースを設置しました。人気のコースは会話集中コースのSmart Talk、苦手なスキルを伸ばし全体 的な英語レベルを向上させるFocus English、就職後に役立つビジネスコースです。中規模の学校だ から成せる、留学生それぞれが求めるサポートを提供しています。 ';

		}

		if ($p_id == 200) { //newssydney 

			/* News Sydney */

			$school_name = '';

			$school_link = '';

			$img_link = network_home_url() . 'wp-content/uploads/sites/2/2015/01/newssydney_info.jpg';

			$link = '';

			$info = '';

		}

		if ($p_id == 210) { // 語学学校 ディスカバー(discover)

			/* Discover English */

			$school_name = 'Discover English';

			$school_link = 'www.jawhm.or.jp/school/aus_discover/';

			$img_link = network_home_url() . 'wp-content/uploads/sites/2/2015/02/discover_info.jpg';

			$link = 'http://www.discoverenglish.com.au/';

			$info = '2010年に世界中で経験を積んだ５名の教師により設立。生徒目線で考え、それぞれが効率よく英語力を伸ばせるようコースやエクストラ、アクティビティなどが考えられております。 学校はEnglish Only Policyが徹底されています。メインの授業とさらに合計１０時間のオプショナルで勉強でき、週７回開催されるアクティビティでAcademic とFunを取り入れた学習環境を提供いたします。 キャンパスはメルボルン市内中心地のBourke St と Elizabeth Stにあります。2013 ビクトリア州 Excellence in International Education Awards - Student Support部門を受賞し、 2014年 ケンブリッジ大学英語検定機構 Awards for Preparation Centres - Outstanding Student Care 部門にて最終選考に選ばれました。 ';

		}

		if ($p_id == 217) { // IH Brisbane (International House Brisbane)

			/* International House Brisbane */

			$school_name = 'International House Brisbane';

			$school_link = 'www.jawhm.or.jp/school/aus_ih_brisbane/';

			$img_link = network_home_url() . 'wp-content/uploads/sites/2/2016/02/ihbrisbane_info.jpg';

			$link = 'www.ihbrisbane.com.au/ja/';

			$info = 'IH Brisbane-ALSはロンドンに本校を置く世界的教育機関のブリスベン校です。 最近では留学する理由や目的もさまざまとなり、人それぞれの留学があります。 IH Brisbane-ALS ではコースやプログラムの種類が多く、 自分だけの留学を実現するための勉強環境とサポートが整っています。 独自のフレキシブルなタイムテーブルで勉強、仕事、 そして楽しい留学生活を両立させることができるユニークな学習スタイルが人気です。 ';

		}

	}

/* ================= カナダの学校 ==================== */

	if ($blog_id == 3) { 

		if ($p_id == 64) { // 語学学校 PGIC

			/* PGIC School */

			$school_name = 'PGIC';

			$school_link = 'www.jawhm.or.jp/school/can_pgic/';

			$img_link = network_home_url() . 'wp-content/uploads/sites/3/2014/11/pcid_info.jpg';

			$link = 'www.pgic.jp/';

			$info = 'PGICは生徒たちに、コミュニケーションの手段として使える英語をモノにしもらうことを最大の目標としています。 また語学力だけではなく、成功哲学に基づいたポジティブシンキングを学び、生きる力を身に付けることも大切な目標だと考えています。 この2つのスキルを身に付けることができれば、将来に大きな影響を及ぼすことでしょう。人間は自分の意志にかかわらず、自分が置かれた環境に大きく左右されてしまいます。 そのためPGICでは誘惑に負けたり、怠けたり、挫折することのない学習環境とシステムを用意して、 皆さんの英語学習を全面サポートします。思いっ切り英語漬けの生活を送ってみませんか。';

		}



		if ($p_id == 6) { // 語学学校 CCEL

			/* Canadian College of English Language School */

			$school_name = 'Canadian College of English Language';

			$school_link = 'www.jawhm.or.jp/school/can_ccel/';

			$img_link = network_home_url() . 'wp-content/uploads/sites/3/2014/11/ccel_info.jpg';

			$link = 'www.canada-english.com/jp/';

			$info = 'ビジネス英語・接客英語を学びたいならならCCEL！その理由は特徴的な特別コースがあるからです。インターンシップやワーキングホリデーに人気のビジネス英語や接客英語コースでは、即戦力になる英語力を身につけることが出来ます。<br />また、同じキャンパス内の専門学校Canadian Collegeでは国際貿易やホスピタリティー、ソーシャルメディア等人気のコースを多数開講しています。英語＋＠が必須のこの時代、形に残る留学をするならCCELです！';

		}

		if ($p_id == 50) { // 語学学校 UMC

			/* Upper Madison College School */

			$school_name = 'Upper Madison College';

			$school_link = 'www.jawhm.or.jp/school/can_umc/';

			$img_link = network_home_url() . 'wp-content/uploads/sites/3/2014/11/umc_info.jpg';

			$link = 'www.umcollege.ca/';

			$info = '“CONNECTING THE WORLD WITH COMMITMENT & COMPASSION(責任と思いやりをもって世界を結ぶ)”をモットーに２００４年に設立されたＵＭＣ。少人数制クラスなので、生徒・教師・スタッフがお互いを名前で呼び合うほどアットホーム！実際に使える英語力取得を目指して構成された当校オリジナルカリキュラムは、英語で考え、英語で発言するというプロセスを重視し、各々の英語力を飛躍的に伸ばすことを可能にしました。';

		}

		if ($p_id == 60) { // 語学学校 CAC(Cornerstone Academic College) School

			/* CAC (Cornerstone Academic College) School */

			$school_name = 'CAC (Cornerstone Academic College)';

			$school_link = 'www.jawhm.or.jp/school/can_cornerstone/';

			$img_link = network_home_url() . 'wp-content/uploads/sites/3/2014/11/cornerstone_info.jpg';

			$link = '';

			$info = 'Cornerstone Academic Collegeはバンクーバー、トロントにキャンパスを持つ語学学校です。 リスニング・スピーキング・文法などすべてのスキルを関連付けて学ぶ「Integrated method」を採用し、日常会話から仕事で使う英語までをカリキュラムでカバーしております。 また、スピーキング集中コースや、ビジネス英語などの専門コースにも力を入れており、目的に特化した英語学習をしたい方にもオススメの学校です。 ';

		}

		if ($p_id == 37) { // 語学学校 KGIC

			/* King George International College School */

			$school_name = 'King George International College';

			$school_link = 'www.jawhm.or.jp/school/can_kgic/';

			$img_link = network_home_url() . 'wp-content/uploads/sites/3/2014/11/kgic_info.jpg';

			$link = 'www.kgic.ca/';

			$info = 'KGICは語学学校と専門学校の両方を運営しています。だからこそ仕事に強い留学プログラムを提供することができるのです！英語学習から進学、ビジネス、有給インターンシップと多彩なプログラムを開講し、英語でのスキルアップ・キャリアアップ、留学したことで就職を有利にしたい人、英語環境で仕事をしたい人に最適な学校です。「英語を身に付けたいけど、英語だけじゃ物足りない！」「英語プラスαでの留学をしたい！」「専門留学をしたい！」そんな人たちにもおススメのプログラムを提供していて、英語以外の数多くの専門スキルを身に付けることもできます。';

		}

		if ($p_id == 27) { // 語学学校 Ih バンクーバー(ihvancouver)

			/* International House Vancouver School */

			$school_name = 'International House Vancouver';

			$school_link = 'www.jawhm.or.jp/school/can_ih/';

			$img_link = network_home_url() . 'wp-content/uploads/sites/3/2014/11/ihvancouver_info.jpg';

			$link = 'www.ihvancouver.com/';

			$info = 'バンクーバーは世界で一番住みやすい街として何年も続けて上位に位置する街です。また日本からは直行便があり、アクセスも非常にしやすい港街。そして治安の良さ、景観のすばらしさなど、日本にはない自然と一体化した街の光景が広がっています。そんなバンクーバーのダウンタウンに当校は位置しており、スカイトレインのスタディアム駅からもアクセスしやすく、バスでの通学も非常に便利な場所にあります。また近くには中央図書館、観光地として有名なギャスタウンがあります。また当校が属しているINTERNATIONAL　HOUSE（IH機構）は、イギリスのロンドンを本部に世界５２カ国、１５８箇所に学校がを展開している組織です。その為バンクーバー校にもヨーロッパを中心に、様々な国籍の生徒が在籍しています。';

		}

		if ($p_id == 83) { // International Language Academy of Canada – ILAC School

			/* International Language Academy of Canada - ILAC School */

			$school_name = 'International Language Academy of Canada - ILAC';

			$school_link = 'www.jawhm.or.jp/school/can_ilac/';

			$img_link = network_home_url() . 'wp-content/uploads/sites/3/2014/11/ilac_info.jpg';

			$link = '';

			$info = 'トロント・バンクーバー<br />ランゲージトラベルマガジンやトップランゲージスクールなど、数々のアワードを受賞しているILACには世界70ヵ国から学生が集まり、語学学習にアクティビティーと、積極的に毎日を楽しんでいます！17段階と細かなレベル分けで、初心者から上級者まで、短期から長期まで、ニーズに合わせてレッスンが受けられます。多国籍で様々な文化が混ざり合った素晴らしい国カナダで、世界中から来た友達と楽しく語学学習しませんか？';

		}

		if ($p_id == 2) { // 語学学校 オックスフォード　インターナショナル　ノースアメリカ School (OI Vancouver・Toronto)

			/* Eurocentres Canada School */

			$school_name = 'Oxford International North America';

			$school_link = 'www.jawhm.or.jp/school/can/OxfordInternationalNorthAmerica/';

			$img_link = network_home_url() . 'wp-content/uploads/sites/3/2021/01/oxford-international.png';

			$link = 'www.languagecanada.com/';

			$info = 'オックスフォード　インターナショナル　ノースアメリカは、設立当初より学生第一をポリシーにしています。 英語を母国語とする教師陣は、ランゲージズ・カナダから認定済みであり、高いスタンダードを誇ります。 学校の内外で素晴らしい留学体験ができるよう、教師やスタッフ全員が、学生のケアーと安全を念頭に日々努めています。 オックスフォード　インターナショナル　ノースアメリカのバンクーバー校とトロント校では、各学生の留学目標に答えるための個人指導が徹底されています。 学業カウンセリング、自習アドバイス、定期試験、模擬試験、毎週の個人面談など、常に学生の習熟度は評価されているので、流暢さと正確さ双方において、より効率よく英語力を高めることができます。毎週催されるアクティビティーに参加すれば、世界各国に友達の輪を広げることができるでしょう。 ';

		}

		if ($p_id == 72) { // 語学学校 クエスト School (quest)

			/* Quest Language Studies School */

			$school_name = 'Quest Language Studies';

			$school_link = 'www.jawhm.or.jp/school/can_quest/';

			$img_link = network_home_url() . 'wp-content/uploads/sites/3/2014/11/quest_info.jpg';

			$link = 'www.studyquest.net';

			$info = 'ニーズに合うフレキシブルなプログラムを少人数制でしっかり学べる学校がQuestです。定期的なライティング、マンツーマンスピーキングチェックテストを通じて生徒さん個々人の学習進度状況もしっかり把握していく安心できる学習サポートシステムを完備しています。 どのレベルでも会話の中から身につける英語学習方法（コミュニカティブアプローチ）を徹底化することで日本では実現しにくかった楽しく、効果的な英語習得方をご提供します！是非その“差”を体験しにいらして下さい！ ';

		}

		if ($p_id == 204) { // 語学学校 タムウッド School (tamwood)

			/* Tamwood Language Centres */

			$school_name = 'Tamwood Language Centres';

			$school_link = 'www.jawhm.or.jp/school/can_tamwood/';

			$img_link = network_home_url() . 'wp-content/uploads/sites/3/2015/02/Tamwood.jpg';

			$link = 'www.tamwood.com';

			$info = 'タムウッドは中規模ながら世界各国から生徒がバランス良く集まる学校です。 Productionつまり英語を作る、訳すのではなく実際に英語を使う練習をします。 またStudy HallやPersonal Coachingと個別指導を提供しており、 グループレッスンではカバーできない個人の弱点をバックアップするシステムがある世界でも数少ない学校です。 インターンやボランティアプログラムを提供するGo International、COOPビザで 学習・研修するTamwood Careers専門学校をグループ内に持つ、ユニークな学校となります。 学ぶ、体験する、夢を実現するを3つの組織でインハウスで提供できるのがTamwoodです。  ';

		}

		if ($p_id == 206) { // 語学学校 エス・イー・シー School (sec)

			/* Study English in Canada */

			$school_name = 'Study English in Canada';

			$school_link = 'www.jawhm.or.jp/school/can_sec/';

			$img_link = network_home_url() . 'wp-content/uploads/sites/3/2015/02/sec_info.jpg';

			$link = 'http://www.sec-canada.com/';

			$info = 'SECトロント・バンクーバー校は、アットホームな環境の中で総合英語と専門科目を学べる学校です。また姉妹校のキャリアカレッジUCCBTへの編入も可能ですので、生徒の皆さんのニーズに合わせたコース選びをすることができ、世界各国の留学生への質の高いサポートを提供しています。当校にはフレンドリーなスタッフと質の高いレッスン内容を提供するためのプロフェッショナルの講師がいます。さらにトロント校とバンクーバー校間での転校が簡単にできます。生徒一人一人の夢やチャレンジを応援するスタッフが皆さんのお越しを待っています！  ';

		}

		if ($p_id == 299) { // 語学学校 VanWest college School (vanwest)

			/* Van West College */

			$school_name = 'VanWest College';

			$school_link = 'www.jawhm.or.jp/school/can_vanwest/';

			$img_link = network_home_url() . 'wp-content/uploads/sites/3/2016/03/vanwest_info.jpg';

			$link = 'www.tamwood.com';

			$info = 'バンウェストは、バンクーバーとケローナに校舎を構える創立1988年の老舗校です。暖かな雰囲気の学校で、生徒・講師・スタッフの距離が近く、お一人おひとりに合わせた学習サポートを心がけています。おすすめのコースはビジネス英語BULATS（ケンブリッジビジネス英語検定）。スピーキングやライティングを含めた「職場でのコミュニケーション力」を身につけます。将来、英語環境の職場で活躍したい方にお勧めのコースです。';

		}

		if ($p_id == 194) { // newsvancouver 

			/* News Vancouver */

			$school_name = '';

			$school_link = '';

			$img_link = network_home_url() . 'wp-content/uploads/sites/3/2015/01/newsvancouver_info.jpg';

			$link = '';

			$info = '';

		}

	}

/* ================= ニュージーランドの学校 ======== */

	if ($blog_id == 4) { 

		if ($p_id == 2) { // 語学学校 NZLC

			/* New Zealand Language Centers School */

			$school_name = 'New Zealand Language Centers';

			$school_link = 'www.jawhm.or.jp/school/nz_nzlc/';

			$img_link = network_home_url() . 'wp-content/uploads/sites/4/2014/11/nzlc_info.jpg';

			$link = 'www.nzlc.ac.nz/';

			$info = 'ニュージーランド政府認可校であるNZLCは、ニュージーランドで最も歴史の古い語学学校です！English NZの加盟校でもあり、しっかりしたプログラムに定評があります。実践的な英語スキルを上達させる為、コミュニケーション中心としながら全てのスキルをバランス良く行うシステムを採用しており、 細かなレベル分け、目的別に分かれたコース選択肢、充実した施設、質の高い講師陣、豊かな国籍など、どの点をとっても満足されること間違いなし！';

		}

		if ($p_id == 23) { // 語学学校 WWSE

			/* World Wide School of English */

			$school_name = 'World Wide School of English';

			$school_link = 'www.jawhm.or.jp/school/nz_wwse/';

			$img_link = network_home_url() . 'wp-content/uploads/sites/4/2015/02/WWSE.jpg';

			$link = 'http://www.worldwideschoolofenglish.com/ja/';

			$info = 'ワールドワイドの最大の魅力は、コミュニケーションを大切にしている授業体制と、一人ひとりの生徒を心から想う、熱心で温かい先生達・そして何よりも、30ヵ国にも及ぶ世界中から集まった友達と”生きた英語”が学べることです。生徒が積極的に発言し、意見交換をしやすい雰囲気作りを心がけ、常に先生と生徒全員が楽しく英語学習をできる環境を提供しています。アクティビティ、仕事探しのサポートも充実していますよ！';

		}

	}

/* ==================== イギリスの学校 ======================= */

	if ($blog_id == 5) { 

		if ($p_id == 2) { // 語学学校 ブルームズブリー School (bloomsbury)

			/* The Bloomsbury Colleges International University of London School */

			$school_name = 'The Bloomsbury Colleges International University of London';

			$school_link = '';

			$img_link = network_home_url() . 'wp-content/uploads/sites/5/2014/11/bloomsbury_info.jpg';

			$link = 'www.bloomsbury-international.com/';

			$info = '大英博物館やロンドン大学のあるロンドンの街中心部に校舎があり、ジョージアン様式の美しい外観、高い天井や暖炉など、昔ながらのエレガントさを残しながらも新しく改装されている校舎が魅力的な美しい学校です。校内は最新のオーディオ・ヴィジュアル教育機器やPCルームも完備あり、設備も充実しています。';

		}

		//if ($p_id == ) { // 

			/* OHC */

		//	$school_name = '';

		//	$school_link = 'www.jawhm.or.jp/school/uk_ohc/';

		//	$img_link = network_home_url() . '';

		//	$link = '';

		//	$info = 'オックスフォード・ハウス・カレッジは、質の高い教育、快適な生活、社交イベントといった卓越したサービスを提供します。 当校は外国語としての英語教育機関として、ブリティッシュ・カウンシルより認定を受けています。 楽しくフレンドリーで協力的な環境の下、私たちは英語を学び上達するというシンプルなお約束を致します。 仕事や学業のために英語を学ぶ場合はもちろん、趣味として学ぶ場合も、投稿にお迎え出来ることを心待ちにしております。 ';

		//}

	}

	if ($blog_id == 10) { /* 福岡スタッフブログ */

	 	// if ($p_name == '') {

			/*  School */

			$school_name = '日本ワーキング・ホリデー協会　福岡オフィス';

			$school_link = '';

			$img_link = network_home_url() . 'wp-content/uploads/sites/10/2014/11/fukuoka_info.jpg';

			$link = '';

			$info = '日本ワーキングホリデー協会では、より多くの方の留学・ワーキングホリデーに関するご相談をお受けする為、各地にオフィスを構えております。 その中でも、とても開放的で様々な相談ができるのが福岡オフィスです。';

		// }

	}

	if ($blog_id == 8) { /* 大阪スタッフブログ */

	// 	if ($p_name == '') {

			/*  School */

			$school_name = '日本ワーキング・ホリデー協会　大阪オフィス';

			$school_link = '';

			$img_link = network_home_url() . 'wp-content/uploads/sites/8/2014/12/osaka_info.jpg';

			$link = '';

			$info = '<p>□■日本ワーキング・ホリデー協会■□<br>

				□■大阪オフィス■□<br>

				<br>

				【大阪オフィスへのアクセス紹介】<br>

				<a href="/office/osaka/" target="_blank"><span style="text-decoration: underline; color: #ff0000;">アクセス詳細</span></a>

				<br>■ 阪急（梅田）の方は<span style="text-decoration: underline; color: #ff0000;"><a href="./osakablog/今日の協会オフィス/1682/" target="_blank"><span style="text-decoration: underline; color: #ff0000;">コチラ</span></a></span>！

				<br> ■ JR（大阪駅）沿線の方は<span style="text-decoration: underline; color: #ff0000;"><a href="./osakablog/今日の協会オフィス/1777/" target="_blank"><span style="text-decoration: underline; color: #ff0000;">コチラ</span></a></span>！

				<br> ■ JR東西線の方は<span style="text-decoration: underline; color: #ff0000;"><a href="./osakablog/今日の協会オフィス/1605" target="_blank"><span style="color: #ff0000; text-decoration: underline;">コチラ</span></a></span>！

				<br> ■ 地下鉄御堂筋線の方は<span style="text-decoration: underline; color: #ff0000;"><a href="./osakablog/今日の協会オフィス/1604/" target="_blank"><span style="color: #ff0000; text-decoration: underline;">コチラ</span></a></span>！

				<br> ■ 地下鉄谷町線の方は<span style="text-decoration: underline; color: #ff0000;"><a href="./osakablog/総合/1646" target="_blank"><span style="color: #ff0000; text-decoration: underline;">コチラ</span></a></span>！<br>

				<br>

				</p>';

	//	}

	}

/* ================= ワールドの学校情報 ================== */

	if ($blog_id == 6) { 

		if ($p_id == 2) { // 語学学校 エンバシー School (embassy)

			/* Embassy */

			$school_name = 'Embassy English';

			$school_link = 'www.jawhm.or.jp/school/worldwide_embassy/';

			$img_link = network_home_url() . 'wp-content/uploads/2014/12/embassy_info.jpg';

			$link = 'www.embassyces.com';

			$info = '40年以上の歴史を持ち、世界でも最も大きな教育機構の一つに数えられる語学学校です。特徴は国籍バランス。世界規模でマーケティング展開しているので、非常に多国籍なクラスで勉強することができます！また、大型電子黒板を使った参加型の授業は必然的に話す機会を増やし、授業に参加するだけでスピーキング力アップに繋がります。';

		}

		if ($p_id == 21) { // 語学学校 Kaplan International

			/* kaplan */

			$school_name = 'Kaplan International';

			$school_link = 'http://www.jawhm.or.jp/school/worldwide_kaplan/';

			$img_link = network_home_url() . 'wp-content/uploads/sites/6/2015/02/kaplan_info.jpg';

			$link = 'http://www.kaplaninternational.com/jp/';

			$info = 'Kaplan International Englishは、今年創立77年の伝統ある世界英語圏6ヶ国(アメリカ・カナダ・オーストラリア・ニュージーランド・イギリス・アイルランド)で合計43校を展開する大規模な英語学校です。約100ヶ国から毎年約75,000名の留学生が英語を学びに来ています。また学校独自のテキスト教材とオンライン学習を使い、インタラクティブホワイトボード(電子黒板)など最新設備を導入した授業を行っています。 ';

		}

		if ($p_id == 30) { // 語学学校 Oxford House College

			/* ohc */

			$school_name = 'Oxford House College';

			$school_link = 'http://www.jawhm.or.jp/school/worldwide_ohc/';

			$img_link = network_home_url() . 'wp-content/uploads/sites/6/2015/02/ohc_info.jpg';

			$link = 'http://www.oxfordhousecollege.co.uk/';

			$info = 'オックスフォード・ハウス・カレッジは、質の高い教育、快適な生活、社交イベントといった卓越したサービスを提供します。 当校は外国語としての英語教育機関として、ブリティッシュ・カウンシルより認定を受けています。 楽しくフレンドリーで協力的な環境の下、私たちは英語を学び上達するというシンプルなお約束を致します。 仕事や学業のために英語を学ぶ場合はもちろん、趣味として学ぶ場合も、投稿にお迎え出来ることを心待ちにしております。  ';

		}

	}

	if ($blog_id == 7) { /* 東京スタッフブログ*/

	// 	if ($p_name == '') {

			/*  School */

			$school_name = '日本ワーキングホリデー協会 東京オフィス';

			$school_link = '';

			$img_link = network_home_url() . 'wp-content/uploads/sites/7/2014/12/tokyo_info.jpg';

			$link = 'www.jawhm.or.jp/';

			$info = '<strong>【新宿駅西口から徒歩1分】</strong>

				<br><a href="/seminar/" target="_blank">毎日ワーホリ＆留学無料セミナー開催中</a>

				<br>OPEN 11:00 - CLOSE 19:00（毎日営業）

				<br><strong>【東京オフィスへのアクセス】</strong><br>

				<a href="/office/tokyo/" target="_blank"><span style="text-decoration: underline; color: #3366ff;">アクセス詳細</span></a><br>

				<a href="./tokyoblog/今日の協会オフィス/972/" target="_blank"><span style="text-decoration: underline; color: #3366ff;">■JR新宿駅から</span></a><br>

				<a href="./tokyoblog/今日の協会オフィス/931/" target="_blank"><span style="text-decoration: underline; color: #3366ff;">■東京メトロ丸の内線から</span></a><br>

				<a href="./tokyoblog/総合/894/" target="_blank"> <span style="text-decoration: underline; color: #3366ff;">■西武新宿線　西新宿駅から</span></a><br>';

	//	}

	}

	if ($blog_id == 9) { /* 名古屋スタッフブログ */

	// 	if ($p_name == '') {

			/*  School */

			$school_name = '日本ワーキング・ホリデー協会　名古屋オフィス';

			$school_link = '';

			$img_link = network_home_url() . 'wp-content/uploads/sites/9/2014/12/nagoya_info.jpg';

			$link = '';

			$info = '【名古屋オフィスまでのアクセス方法】<br>

			<a href="/office/nagoya/" target="_blank"><span style="text-decoration: underline; color: #3366ff;">アクセス詳細</span></a><br>

			■ <a href="./nagoyablog/今日の協会オフィス/18/" target="_blank"><span style="color: #3366ff; text-decoration: underline;"><strong>JR名古屋駅から</strong></span></span><br> 

			■ <a href="./nagoyablog/今日の協会オフィス/758/" target="_blank"><span style="text-decoration: underline;"><span style="color: #3366ff; text-decoration: underline;"><strong>地下鉄東山線から</strong></span></span></a>';

	//	}

	 }

	if ($blog_id == 11) { /* 沖縄スタッフブログ */

	// 	if ($p_name == '') {

			/*  School */

			$school_name = '日本ワーキング・ホリデー協会　沖縄オフィス';

			$school_link = '';

			$img_link = network_home_url() . 'wp-content/uploads/sites/11/2014/12/okinawa_info.jpg';

			$link = '';

			$info = '

				〒901-2221<br>

				沖縄県宜野湾市伊佐4-2-3 スカイマンション101<br>

				<br>

				tel:098-927-5388<br/>

				mail:<a href="mailto:e-sa@live.jp" target="_blank">e-sa@live.jp</a><br/>';

	//	}

	 }

	if ($blog_id == 20) { /* ワーホリストーリー */

	// 	if ($p_name == '') {

			/*  School */

			$school_name = 'コタローのフレーズ英会話';

			$school_link = '';

			$img_link = network_home_url() . 'wp-content/uploads/sites/20/2015/02/KOTANGLISH_02.jpg';

			$link = 'www.jawhm.or.jp';

			$info = '色々な場面で使える便利な英会話フレーズを覚えて、まずは一緒に『そこそこ英会話』を目指しましょう！';

	//	}

	 }

	if ($blog_id == 12) { /* ワーホリストーリー */

	// 	if ($p_name == '') {

			/*  School */

			$school_name = '日本ワーキング・ホリデー協会';

			$school_link = '';

			$img_link = network_home_url() . 'wp-content/uploads/sites/12/2015/01/wh_story_info.jpg';

			$link = 'www.jawhm.or.jp';

			$info = '日本ワーキング・ホリデー協会では、ブログでご紹介したような帰国者の方々と直接お話のできる「帰国者体験談セミナー」を行っています。少人数制で質問も気軽にできるアットホームなセミナーです。';

	//	}

	}

	if ($blog_id == 19) { /* アクセスプリペイド */

	// 	if ($p_name == '') {

			/*  School */

			$school_name = '';

			$school_link = '';

			$img_link = network_home_url() . '';

			$link = '';

			$info = '';

	//	}

	}

	if ($blog_id == 21) { /* 震災留学サポート */

	// 	if ($p_name == '') {

			/*  School */

			$school_name = '';

			$school_link = '';

			$img_link = network_home_url() . '';

			$link = '';

			$info = '';

	//	}

	}

	if ($blog_id == 22) { /* テスト用 */

	// 	if ($p_name == '') {

			/*  School */

			$school_name = '';

			$school_link = '';

			$img_link = network_home_url() . '';

			$link = '';

			$info = '';

	//	}

	}

	if ($blog_id == 26) { /* テスト用 */
		$school_name = 'ワーホリ情報局';
		$school_link = '';
		$img_link = network_home_url() . 'wp-content/uploads/sites/26/2020/08/working_holiday.png';
		$link = 'www.jawhm.or.jp';
		$info = '■定期ブログ更新：毎週月・水・金（＋速報）';
	}

	

	// if ($blog_id == ) { /* Page */

	// 	if ($p_name == '') {

			/*  School */

	//		$school_name = '';

	//		$school_link = '';

	//		$img_link = network_home_url() . '';

	//		$link = '';

	//		$info = '';

	//	}

	// }

?>



<?php

/* Please Do Not Edit The Codes Below */ 

/* 下に次のコードを編集しないでください */

?>



<?php if ($what_site == 'pc') { ?>



<?php

	if ($school_link != '') {

		$school_name = '<a href="http://' . $school_link . '" target="_blank"">' . $school_name . '</a>';

	}

?>



<table class="school_info_table">

<?php //echo $p_name; ?>

<tr>



<td class="school_info_image" style="width: 200px;"><img width="200" height="130" src="<?php echo $img_link; ?>" /></td>



<td class="school_info_detail"><p><span id="post_author" style="background-color: <?php echo $color; ?>; color: <?php echo $fcolor; ?>;"><?php echo 'BLOG Writer'; //$author; ?></span></p>



<br/><span class="school_name"><strong><u>学校名：<?php echo $school_name; ?></u></strong></span>



<br/><br/>

<?php if ($display_link == 1) { ?>

<span class="link">所在地：<a href="<?php echo $link; ?>" target="_blank"><?php echo $link; ?></a>

<?php } ?>



<?php if($info !== ''){ ?>

<br><?php echo $info; ?></span>

<?php } ?>
	<span>■定期ブログ更新：毎週月・水・金（＋速報）</span>
	<br><br>
	<a href="https://lin.ee/8nCk50S" target="_blank"><img src="/blog/wp-content/uploads/sites/26/2020/08/line.png" alt="Line" height="45" border="0"></a>
	<a href="https://www.youtube.com/channel/UCvQpgjQ3-87S285x8LQQesA" target="_blank"><img src="/blog/wp-content/uploads/sites/26/2020/08/youtube.png" alt="YouTube" height="45" width="45" border="0" style="border-radius: 4px;"></a>
	<a href="https://twitter.com/JAWHM" target="_blank"><img src="/blog/wp-content/uploads/sites/26/2020/08/twitter.png" alt="Twitter" height="45" border="0" style="border-radius: 4px;"></a>
	<a href="https://www.instagram.com/jawhm_tokyo/" target="_blank"><img src="/blog/wp-content/uploads/sites/26/2020/08/instagram.png" alt="Instagram" height="32" border="0" style="border-radius: 4px; margin-bottom: 6px;"></a>

</td>
</tr>



</table>



<?php } if ($what_site == 'mobile') { ?>



<div class="bloginfo_img">

	<img width="100%" src="<?php echo $img_link; ?>" />

</div>



<div class="bloginfo_text">

	<p><span id="post_author" style="background-color: <?php echo $color; ?>; color: <?php echo $fcolor; ?>;"><?php echo 'BLOG Writer'; //$author; ?></span></p>

	<p id="school_name_n_link"><?php echo $school_name; ?>

	<!-- <br/><a href="<?php echo $link; ?>" target="_blank"><?php echo $link; ?></a> --></p> 

</div>



<div class="bloginfo_info">

	<?php echo $info; ?>
	<span>■定期ブログ更新：毎週月・水・金（＋速報）</span>
	<br><br>
	<a href="https://lin.ee/8nCk50S" target="_blank"><img src="/blog/wp-content/uploads/sites/26/2020/08/line.png" alt="Line" height="50" width="50" border="0"></a>
	<a href="https://www.youtube.com/channel/UCvQpgjQ3-87S285x8LQQesA" target="_blank"><img src="/blog/wp-content/uploads/sites/26/2020/08/youtube.png" alt="YouTube" border="0" style="border-radius: 4px; height: 50px; width: 50px"></a>
	<a href="https://twitter.com/JAWHM" target="_blank"><img src="/blog/wp-content/uploads/sites/26/2020/08/twitter.png" alt="Twitter" height="50" width="50" border="0" style="border-radius: 4px;"></a>
	<a href="https://www.instagram.com/jawhm_tokyo/" target="_blank"><img src="/blog/wp-content/uploads/sites/26/2020/08/instagram.png" alt="Instagram" height="37" width="37" border="0" style="border-radius: 4px;"></a>
</div>



<?php } ?>