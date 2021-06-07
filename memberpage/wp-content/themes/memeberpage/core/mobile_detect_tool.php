<?php 
class Mobile_Detect_Tool {
	public function computer_use(){
            $target = "";
            $ua = $_SERVER['HTTP_USER_AGENT'];
            if ((strpos($ua, 'Android') !== false) && (strpos($ua, 'Mobile') !== false) || (strpos($ua, 'iPhone') !== false) || (strpos($ua, 'iPod') !== false) || (strpos($ua, 'Windows Phone') !== false)) {
                // スマートフォンからアクセスされた場合
                $target = "sp";
            } elseif ((strpos($ua, 'Android') !== false) || (strpos($ua, 'iPad') !== false)) {
                // タブレットからアクセスされた場合
                $target = "tab";
            } else {
                // その他（PC）からアクセスされた場合
                $target = "pc";
            }
			
            if ($target == "sp")
                return false;
            else
                return true;
	}
}
?>