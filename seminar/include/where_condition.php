<?php
				if(substr_count($checked_countryname, 6) == 1 || $checked_countryname == 'ドイツ' ||  $checked_countryname == 'deu' )
				{
					$val='ドイツ';
					$where_country .= ' or k_title1 like \'%'.$val.'%\' ';
					$where_country .= ' or k_desc1 like \'%'.$val.'%\' ';
					$where_country .= ' or k_desc2 like \'%'.$val.'%\' ';
				}

				if(substr_count($checked_countryname, 6) == 1 || $checked_countryname == 'アイルランド' ||  $checked_countryname == 'ire' )
				{
					$val='アイルランド';
					$where_country .= ' or k_title1 like \'%'.$val.'%\' ';
					$where_country .= ' or k_desc1 like \'%'.$val.'%\' ';
					$where_country .= ' or k_desc2 like \'%'.$val.'%\' ';
				}

		$where_know .= ' or k_desc2 like \'%'.$data.'%\' ';
	}