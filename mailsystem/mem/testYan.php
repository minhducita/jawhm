<?php 
	try {
		require_once 'php/fnc_functions.php';

		echo "lets start<br>";

		$data = array(
			"pwd" => '303pittST',
			"act" => 'keiyaku',
			"cus_no" => "KT1904-360",
			"cus_mail" => "",
			"cus_tel" => "",
		);
		    
	    $url = 'https://toratoracrm.com/crm/';
	    $val = wbsRequest($url, $data);
	    $ret = json_decode($val, true);
		echo "val = ";
		var_dump($val);

		$cur_contract = "";
		$cur_status = "";
		$cur_weeks = "";

	    if($ret["result"] == "OK"){
		    $cur_contract = $ret["cus_contract"];
		    $cur_status = $ret["cus_status"];
		    $cur_weeks = $ret["cus_weeks"];
		}
	} catch (Exception $e) {
		var_dump($e);		
	}

?>
