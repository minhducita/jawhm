<?php

// 一般メニュー読み込み
require 'php/fnc_menu.php';


if (count($param) > 2) {
    $data_param = $param[2];
} else {
    $data_param = 'main';
}

switch ($data_param) {
	case "main":
    case "feedback":
        require($_SERVER['DOCUMENT_ROOT'] . '/feedback/incfb/comment.php');
        if(isset($_GET['category'])){

            switch ($_GET['category']){

                case '':
                    $result = $feedModel->all();
                    break;
                default:

                    break;
            }
        }

        $body_title[] .= 'お客様の声';
        $str = '
		<div class="w-search clearfix">
						<div class="cont_title">検索 </div>
						<div class="cont_main clearfix">
							<form class="search-feedback" id="search" action="' . $url_base . 'main/feedback" method="post">
								<div class="form-group">
									<label for="">分類</label>
									' . dropdown_list('category_name', (isset($request_search['category_name']) ? $request_search['category_name'] : ''), (array('' => '--= Choose Category =--') + $category)) . '
								</div>
								<div class="form-group">
									<label for="">キーワード</label>
									<input type="text" name="keyword" value="' . (isset($request_search['keyword']) ? $request_search['keyword'] : '') . '">
								</div>
								<input type="hidden" name="act" value="search">
								<div class="group-control"  style="margin-left:188px;">
								<a class="btn" href="#" onclick="jQuery(\'input[name=keyword]\').val(\'\');jQuery(\'.search-feedback select#category_name\').val(\'\')"><span class="btnDel"></span><span class="text">Clear</span></a>
								<button type="submit" class="btn"><span class="btnCheck"></span><span class="text">Search<span></button>
								</div>
								<div class="w-result mt10">
								    '.(empty($result) && isset($request_search) ? '[該当件数] 0件': '').'
									<div class="cont_title">Result</div>
									<div class="cont_main">
										<div class="result-search">
											<table class="table">
												<thead>
													<tr>
														<th>&nbsp;</th>
														<th>タイトル</th>
														<th>表示</th>
														<th>分類</th>
														<th>更新日</th>
													</tr>
												</thead>
												<tbody>
		        ';
        if (!empty($result)) {
            $url_img_del = '<img src="'.$base.'images/button_cancel.png" style="padding: 0 6px">';
            $url_img_check = '<img src="'.$base.'images/button_submit.png" style="padding: 0 6px">';
            foreach ($result as $k => $item) {
                $str.= "<tr id=\"id-{$item['id']}\">
		                                                            <td>
		                                                            <a href=\"javascript:void(0)\" onclick = 'editPopup(" . $item['id'] . "," . json_encode($item) . ");' class=\"btn btnGray\"><span class=\"i-edit\"></span> <span class=\"text\">修正</span></a>
		                                                            </td>
		                                                            <td>".mb_substr($item['comment'],0,30,'UTF-8')."...</td>
		                                                                                                                                <td>".($item['onShow'] == 1 ? $url_img_check :$url_img_del )."</td>

		                                                            <td>".(isset($category[$item['category_name']]) ? $category[$item['category_name']] : 'Not set')."</td>
		                                                            <td>".date('Y/m/d', strtotime($item['updatedDate']))."</td>
		                                                        </tr>";
            }
        }
        $str.= '
												</tbody>
											</table>
										</div>
									</div>
								</div>

								<hr class="mt10">
								<div class="form-group">
									<label class="withauto" for="">新規フィードバック</label>
								</div>
							</form>
							<a href="javascript:void(0)" onclick = "document.getElementById(\'feedback_create\').style.display=\'block\';document.getElementById(\'fade\').style.display=\'block\'" class="btn btnGray"><span class="btnSave"></span><span class="text"> 新しいフィードバックを登録する</span></a>
						</div>

					</div>
		<div id="include-editPopup"></div>
		<!-- Form create-->
		<div id="feedback_create" class="white_content">
            <form class="PPsearch" action="' . $url_base . 'main/feedback" method="post" id="feedback_form">
            <div class="form-group messages"></div>
                ';
        if (!empty($category)) {
            $str .= '
                        <div class="form-group cat_list">
                            <label for="">分類</label>
                            ' . dropdown_list('category_name', (isset($request_create['category_name']) ? $request_create['category_name'] : ''), (array('' => '--= Choose Category =--') + $category + array('other' => 'Other')), array('onchange' => 'allowsDisplayInput(this);')) . '
                        </div>
                    ';
            if (isset($request_create['category_name']) && $request_create['category_name'] === 'other') {
                $str .= '
                        <div class="form-group" id="order">
                            <label for="">&nbsp;</label>
                            <input type="text" id="cat_other" name="cat_other" value="' . (isset($request_create['cat_other']) ? $request_create['cat_other'] : '') . '">
                        </div>
                    ';
            }
        } else {
            $str .= '
                        <div class="form-group" id="order">
                            <label for="">分類</label>
                            <input type="text" id="cat_other" name="cat_other" value="' . (isset($request_create['cat_other']) ? $request_create['cat_other'] : '') . '">
                        </div>
                    ';
        }
        $str .= '
                <label class="error">' . (!empty($errors["category"]) ? $errors["category"] : "") . '</label>
                <div class="form-group">
                    <label for="">表示</label>
                    <input class="radio" type="radio" name="onShow" value="1" ' . (isset($request_create['onShow']) ? ($request_create['onShow'] == 1 ? 'checked' : '') : 'checked') . '> Yes
                    <input class="radio" type="radio" name="onShow" value="0" ' . (isset($request_create['onShow']) ? ($request_create['onShow'] == 0 ? 'checked' : '') : '') . '> No
                </div>
                <div class="form-group">
                    <label for="" style="width:120px;">フィードバック</label>
                    <textarea name="comment" id="comment">' . (isset($request_create['comment']) ? $request_create['comment'] : '') . '</textarea>
                    <label class="error">' . (!empty($errors["comment"]) ? $errors["comment"] : "") . '</label>
                </div>
                <hr class="mt20">
                <div class="form-group mt20" style="text-align:right;">
                    <input type="hidden" name="act" value="create">
                    <button type="button" class="btn btnReset" onclick ="document.getElementById(\'feedback_create\').style.display=\'none\';document.getElementById(\'fade\').style.display=\'none\';"><span class="btnDel"></span><span class="text">やめる<span></button>
                    <button type="submit" class="btn"><span class="btnCheck"></span><span class="text">登録<span></button>

                </div>
            </form>
            <a class="btnClose" href = "javascript:void(0)" onclick = "document.getElementById(\'feedback_create\').style.display=\'none\';document.getElementById(\'fade\').style.display=\'none\'">X</a>
        </div>
        <!-- End Form create-->
        <div id="fade" class="black_overlay"></div>
';
        $body[] .= $str;
        $script .= <<<JS
        jQuery(document).ready(function(){
            formValidation('form#feedback_form');
        });

JS;

        break;

}