<?php
/**
 * these are the informations for each school
 *
 * by Joseph B.
 */

	if ($blog_id == 2) { /* Australia Page */
		$info = '世界中の国々からやってきた移民で形成された多民族・多文化国家です。 第2次世界大戦後に公式な移民計画を開始し、現在までに600万以上の移民を受け入れています。 そのため、オーストラリアでは自分が外国人としての意識なく自然に振舞うことが出来るので、生活をしやすい国といえるでしょう。 ワーキングホリデーの渡航国としても一番歴史があり、親日家が多いことでも知られています。 天候がよく、青い海が広がっていることも、渡航国として一番人気のある理由です。';
	}
	if ($blog_id == 3) { /* Canada Page */
		$info = 'カナダは、移民で成立された国のため、留学生の受け入れも積極的で、非常にフレンドリーな国柄です。 またカナダはアメリカに近いことから、アメリカの英語に近い発音を持っています。 地域によって公用語がフランス語と英語となり、英語だけでなくフランス語教育にも高い水準を誇っています。 治安の良い国、住みやすい国としても上位に複数の都市がランクインする程で、留学・ワーキングホリデーで生活する国としても整った環境であると言えるでしょう。';
	}
	if ($blog_id == 4) { /* New Zealand Page */
		$info = 'ニュージーランドの人達は、とてもフレンドリーで暖かく、親日家も多いので、馴染みやすく、英語の上達にも素晴らしい環境です。 また語学学習に関しては、元々イギリスの教育制度に基づいているため、世界レベルの多種多様な教育を受けることができます。 生活水準が高く、物価はリーズナブルなため生活面でも非常に暮らしやすい国です。手付かずの大自然も多く残っており、アクティビティも盛んなため、 勉強・仕事以外にも楽しめる環境が整っています。';
	}
	if ($blog_id == 5) { /* Europe */
		$info = 'ワーキングホリデーで渡航することができるヨーロッパの国は、イギリス、フランス、ドイツ、アイルランド、デンマーク、ノルウェー、ポーランド、ポルトガルの８カ国です。英語以外にもその国独自の様々な言語が使用されており、トライリンガルを目指すには最適な環境です。歴史のある建築物や美術品だけでなく、自然溢れる観光地も多く点在しているので、一味違った生活を楽しむことが出来ます。国同士が密集しているので、滞在中に国をまたいだ旅行をすることも可能です。';
	}
	if ($blog_id == 6) { /* World Page */
		$info = 'イオーストラリア、カナダ、イギリス、ニュージーランド以外にもワーキングホリデーの制度を使って渡航できる国はたくさんあります。中には英語が母国ではない国もあるので、その国の言葉が全く分からない状態で出発すると最初は苦労するかもしれません。しかし、その国独自の歴史や文化に触れ働きながらその国でしかできないことを体験できるので、たくさんの方がワーキングホリデーの制度を使って世界中に渡航してきます。';
	}

	echo '<p>' . $info . '</p>';
?>