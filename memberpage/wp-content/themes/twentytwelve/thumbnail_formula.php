<?php
/*
 * Formula used for thumbnails in PC site and mobile site
 */

	// remove this line if site is no longer password protected.
	$img_link = '/var/www/html' . $img_link;

	// get the image's height and width
	$tw = '';
	$th = '';
	list($tw, $th) = getimagesize($img_link);
	
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
				if ($view == 'mobile') {
					$x_adjustment = $x_adjustment / 2;
				} else if ($x_adjustment > 40) {
					$x_adjustment = $x_adjustment - 10;
				}
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
?>