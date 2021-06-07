<?php
// protected/components/ConvertParent.php       NOT RECOMMENDED!
class ConvertParent
{
	
	public static function ConvertHtmlCategories($listCategory) {
		$html = " <ul style='list-style: none'>";
		if(!empty($listCategory)) {
			//echo "<pre>";print_r($listCategory);exit;
			foreach($listCategory as $itemRequest) {
				$html .= '<li><div class="checkbox check-info"><input type="checkbox" id="check_category_'.$itemRequest['id'].'" name="question_categories[]" value="'.$itemRequest['id'].'" /><label for="check_category_'.$itemRequest['id'].'">'.$itemRequest['title'].'</label></div>';
				if(!empty($itemRequest['Child'])) {
					$html .= "<ul style='list-style:none'>";
					$public = new ConvertParent();
					$html = $public->_childHtmlCategory($itemRequest['Child'], $html);
					$html .= "</ul>";
				}
				$html .= "</li>";
			}
		}
		$html .= "</ul>";
		return $html;
	}
	public function _childHtmlCategory($item, $html) {
		if(!empty($item)) {
			foreach($item as $i => $itemRequest) {
				$html .= '<li><div class="checkbox check-success"><input type="checkbox" id="check_category_'.$itemRequest['id'].'" name="question_categories[]" value="'.$itemRequest['id'].'"/><label for="check_category_'.$itemRequest['id'].'">'.$itemRequest['title'].'</label></div></li> ';
				if(!empty($itemRequest['Child'])) {
					$public = new ConvertParent();
					$html = $public->_childHtmlCategory($itemRequest['Child'], $html);
				}
				$html .= "</li>";
			}
		}
		return $html;
	}
	
	
}
