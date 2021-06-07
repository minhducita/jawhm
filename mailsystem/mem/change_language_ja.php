<?php

/**
 * @param $mot
 * @return $resultat
 * author: nguyentuananh2985@gmail.com
 */

/*Conversion hiragana/katakana => rômaji*/
//$mot = 'ねえ、おまえ、スーパーマーケットにいったかい？';

function toRomaji($mot)
{
    $resultat = $mot;

    $kyakyukyo = array(
        //hira
        'きゃ' => 'kya',
        'きゅ' => 'kyu',
        'きょ' => 'kyo',
        'しゃ' => 'sha',
        'しゅ' => 'shu',
        'しょ' => 'sho',
        'ちゃ' => 'cha',
        'ちゅ' => 'chu',
        'ちょ' => 'cho',
        'にゃ' => 'nya',
        'にゅ' => 'nyu',
        'にょ' => 'nyo',
        'ひゃ' => 'hya',
        'ひゅ' => 'hyu',
        'ひょ' => 'hyo',
        'みゃ' => 'mya',
        'みゅ' => 'myu',
        'みょ' => 'myo',
        'りゃ' => 'rya',
        'りゅ' => 'ryu',
        'りょ' => 'ryo',
        'ぎゃ' => 'gya',
        'ぎゅ' => 'gyu',
        'ぎょ' => 'gyo',
        'じゃ' => 'ja',
        'じゅ' => 'ju',
        'じょ' => 'jo',
        'びゃ' => 'bya',
        'びゅ' => 'byu',
        'びょ' => 'byo',
        'ぴゃ' => 'pya',
        'ぴゅ' => 'pyu',
        'ぴょ' => 'pyo',
        //kana
        'キャ' => 'KYA',
        'キュ' => 'KYU',
        'キョ' => 'KYO',
        'シャ' => 'SHA',
        'シュ' => 'SHU',
        'ショ' => 'SHO',
        'チャ' => 'CHA',
        'チュ' => 'CHU',
        'チョ' => 'CHO',
        'ニャ' => 'NYA',
        'ニュ' => 'NYU',
        'ニョ' => 'NYO',
        'ヒャ' => 'HYA',
        'ヒュ' => 'HYU',
        'ヒョ' => 'HYO',
        'ミャ' => 'MYA',
        'ミュ' => 'MYU',
        'ミョ' => 'MYO',
        'リャ' => 'RYA',
        'リュ' => 'RYU',
        'リョ' => 'RYO',
        'ギャ' => 'GYA',
        'ギュ' => 'GYU',
        'ギョ' => 'GYO',
        'ジャ' => 'JA',
        'ジュ' => 'JU',
        'ジョ' => 'JO',
        'ビャ' => 'BYA',
        'ビュ' => 'BYU',
        'ビョ' => 'BYO',
        'ピャ' => 'PYA',
        'ピュ' => 'PYU',
        'ピョ' => 'PYO',
        'ウィ' => 'WI',
        'ウェ' => 'WE',
        'ウォ' => 'WO',
        'シェ' => 'SHE',
        'チェ' => 'CHE',
        'ツァ' => 'TSA',
        'ツェ' => 'TSE',
        'ツォ' => 'TSO',
        'ティ' => 'TI',
        'トゥ' => 'TU',
        'ファ' => 'FA',
        'フィ' => 'FI',
        'フェ' => 'FE',
        'フォ' => 'FO',
        'ジェ' => 'JE',
        'ディ' => 'DI',
        'ドゥ' => 'DU',
        'デュ' => 'DYU'
    );
    $resultat = str_replace(array_keys($kyakyukyo), array_values($kyakyukyo), $resultat);

    $hira_kata = array(
        //hira
        'あ' => 'a',
        'い' => 'i',
        'う' => 'u',
        'え' => 'e',
        'お' => 'o',
        'か' => 'ka',
        'き' => 'ki',
        'く' => 'ku',
        'け' => 'ke',
        'こ' => 'ko',
        'さ' => 'sa',
        'し' => 'shi',
        'す' => 'su',
        'せ' => 'se',
        'そ' => 'so',
        'た' => 'ta',
        'ち' => 'chi',
        'つ' => 'tsu',
        'て' => 'te',
        'と' => 'to',
        'な' => 'na',
        'に' => 'ni',
        'ぬ' => 'nu',
        'ね' => 'ne',
        'の' => 'no',
        'は' => 'ha',
        'ひ' => 'hi',
        'ふ' => 'fu',
        'へ' => 'he',
        'ほ' => 'ho',
        'ま' => 'ma',
        'み' => 'mi',
        'む' => 'mu',
        'め' => 'me',
        'も' => 'mo',
        'や' => 'ya',
        'ゆ' => 'yu',
        'よ' => 'yo',
        'ら' => 'ra',
        'り' => 'ri',
        'る' => 'ru',
        'れ' => 're',
        'ろ' => 'ro',
        'わ' => 'wa',
        'ゐ' => 'wi',
        'ゑ' => 'we',
        'を' => 'wo',
        'ん' => 'n',
        'が' => 'ga',
        'ぎ' => 'gi',
        'ぐ' => 'gu',
        'げ' => 'ge',
        'ご' => 'go',
        'ざ' => 'za',
        'じ' => 'ji',
        'ず' => 'zu',
        'ぜ' => 'ze',
        'ぞ' => 'zo',
        'だ' => 'da',
        'ぢ' => 'di',
        'づ' => 'du',
        'で' => 'de',
        'ど' => 'do',
        'ば' => 'ba',
        'び' => 'bi',
        'ぶ' => 'bu',
        'べ' => 'be',
        'ぼ' => 'bo',
        'ぱ' => 'pa',
        'ぴ' => 'pi',
        'ぷ' => 'pu',
        'ぺ' => 'pe',
        'ぽ' => 'po',
        //kana
        'ア' => 'A',
        'イ' => 'I',
        'ウ' => 'U',
        'エ' => 'E',
        'オ' => 'O',
        'カ' => 'KA',
        'キ' => 'KI',
        'ク' => 'KU',
        'ケ' => 'KE',
        'コ' => 'KO',
        'サ' => 'SA',
        'シ' => 'SHI',
        'ス' => 'SU',
        'セ' => 'SE',
        'ソ' => 'SO',
        'タ' => 'TA',
        'チ' => 'CHI',
        'ツ' => 'TSU',
        'テ' => 'TE',
        'ト' => 'TO',
        'ナ' => 'NA',
        'ニ' => 'NI',
        'ヌ' => 'NU',
        'ネ' => 'NE',
        'ノ' => 'NO',
        'ハ' => 'HA',
        'ヒ' => 'HI',
        'フ' => 'FU',
        'ヘ' => 'HE',
        'ホ' => 'HO',
        'マ' => 'MA',
        'ミ' => 'MI',
        'ム' => 'MU',
        'メ' => 'ME',
        'モ' => 'MO',
        'ヤ' => 'YA',
        'ユ' => 'YU',
        'ヨ' => 'YO',
        'ラ' => 'RA',
        'リ' => 'RI',
        'ル' => 'RU',
        'レ' => 'RE',
        'ロ' => 'RO',
        'ワ' => 'WA',
        'ヰ' => 'WI',
        'ヱ' => 'WE',
        'ヲ' => 'WO',
        'ン' => 'N',
        'ガ' => 'GA',
        'ギ' => 'GI',
        'グ' => 'GU',
        'ゲ' => 'GE',
        'ゴ' => 'GO',
        'ザ' => 'ZA',
        'ジ' => 'JI',
        'ズ' => 'ZU',
        'ゼ' => 'ZE',
        'ゾ' => 'ZO',
        'ダ' => 'DA',
        'ヂ' => 'DI',
        'ヅ' => 'DU',
        'デ' => 'DE',
        'ド' => 'DO',
        'バ' => 'BA',
        'ビ' => 'BI',
        'ブ' => 'BU',
        'ベ' => 'BE',
        'ボ' => 'BO',
        'パ' => 'PA',
        'ピ' => 'PI',
        'プ' => 'PU',
        'ペ' => 'PE',
        'ポ' => 'PO',
        '！' => '!',
        '？' => '?',
        '、' => ', '
    );
    $resultat = str_replace(array_keys($hira_kata), array_values($hira_kata), $resultat);

    $tsu = array(
        //hira
        'っK' => 'kk',
        'っS' => 'ss',
        'っT' => 'tt',
        'っC' => 'cc',
        'っH' => 'hh',
        'っM' => 'mm',
        'っR' => 'rr',
        'っG' => 'gg',
        'っJ' => 'jj',
        'っD' => 'dd',
        'っB' => 'bb',
        'っP' => 'pp',
        //Kana
        'ッK' => 'KK',
        'ッS' => 'SS',
        'ッT' => 'TT',
        'ッC' => 'CC',
        'ッH' => 'HH',
        'ッM' => 'MM',
        'ッR' => 'RR',
        'ッG' => 'GG',
        'ッJ' => 'JJ',
        'ッD' => 'DD',
        'ッB' => 'BB',
        'ッP' => 'PP',
        'ー' => '-'
    );
    $resultat = str_replace(array_keys($tsu), array_values($tsu), strtoupper($resultat));

    $allongements = array(
        'A-' => 'AA',
        'I-' => 'II',
        'U-' => 'UU',
        'E-' => 'EE',
        'O-' => 'OO'
    );
    $resultat = str_replace(array_keys($allongements), array_values($allongements), strtoupper($resultat));

    return strtoupper($resultat);
}

/*
$result = '';
$hira_kata = '';
if (!empty($_POST['hira_kata'])) {
    $hira_kata = $_POST['hira_kata'];
    $result =  toRomaji($hira_kata);
}
if (!empty($_POST['delete_hk'])) {
    $hira_kata = '';
    $result = '';
}
*/
?>

<!--DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" lang="ja">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Test Hiragana - Katakana change to Romaji</title>
</head>
<body>
<h1>Test Hiragana - Katakana change to Romaji</h1>
<form method="post">
    Hiragana or Katakana:<br><br>
    <input type="text" name="hira_kata" size="100" value="<?php echo $hira_kata; ?>"/><br><br>
    <input type="submit" value="To Romaji"/>
    <input type="submit" value="Delete" name="delete_hk"/>
</form>

<p><strong>Result: <?php echo $result; ?></strong></p>

</body>
</html-->