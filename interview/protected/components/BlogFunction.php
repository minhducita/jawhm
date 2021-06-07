<?php
//get in twentytwelve\function.php and triangle_title_setting.php
class BlogFunction {

    function custom_site_settings($b_id) {

        $triangle_color = array();

        $font_color = array();

        $header_image = array();

        ////////////////////////////////////////////////////
        //triangle_title_setting.php

        $triangle_color[] = '#000033';

        $font_color[] = 'white';



        /* 1 = Blank - こちらは編集しないでください。 */

        $triangle_color[] = '';

        $font_color[] = '';


        $triangle_color[] = 'orange';

        $font_color[] = 'white';

        $australia_school = array(
            '32', 'IHSydney', // インターナショナルハウスシドニー (IH Sydney)
            '17', 'BROWNS', // ブラウンズ (Browns)
            '28', 'ICQA', // 語学学校ICQA
            '26', 'ILSC', // 語学学校ILSC
            '29', 'OHC', // 語学学校OHC オーストラリア (Holmes)
            '15', 'Impact', // 語学学校インパクト(Impact)
            '25', 'Inforum', // 語学学校インフォーラム (inforum)
            '31', 'Greenwich', // 語学学校グリニッジ・イングリッシュ・カレッジ (greenwich)
            '2', 'SELC', // 語学学校 セルク (selc)
            '27', 'Navitas', // 語学学校 ナビタス (navitas)
            '33', 'Viva', // 語学学校 ビバ・カレッジ (viva)
            '30', 'Fusion', // 語学学校 フュージョン・イングリッシュ (fusion)
            '210', 'Discover', // 語学学校 ディスカバー (discover)
            '217', 'IH Brisbane', // 語学学校 インターナショナルハウスブリスベン (IH Sydney)
        );



        /* 3 = カナダブログの三角表示、テキスト色の変更はこちらを変更してください。 */

        $triangle_color[] = 'red';

        $font_color[] = 'white';

        $canada_school = array(
            /*

             * ==== カナダの各学校の三角表示のテキストは以下から変更することができます。 ======

             */

            '83', 'ILAC', // International Language Academy of Canada – ILAC
            '6', 'CCEL', // 語学学校 CCEL
            '60', 'CAC', // 語学学校 CAC(Cornerstone Academic College)
            '27', 'IHvancouver', // インターナショナルハウスバンクーバー (IH vancouver)
            '37', 'KGIC', // 語学学校 KGIC
            '64', 'PGIC', // 語学学校 PGIC
            '50', 'UMC', // 語学学校 UMC
            '72', 'Quest', // 語学学校 クエスト(quest)
            '2', 'Eurocentres', // 語学学校 ユーロセンター・カナダ(eurocentres)
            '204', 'Tamwood', // 語学学校 タムウッド(tamwood)
            '206', 'SEC', // 語学学校 エス・イー・シー(sec)
            '299', 'VanWest', // 語学学校 Van West(vanwest)
        );



        /* 4 = ニュージーランドブログの三角表示、テキスト色の変更はこちらを変更してください。 */

        $triangle_color[] = 'green';

        $font_color[] = 'white';

        $new_zealand_school = array(
            /*

             * ==== ニュージーランドの学校の三角表示のテキストは以下から変更することができます。 ======

             */

            '2', 'NZLC', // 語学学校 NZLC School
            '23', 'WWSE', // 語学学校 WWSE
        );



        /* 5 = イギリスブログの三角表示、テキスト色の変更はこちらを変更してください。 */

        $triangle_color[] = 'purple';

        $font_color[] = 'white';

        $united_kingdom_school = array(
            /*

             * ==== イギリスの学校の三角表示のテキストは以下から変更することができます。 ======

             */

            '2', 'Bloomsbury', // 語学学校 ブルームズブリー School (bloomsbury)
        );



        /* 6 = ワールドブログの三角表示、テキスト色の変更はこちらを変更してください。 */

        $triangle_color[] = 'blue';

        $font_color[] = 'white';

        $world_school = array(
            /*

             * ==== ワールドの学校の三角表示のテキストは以下から変更することができます。 ======

             */

            '2', 'Embassy', // 語学学校 エンバシー School (embassy)
            '21', 'Kaplan', // 語学学校 カプラン School (kaplan)
            '30', 'OHC', // 語学学校 OHC Group School (ohc)
        );




        /* 7 = 東京スタッフブログの三角表示の色、テキスト色、テキストの値はこちらから変更します。 */

        $triangle_color[] = '#0363B3';

        $font_color[] = 'white';

        $triangle_name[] = 'TOKYO';



        /* 8 = 大阪スタッフブログの三角表示の色、テキスト色、テキストの値はこちらから変更します。 */

        $triangle_color[] = '#F67294';

        $font_color[] = 'white';

        $triangle_name[] = 'OSAKA';



        /* 9 = 名古屋スタッフブログの三角表示の色、テキスト色、テキストの値はこちらから変更します。 */

        $triangle_color[] = '#00B38C';

        $font_color[] = 'white';

        $triangle_name[] = 'NAGOYA';



        /* 10 = 福岡スタッフブログの三角表示の色、テキスト色、テキストの値はこちらから変更します。 */

        $triangle_color[] = '#FFBB39';

        $font_color[] = 'white';

        $triangle_name[] = 'FUKUOKA';



        /* 11 = 沖縄スタッフブログの三角表示の色、テキスト色、テキストの値はこちらから変更します。 */

        $triangle_color[] = '#37BAFF';

        $font_color[] = 'white';

        $triangle_name[] = 'OKINAWA';



        /* 12 = ワーホリストーリーブログの三角表示の色、テキスト色、テキストの値はこちらから変更します。 */

        $triangle_color[] = '';

        $font_color[] = 'white';

        $triangle_name[] = 'WHStory';



        /* 13 = Blank - こちらは編集しないでください。 */

        $triangle_color[] = '';

        $font_color[] = '';

        $triangle_name[] = '';



        /* 14 = Blank - こちらは編集しないでください。 */

        $triangle_color[] = '';

        $font_color[] = '';

        $triangle_name[] = '';



        /* 15 = Blank - こちらは編集しないでください。 */

        $triangle_color[] = '';

        $font_color[] = '';

        $triangle_name[] = '';



        /* 16 = Blank - こちらは編集しないでください。 */

        $triangle_color[] = '';

        $font_color[] = '';

        $triangle_name[] = '';



        /* 17 = Blank - こちらは編集しないでください。 */

        $triangle_color[] = '';

        $font_color[] = '';

        $triangle_name[] = '';



        /* 18 = Blank - こちらは編集しないでください。 */

        $triangle_color[] = '';

        $font_color[] = '';

        $triangle_name[] = '';



        /* 19 = アクセスプリペイドブログの三角表示の色、テキスト色、テキストの値はこちらから変更します。 */

        $triangle_color[] = '';

        $font_color[] = 'white';

        $triangle_name[] = 'AccessPrepaid';



        /* 20 = コタロ英会話 (kotanglish)ブログの三角表示の色、テキスト色、テキストの値はこちらから変更します。 */

        $triangle_color[] = '#00b8d2';

        $font_color[] = 'white';

        $triangle_name[] = 'Kotanglish';



        /* 21 = 震災留学サポートブログの三角表示の色、テキスト色、テキストの値はこちらから変更します。 */

        $triangle_color[] = '';

        $font_color[] = 'white';

        $triangle_name[] = 'SRS';



        /* 22 = テスト用ブログの三角表示の色、テキスト色、テキストの値はこちらから変更します。 */

        $triangle_color[] = '';

        $font_color[] = 'white';

        $triangle_name[] = 'Test';




        /////////////////////////////////////////////////////
        // check values

        $t_color = $triangle_color[$b_id];

        $f_color = $font_color[$b_id];

        //$h_image = $header_image[$b_id];



        if ($triangle_color[$b_id] == '') {

            $t_color = $triangle_color[0];
        }

        if ($font_color[$b_id] == '') {

            $f_color = $font_color[0];
        }

        //if ($header_image[$b_id] == '') {
        //$h_image = $header_image[0];
        //}
        // end of checking values



        return array($t_color, $f_color); //, $h_image);
    }

    function image_thumbnail($img_link, $container_height, $container_width, $size_type) {

	$img_link = '/var/www/html' . $img_link; //var/www/html

    

	// get the image's height and width

	$tw = '';

	$th = '';
    
    //JN:change
    if(file_exists($img_link)){
        list($tw, $th) = getimagesize($img_link);
    }else{
        list($tw, $th) = getimagesize('/var/www/html/blog/wp-content/uploads/defaults/no-image.png');
    }
	//JN:end

	//die(echo $tw . '-' . $th);

	// get the container's height and width, multiplied by 2

	$c_height = intval($container_height * 2);

	$c_width = intval($container_width * 2);

	

	// adjustments

	$thumb_css = '';

	$x_adjustment = 0;

	$x_compare = 0;

	$adj_h = 0;

	$adj = 0;

	if ($th < $tw) {

		$x_adjustment = $tw - $th;

		$x_compare = $container_width;

	} else {

		$x_adjustment = $th - $tw;

		$x_compare = $container_height;

	}

	if ($tw > $container_width) {

		$adj_h = $th * ($tw / $container_width);

	} else {

		$adj_h = $th * ($container_width / $tw);

	}

	$adj = $adj_h - $container_height;

	

	// adjustments 2

	$x1 = '';

	$x2 = '';

	$y1 = '';

	$x1 = $tw / $container_width;

	$x2 = intval($tw / $x1);

	$y1 = intval($th / $x1);

	

	// image height > container height

	// image width > container width

	if (($tw > $c_width) and ($th > $c_height)) {

		$thumb_css = 'style="';

		$thumb_css .= 'height: auto; ';

		$thumb_css .= 'width: 100%; ';

		

		if (($x_adjustment * 2) < $x_compare) {

			$x_adjustment = ($x_adjustment / 2) - ($x_adjustment / ($x_compare / 10));

		} else if (($x_adjustment * 2) >= ($x_compare * 5)) {

			$x_adjustment = $x_adjustment / ($x_compare / 9);

		} else {

			$x_adjustment = $x_adjustment / ($x_compare / 10);

		}

		

		if ($tw < $th) {

			$thumb_css .= 'top: -' . $x_adjustment . $size_type . '; ';

		} else {

			$thumb_css .= 'position: absolute; ';

			$thumb_css .= 'margin: auto; ';

			$thumb_css .= 'top: 0; ';

			$thumb_css .= 'left: 0; ';

			$thumb_css .= 'right: 0; ';

			$thumb_css .= 'bottom: 0; ';

		}

		

		$thumb_css .= '1 ';

	}



	// image height <= container height

	// image width <= container width

	if (($tw <= $c_width) and ($th <= $c_height)) {

		$thumb_css = 'style="';

		

		if ($tw >= $container_width) {

			// image width > actual container width

			$thumb_css .= 'width: 100%; ';

			$thumb_css .= 'height: auto; ';

		} else {

			// image width < actual container width

			$thumb_css .= 'position: absolute; ';

			$thumb_css .= 'margin: auto; ';

			$thumb_css .= 'top: 0; ';

			$thumb_css .= 'left: 0; ';

			$thumb_css .= 'right: 0; ';

			$thumb_css .= 'bottom: 0; ';

		}

		

		if (($tw < $th) and ($tw > $container_width)) {

			$thumb_css .= 'top: -' . $x_adjustment . $size_type . '; ';

		}

		

		$thumb_css .= '2 ';

	}

	

	// image height >= container height

	// image width < container width

	if ($th >= $c_height and ($tw < $c_width)) {

		$thumb_css = 'style="';

		

		if ($tw >= $container_width) {

			// image width > actual container width

			$thumb_css .= 'height: auto; ';

			$thumb_css .= 'width: 100%; ';

			

			if (($x_adjustment * 2) < $x_compare) {

				$x_adjustment = ($x_adjustment / 2) - ($x_adjustment / ($x_compare / 10));

				

				// check if adjustment is too much

				//if ($view == 'mobile') {

				//	$x_adjustment = $x_adjustment / 2;

				//} else if ($x_adjustment > 40) {

					$x_adjustment = $x_adjustment - 10;

				//}

			} else if (($x_adjustment * 2) >= ($x_compare * 5)) {

				$x_adjustment = $x_adjustment / ($x_compare / 9);

			} else if (($x_adjustment * 2) >= ($x_compare * 5)) {

				$x_adjustment = $x_adjustment / ($x_compare / 9);

			} else {

				$x_adjustment = $x_adjustment / ($x_compare / 10);

			}

			

			$thumb_css .= 'top: -' . $x_adjustment . $size_type . '; ';

		} else {

			// image width < actual container width

			$thumb_css .= 'position: absolute; ';

			$thumb_css .= 'margin: auto; ';

			$thumb_css .= 'top: 0; ';

			$thumb_css .= 'left: 0; ';

			$thumb_css .= 'right: 0; ';

			$thumb_css .= 'bottom: 0; ';

		}

		

		$thumb_css .= '3 ';

	}

	

	// image height < container height

	// image width >= container width

	if ((($th < $c_height) and ($tw >= $c_width)) or ($y1 < $container_height)) {

		$thumb_css = 'style="';

		

		if ($y1 < $container_height) {

			$thumb_css .= 'width: 100%; ';

		}

		

		$thumb_css .= 'position: absolute; ';

		$thumb_css .= 'margin: auto; ';

		$thumb_css .= 'top: 0; ';

		$thumb_css .= 'left: 0; ';

		$thumb_css .= 'right: 0; ';

		$thumb_css .= 'bottom: 0; ';

			

		$thumb_css .= '4 ';

	}

	

	// end of css

	$thumb_css .= '"';

	//if($thumb_css == '')
    //{
    //    $thumb_css = "height: auto; width: 100%; top: -25px; ";
    //}

	return $thumb_css;

}
    
}
?>

