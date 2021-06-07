<?php

	$id = $_GET['id'];
	$html = "";
	if($id)
	{
		
		switch($id)
		{
			case '1':
			
				$html = '
					<p>Q.田舎より都合が好き</p>
					<div class="pop-button">
						<button onclick="getpopup(14);" class="btn-no"></button>
						<button onclick="getpopup(2);" class="btn-yes"></button>
					</div>
				';
			
				break;
			case '2':
				
				$html = '
					<p>Q.現地オフィスがある都市がいい</p>
					<div class="pop-button">
						<button onclick="getpopup(10);" class="btn-no"></button>
						<button onclick="getpopup(3);" class="btn-yes"></button>
					</div>
				';
				
				break;
				
			case '3':
				$html = '
					<p>Q.英語力に不安がある（自信がない）</p>
					<div class="pop-button">
						<button onclick="getpopup(7);" class="btn-no"></button>
						<button onclick="getpopup(4);" class="btn-yes"></button>
					</div>
				';
				break;
				
			case '4':
				$html = '
					<p>Q.初めての海外渡航で不安</p>
					<div class="pop-button">
						<button onclick="getpopup(8);" class="btn-no"></button>
						<button onclick="getpopup(5);" class="btn-yes"></button>
					</div>
				';
				break;
				
			case '5':
				$html = '
					<p>Q.都合も自然も楽しみたい</p>
					<div class="pop-button">
						<button onclick="getpopup(9);" class="btn-no"></button>
						<button onclick="getpopup(6);" class="btn-yes"></button>
					</div>
				';
				break;
				
			case '6':
				$html = '
					<p>Q.仕事が見つけやすい場所がいい</p>
					<div class="pop-button">
						<button onclick="getpopup(52);" class="btn-no"></button>
						<button onclick="getpopup(51);" class="btn-yes"></button>
					</div>
				';
				break;
				
			case '7':
				$html = '
					<p>Q.海外生活（3ヶ月以上の長期滞在）は初めて</p>
					<div class="pop-button">
						<button onclick="getpopup(12);" class="btn-no"></button>
						<button onclick="getpopup(8);" class="btn-yes"></button>
					</div>
				';
				break;
				
			case '8':
				$html = '
					<p>Q.勉強も遊びも満喫したい</p>
					<div class="pop-button">
						<button onclick="getpopup(13);" class="btn-no"></button>
						<button onclick="getpopup(9);" class="btn-yes"></button>
					</div>
				';
				break;
				
			case '9':
				$html = '
					<p>Q.すぐにバイトを始めたい</p>
					<div class="pop-button">
						<button onclick="getpopup(56);" class="btn-no"></button>
						<button onclick="getpopup(51);" class="btn-yes"></button>
					</div>
				';
				break;
				
			case '10':
				$html = '
					<p>Q.予算に不安がある</p>
					<div class="pop-button">
						<button onclick="getpopup(7);" class="btn-no"></button>
						<button onclick="getpopup(11);" class="btn-yes"></button>
					</div>
				';
				break;
				
			case '11':
				$html = '
					<p>Q.勉強に集中したい</p>
					<div class="pop-button">
						<button onclick="getpopup(9);" class="btn-no"></button>
						<button onclick="getpopup(54);" class="btn-yes"></button>
					</div>
				';
				break;	
				
			case '12':
				$html = '
					<p>Q.セカンドワーホリに興味がある</p>
					<div class="pop-button">
						<button onclick="getpopup(17);" class="btn-no"></button>
						<button onclick="getpopup(13);" class="btn-yes"></button>
					</div>
				';
				break;
				
			case '13':
				$html = '
					<p>Q.農場（ファーム）で働きたい</p>
					<div class="pop-button">
						<button onclick="getpopup(54);" class="btn-no"></button>
						<button onclick="getpopup(52);" class="btn-yes"></button>
					</div>
				';
				break;
				
			case '14':
				$html = '
					<p>Q.現地オフィスがあった方が安心する</p>
					<div class="pop-button">
						<button onclick="getpopup(21);" class="btn-no"></button>
						<button onclick="getpopup(18);" class="btn-yes"></button>
					</div>
				';
				break;
				
			case '15':
				$html = '
					<p>Q.カフェやコーヒーが好き</p>
					<div class="pop-button">
						<button onclick="getpopup(12);" class="btn-no"></button>
						<button onclick="getpopup(16);" class="btn-yes"></button>
					</div>
				';
				break;
				
			case '16':
				$html = '
					<p>Q.観光業や接客業の仕事に興味がある</p>
					<div class="pop-button">
						<button onclick="getpopup(12);" class="btn-no"></button>
						<button onclick="getpopup(20);" class="btn-yes"></button>
					</div>
				';
				break;
				
			case '17':
				$html = '
					<p>Q.都合すぎず、田舎すぎずな都市がいい</p>
					<div class="pop-button">
						<button onclick="getpopup(20);" class="btn-no"></button>
						<button onclick="getpopup(52);" class="btn-yes"></button>
					</div>
				';
				break;
				
			case '18':
				$html = '
					<p>Q.おしゃれな海外生活に慣れる</p>
					<div class="pop-button">
						<button onclick="getpopup(22);" class="btn-no"></button>
						<button onclick="getpopup(15);" class="btn-yes"></button>
					</div>
				';
				break;
				
			case '19':
				$html = '
					<p>Q.シェアハウスに早く移りたい</p>
					<div class="pop-button">
						<button onclick="getpopup(16);" class="btn-no"></button>
						<button onclick="getpopup(51);" class="btn-yes"></button>
					</div>
				';
				break;
			case '20':
				$html = '
					<p>Q.ダイビングや<br>サーフィンも楽しみたい<br><span style="font-size: smaller;">ダイビング→<span style="font-weight: normal;">YES</span></span><br><span style="font-size: smaller;">サーフィン→<span style="font-weight: normal;">NO<span></span></p>
					<div class="pop-button">
						<button onclick="getpopup(55);" class="btn-no"></button>
						<button onclick="getpopup(53);" class="btn-yes"></button>
					</div>
				';
				break;
				
			case '21':
				$html = '
					<p>Q.日本人が少ないところがいい</p>
					<div class="pop-button">
						<button onclick="getpopup(18);" class="btn-no"></button>
						<button onclick="getpopup(23);" class="btn-yes"></button>
					</div>
				';
				break;
				
			case '22':
				$html = '
					<p>Q.たくさん観光したい</p>
					<div class="pop-button">
						<button onclick="getpopup(19);" class="btn-no"></button>
						<button onclick="getpopup(54);" class="btn-yes"></button>
					</div>
				';
				break;
				
			case '23':
				$html = '
					<p>Q.スローライフを楽しみたい</p>
					<div class="pop-button">
						<button onclick="getpopup(24);" class="btn-no"></button>
						<button onclick="getpopup(26);" class="btn-yes"></button>
					</div>
				';
				break;
				
			case '24':
				$html = '
					<p>Q.ビーチが近いところがいい</p>
					<div class="pop-button">
						<button onclick="getpopup(26);" class="btn-no"></button>
						<button onclick="getpopup(25);" class="btn-yes"></button>
					</div>
				';
				break;
				
			case '25':
				$html = '
					<p>Q.マリンスポーツが好き</p>
					<div class="pop-button">
						<button onclick="getpopup(56);" class="btn-no"></button>
						<button onclick="getpopup(55);" class="btn-yes"></button>
					</div>
				';
				break;
				
			case '26':
				$html = '
					<p>Q.ローカルな場所に飛び込みたい！</p>
					<div class="pop-button">
						<button onclick="getpopup(55);" class="btn-no"></button>
						<button onclick="getpopup(56);" class="btn-yes"></button>
					</div>
				';
				break;
				
			case '51':
				$html = '
					<p class="a-text">あなたは </br>
						<span>Sydney</span>さんタイブ
					</p>
					<div class="pop-button">
						<a href="#syd" onclick="javascript:$.magnificPopup.close(); getpopup(1)"><button class="btn-end btn-a1"></button></a>
					</div>
					<div style="font-size: 10px; position: absolute;color: #39579a;">この結果をFacebookにシェアする</div>
					<div class="like-div">
							<iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fjawhm.bluecloudvn.com%2Fcountry%2Faustralia%2Frecommend%2F&width=58&layout=button&action=like&size=small&show_faces=false&share=false&height=65&appId" width="58" height="65" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
					</div>
				';
				break;
			case '52':
				$html = '
					<p class="a-text">あなたは </br>
						<span>Brisbne</span>さんタイブ
					</p>
					<div class="pop-button">
						<a href="#bne" onclick="javascript:$.magnificPopup.close(); getpopup(1)"><button class="btn-end btn-a2"></button></a>
					</div>
					<div style="font-size: 10px; position: absolute;color: #39579a;">この結果をFacebookにシェアする</div>
					<div class="like-div">
							<iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fjawhm.bluecloudvn.com%2Fcountry%2Faustralia%2Frecommend%2F&width=58&layout=button&action=like&size=small&show_faces=false&share=false&height=65&appId" width="58" height="65" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
					</div>
				';
				break;
			case '53':
				$html = '
					<p class="a-text">あなたは</br>
						<span>Cairus</span>さんタイブ
					</p>
					<div class="pop-button">
						<a href="#cns" onclick="javascript:$.magnificPopup.close(); getpopup(1)"><button class="btn-end btn-a3"></button></a>
					</div>
					<div style="font-size: 10px; position: absolute;color: #39579a;">この結果をFacebookにシェアする</div>
					<div class="like-div">
							<iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fjawhm.bluecloudvn.com%2Fcountry%2Faustralia%2Frecommend%2F&width=58&layout=button&action=like&size=small&show_faces=false&share=false&height=65&appId" width="58" height="65" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
					</div>
				';
				break;
			case '54':
				$html = '
					<p class="a-text">あなたは</br>
						<span>Melbourue</span>さんタイブ
					</p>
					<div class="pop-button">
						<a href="#mel" onclick="javascript:$.magnificPopup.close(); getpopup(1)"><button class="btn-end btn-a4"></button></a>
					</div>
					<div style="font-size: 10px; position: absolute;color: #39579a;">この結果をFacebookにシェアする</div>
					<div class="like-div">
							<iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fjawhm.bluecloudvn.com%2Fcountry%2Faustralia%2Frecommend%2F&width=58&layout=button&action=like&size=small&show_faces=false&share=false&height=65&appId" width="58" height="65" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
					</div>
				';
				break;
			case '55':
				$html = '
					<p class="a-text">あなたは</br>
						<span>Gold Coast</span>さんタイブ
					</p>
					<div class="pop-button">
						<a href="#ool" onclick="javascript:$.magnificPopup.close(); getpopup(1)"><button class="btn-end btn-a5"></button></a>
					</div>
					<div style="font-size: 10px; position: absolute;color: #39579a;">この結果をFacebookにシェアする</div>
					<div class="like-div">
							<iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fjawhm.bluecloudvn.com%2Fcountry%2Faustralia%2Frecommend%2F&width=58&layout=button&action=like&size=small&show_faces=false&share=false&height=65&appId" width="58" height="65" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
					</div>
				';
				break;
			case '56':
				$html = '
					<p class="a-text">あなたは</br>
						<span>Perth</span>さんタイブ
					</p>
					<div class="pop-button">
						<a href="#per" onclick="javascript:$.magnificPopup.close(); getpopup(1)"><button class="btn-end btn-a6"></button></a>
					</div>
					<div style="font-size: 10px; position: absolute;color: #39579a;">この結果をFacebookにシェアする</div>
					<div class="like-div">
							<iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fjawhm.bluecloudvn.com%2Fcountry%2Faustralia%2Frecommend%2F&width=58&layout=button&action=like&size=small&show_faces=false&share=false&height=65&appId" width="58" height="65" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
					</div>
				';
				
				break;
			
			default:
				
				break;
		}
		
		echo $html;
	}
	else
		return "Error: #ID not found!";
	
	exit;

?>