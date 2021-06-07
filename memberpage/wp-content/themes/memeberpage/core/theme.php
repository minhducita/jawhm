<?php 
	function showMenuLeft(){
		$urlMenuleft = "http://".$_SERVER["SERVER_NAME"]."/api/themes/menuleft.php";
		$datamenu = getCurlHtml($urlMenuleft);
		if(!empty($datamenu)){
			$datamenu = json_decode($datamenu);
			return getHtmlMenuLeft($datamenu);
		}
		return ;
	}
	function showMenuFooter(){
		$urlMenu = "http://".$_SERVER["SERVER_NAME"]."/include/footer_pc.php";
		$datamenu = getCurlHtml($urlMenu);
		if(!empty($datamenu)){
			return $datamenu;
		}
		return ;
	}
	function showMenuFooterMobile(){
		$urlMenu = "http://".$_SERVER["SERVER_NAME"]."/include/footer_mobile.php";
		$datamenu = getCurlHtml($urlMenu);
		if(!empty($datamenu)){
			return $datamenu;
		}
		return ;
	}
	function getCurlHtml($url){
		$curlSession = curl_init();
		curl_setopt($curlSession, CURLOPT_URL,$url);
		curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
		curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
		return curl_exec($curlSession);
	}
	function getHtmlMenuLeft($datamenu){
		$htmlmenu = "";
		if(!empty($datamenu->places)){
			$htmlOption = "";
			foreach($datamenu->places as $item){
				$htmlOption .= "<option value='".$item->url."'>".$item->name."</option>";
			}
			
			$htmlevent = "";
			if(!empty($datamenu->event_places)){
				$total_event_places = count($datamenu->event_places)-1;
				foreach($datamenu->event_places as $k => $item){
					
					if($item->sendai_toyama_exist == 1)
                        $seminar_place_jp = "[".$item->seminar_place_jp.']';
					else
						$seminar_place_jp = "";
					
					$icon = "";
					if($item->indicated_option == 1)
						$icon = '<div class="vertical_icon_osusume"></div>';
					elseif($item->indicated_option == 2)
						$icon = '<div class="vertical_icon_new"></div>';

					elseif($item->broadcasting == 1)
						$icon = '<div class="vertical_icon_broadcast"></div>';
					$htmlevent .= "
					<a href='".$item->url."'>
					<div class='event_vertical' id='event_vertical'> 
						<div class='date'> 
							<div class='month' style='color:".$item->group_color."'> 
								".$item->month_nb.'月'."
							</div>
							<div class='day' style='background-color:".$item->group_color."'>".$item->day_nb."</div>
						</div>
						<div class='event_info_vertical'>
							<span class='time_event'>
								<strong>".$item->start_time." ~&nbsp;&nbsp;</strong>".$seminar_place_jp."
							</span>
							<div class='module_flag_".$item->country_code."'></div>
							<div class='vertical_title_event'>".$item->seminar_name."</div>
						</div>
						".$icon."
					</div></a>";
					if($total_event_places > $k){
						
						$htmlevent .= '<div class="separator"></div>';
					}
					
				}
			}
			$htmlmenu .= '<div class="g-n-sec02" style="padding-top:0px; padding-bottom:0px;margin-bottom:5px;"><div id="vertical_module">';
			$htmlmenu .= '
				<div id="title_module"><div id="left_title_module">
					<select name="place" id="menubar_place" onchange="menubar_change();">
						'.$htmlOption.'
					</select>
					の無料セミナー
				</div></div>';
			$htmlmenu .= '<div id="content_vertical_module">'.$htmlevent.'</div>';
			$htmlmenu .= '</div></div>';
		}
		$htmlmenu .= '<div class="g-n-sec02"><ul class="g-n-main01">';
		if(!empty($datamenu->seminar)){
			$htmlmenu .= "<li class='lh_top'> <span class='lh_top_left'>".$datamenu->seminar->title."</span></li>";
			foreach($datamenu->seminar->serdata as $item){
				$htmlmenu .= "<li class='lh_none'><a href='".$item->url."'> ".$item->title." </a></li>";
			}
		}
		if(!empty($datamenu->jawhm_about)){
			$htmlmenu .= "<li class='lh_top'><span class='lh_top_left'>".$datamenu->jawhm_about->title."</span></li>";
			foreach($datamenu->jawhm_about->data as $item){
				$htmlmenu .= "<li class='lh_none'><a href='".$item->url."'> ".$item->title." </a></li>";
			}
		}
		if(!empty($datamenu->jawhm_about1)){
			$htmlmenu .= "<li class='lh_top'><span class='lh_top_left'>".$datamenu->jawhm_about1->title."</span></li>";
			foreach($datamenu->jawhm_about1->data as $k => $item){
				if($k == 0){
					$htmlmenu .= "<li class='lh_none' id='pink-menu'><span id='border-pink'><a class='two-lines' href='".$item->url."'> ".str_replace("活用ガイド","<br><span>活用ガイド</span>",$item->title)." </a></span></li>";
				}else{
					$htmlmenu .= "<li class='lh_none'><a href='".$item->url."'> ".$item->title." </a></li>";
				}
			}
		}
		if(!empty($datamenu->jawhm_about2)){
			$htmlmenu .= "<li class='lh_top'><span class='lh_top_left'>".$datamenu->jawhm_about2->title."</span></li>";
			foreach($datamenu->jawhm_about2->data as $k => $item){
				if($k == 0){
					$htmlmenu .= "<li class='lh_none' id='orange-menu'><span id='border-orange'><a class='two-lines' href='".$item->url."'> ".str_replace("≪協会サポートのご案内≫","<br><span>≪協会サポートのご案内≫</span>",$item->title)." </a></span></li>";
				}else{
					$htmlmenu .= "<li class='lh_none'><a href='".$item->url."'> ".$item->title." </a></li>";
				}
			}
		}
		if(!empty($datamenu->information)){
			$htmlmenu .= "<li class='lh_top'><span class='lh_top_left'>".$datamenu->information->title."</span></li>";
			foreach($datamenu->information->data as $item){
				$htmlmenu .= "<li class='lh_none'><a href='".$item->url."'> ".$item->title." </a></li>";
			}
		}
		if(!empty($datamenu->sponsor)){
			$htmlmenu .= "<li class='lh_top'><span class='lh_top_left'>".$datamenu->sponsor->title."</span></li>";
			foreach($datamenu->sponsor->data as $item){
				$htmlmenu .= "<li class='lh_none'><a href='".$item->url."'> ".$item->title." </a></li>";
			}
		}
		$htmlmenu .="</ul></div>";
		return $htmlmenu;
	}
?>