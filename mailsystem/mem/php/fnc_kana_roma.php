<?php
// copyright (c) 2009 ksy AT blogara.jp <http://blogara.jp/>
// This script is freely distributable under the terms of an MIT-style license.

define( 'CNV_MD_ALPHA', 0x02 );
define( 'CNV_MD_SPACE', 0x08 );
define( 'CNV_MD_ALSP', 0x0a );

class TextUtil {
  protected static $kk = array( 'キャ','キュ','キョ','シャ','シュ','ショ','チャ','チュ','チョ','ニャ','ニュ','ニョ','ヒャ','ヒュ','ヒョ','ミャ','ミュ','ミョ','リャ','リュ','リョ','ギャ','ギュ','ギョ','ジャ','ジュ','ジョ','ヂャ','ヂュ','ヂョ','ビャ','ビュ','ビョ','ピャ','ピュ','ピョ','イェ','ウァ','ウィ','ウェ','ウォ','ウュ','キェ','クァ','クィ','クェ','クォ','クヮ','シェ','チェ','ツァ','ツィ','ツェ','ツォ','ツュ','ティ','テュ','トゥ','ニェ','ヒェ','ファ','フィ','フェ','フォ','フィェ','フャ','フュ','フョ','ミェ','リェ','ヴァ','ヴィ','ヴェ','ヴォ','ヴィェ','ヴャ','ヴュ','ヴョ','ヴヰ','ヴヲ','ギェ','グァ','グィ','グェ','グォ','グヮ','ゲォ','ゲョ','ジェ','ディ','デュ','ドゥ','ビェ','ピェ','ア','イ','ウ','エ','オ','カ','キ','ク','ケ','コ','サ','シ','ス','セ','ソ','タ','チ','ツ','テ','ト','ナ','ニ','ヌ','ネ','ノ','ハ','ヒ','フ','ヘ','ホ','マ','ミ','ム','メ','モ','ヤ','ユ','ヨ','ラ','リ','ル','レ','ロ','ワ','ヲ','ン','ガ','ギ','グ','ゲ','ゴ','ザ','ジ','ズ','ゼ','ゾ','ダ','ヂ','ヅ','デ','ド','バ','ビ','ブ','ベ','ボ','パ','ピ','プ','ペ','ポ','ヰ','ヱ','ヲ','ヴ','・','　' );
  protected static $kkr = array( 'kya','kyu','kyo','sha','shu','sho','cha','chu','cho','nya','nyu','nyo','hya','hyu','hyo','mya','myu','myo','rya','ryu','ryo','gya','gyu','gyo','ja','ju','jo','ja','ju','jo','bya','byu','byo','pya','pyu','pyo','ye','wa','wi','we','wo','wyu','kye','kwa','kwi','kwe','kwo','kwa','she','che','tsa','tsi','tse','tso','tsyu','ti','tyu','tu','nye','hye','fa','fi','fe','fo','fye','fya','fyu','fyo','mye','rye','va','vi','ve','vo','vye','vya','vyu','vyo','vi','vo','gye','gwa','gwi','gwe','gwo','gwa','geo','geyo','je','di','dyu','du','bye','pye','a','i','u','e','o','ka','ki','ku','ke','ko','sa','shi','su','se','so','ta','chi','tsu','te','to','na','ni','nu','ne','no','ha','hi','fu','he','ho','ma','mi','mu','me','mo','ya','yu','yo','ra','ri','ru','re','ro','wa','wo','n','ga','gi','gu','ge','go','za','ji','zu','ze','zo','da','ji','zu','de','do','ba','bi','bu','be','bo','pa','pi','pu','pe','po','wi','we','wo','vu',' ',' ' );

  public static function convertKKtoR( $str, $bHGtoKK=TRUE, $mode=CNV_MD_ALSP ) {
    if ( !$str ) return $str;

// 半角カタカナから全角カタカナへの変換
//    $str = self::convertHtoF( $str, CNV_MD_KKANA );

// ひらがなから全角カタカナへの変換
//    if ( $bHGtoKK )
//      $str = self::convertHK( $str, CNV_HGTOKK );
    $str = str_replace( self::$kk, self::$kkr, $str );
    $str = preg_replace( '/(\b|[^ou])o[ou](\b|[^ou])/u', '$1o$2', $str );
    $str = preg_replace( '/n([bpm])/u', 'm$1', $str );
    $str = preg_replace_callback( '/ッ+(.)?/u', 'TextUtil::convKK2toR', $str );
    $str = strtoupper($str);

// 有効とする文字コード以外を削除
// 半角英字小文字を含む文字列を対象にする場合には、カタカナ->ローマ字変換の前にも行う方が良い
//    $mode |= CNV_MD_ALPHA;
//    return self::extractCode( $str, $mode );
	return $str;
  }

  protected static function convKK2toR( $ma ) {
    if ( !$ma || !isset($ma[1]) ) return '';
    $char = $ma[1];
    if ( !preg_match('/^[a-z]$/u',$char) || preg_match('/^[aiueo]$/u',$char) ) return $char;

    if ( $char == 'c' )
      return 'tc';
    else
      return $char.$char;
  }
}
?>