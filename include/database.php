<?php

$DB->connected = new DbConnected;

class DbConnected
{
	/* for server */
	public $dbname = 'redmindb';
	public $dbuser = 'jawhm';
	public $dbpass = '!A@phuong!';
	public $dbhost = 'localhost';
	

	/* for local 
	public $dbname = 'jawhm_page';
	public $dbuser = 'root';
	public $dbpass = '';
	public $dbhost = 'localhost';
	*/

	function connected()
	{
		//echo $this->dbname; exit;
		$conn = mysql_connect( $this->dbhost, $this->dbuser, $this->dbpass) or die('Could not connect to server.' );

		// convert  to UTF-8
		mysql_set_charset('utf8', $conn);

		return mysql_select_db($this->dbname, $conn) or die('Could not select database.');

	}

}

?>