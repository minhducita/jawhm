<?php

namespace Fuel\Tasks;
use Fuel\Core\DB;
use \Model\Ranking;
use \Model\Blog;
use Email;

require APPPATH.'config/constants.php';

class Rankingbatch{
    public static $blogs;
    public static $msg = "";

    public static function logging($str) {
    	Rankingbatch::$msg .= $str ;
    	return true;
    }

    public static function logfinal() {
    	echo Rankingbatch::$msg;
    	return true;
    }

    public static function run($y = "", $m = "", $d = ""){

        if($y == "" || $y == NULL || $m == "" || $m == NULL || $d == "" || $d == NULL){
	    Rankingbatch::logging(date('Ymd_His').": need to sete target date\n");
            return;
		}

		$target = date("d/M/Y",mktime(0, 0, 0, $m, $d, $y));
		Rankingbatch::logging(date('Ymd_His').": analyzing target:" .$target . "\n");

        // load log
        $log = Rankingbatch::load_log();
        // convert
        $data = Rankingbatch::convert($log, $target);
        try {
            DB::start_transaction();
            Rankingbatch::update($data);
            DB::commit_transaction();
        } catch (Exception $exc) {
            echo date('Ymd_His').": ".$exc->getTraceAsString();
            DB::rollback_transaction();
        }

        // logfinal
        Rankingbatch::logfinal();
    }

    private static function load_log(){
        //return file(APACHE_LOG_PATH);
        return array();
    }

    private static function convert($lines, $target_date){
        Rankingbatch::$blogs = Blog::get_all_id_url();

        $res = array();
        foreach (Rankingbatch::$blogs as $value) {
            $res[$value[DB_COLUMN_BLOG_ID]] = array("in" => 0, "out" => 0);
        }

        //foreach($lines as $line){
        $handle = @fopen(APACHE_LOG_PATH, "r");
        if(!$handle) {
        	echo "error read file";
        	die;
        }
        while (($line = fgets($handle)) !== false) {
            $time = array();
            $src = array();
            preg_match("|\[(.*?)\]|", $line, $time);
            preg_match('/(http|https):\/\/([-._a-z\d]+\.[a-z]{2,4})([\w,.:;&=+*%$#!@()~\'\/-]*)\??([\w,.:;&=+*%$#!?@()~\'\/-]*)/', $line, $src);

            if($src){
                Rankingbatch::find_matching_blog($res,$time,$target_date,$src[0]);
/*
                $id = Rankingbatch::find_matching_blog($res,$src[0]);
                $date = substr($time[1],0,11);
                $today = $target_date;
                if($id != NULL && $date == $today){
                    $res[$id]["in"]++;
                }
*/
            }
        }

        fclose($handle);
        return $res;
    }

    private static function find_matching_blog(&$res,$time,$target_date,$url){
    	//Rankingbatch::logging( $url." \n");
        foreach (Rankingbatch::$blogs as $value) {
			$regex = preg_quote(_getStdUrl($value["url"]),"/");
			//Rankingbatch::logging( "          vs "._getStdUrl($value["url"]) . " ( ".$value["url"]." ) (  "."/^".$regex.(($regex[strlen($regex)-1] == '/') ? '?' : '')  ."/"." ) \n");
            if(preg_match("/^".$regex.(($regex[strlen($regex)-1] == '/') ? '?' : '')  ."/", $url) > 0){
            	//return $value[DB_COLUMN_BLOG_ID];
            	$id = $value[DB_COLUMN_BLOG_ID];
                $date = substr($time[1],0,11);
                $today = $target_date;
                if($date == $today){
                    $res[$id]["in"]++;
                }
            }
        }
        return true;
    }
/*
    private static function get_path($url){
	$parts=explode("/",$url);
	$patharray=array(".","http:","https:");
	if(!in_array(pathinfo($url,PATHINFO_DIRNAME),$patharray) && strpos($parts[count($parts)-1], ".")!==false)
    		unset($parts[count($parts)-1]);
	$url=implode("/",$parts);
	if(substr($url,-1)!='/')
		$url.="/";
	return $url;
    }
    */
    private static function update($data){
        foreach ($data as $id => $amount) {
            Ranking::move($id, DB_COLUMN_RANKING_IN_PREFIX);
            Ranking::move($id, DB_COLUMN_RANKING_OUT_PREFIX);

            Ranking::insert_newest($id, DB_COLUMN_RANKING_IN_PREFIX, $amount["in"]);
            Ranking::insert_newest($id, DB_COLUMN_RANKING_OUT_PREFIX, $amount["out"]);

            Ranking::sum($id, DB_COLUMN_RANKING_SUM_IN);
            Ranking::sum($id, DB_COLUMN_RANKING_SUM_OUT);
	    Rankingbatch::update_status($id, $amount["in"]);
        }
    }

    private static function update_status($id,$amount_in){
        //foreach (Rankingbatch::$blogs as $value) {
            $blog = Blog::get_by_id($id);
            if($blog[0][DB_COLUMN_BLOG_STATUS] == BLOG_STATUS_IN && $amount_in > 0){
                Blog::change_status($id,BLOG_STATUS_FIRST_REVIEW);
				Rankingbatch::logging( date('Ymd_His').": change status of ". $id." (amount: ".$amount_in.") \n");
		        $email = Email::forge();
				$email->from( MAIL_BATCH_FIRSTIN_FROM, MAIL_BATCH_FIRSTIN_FROM_NAME );
				$email->to( array(MAIL_BATCH_FIRSTIN_TO,MAIL_BATCH_FIRSTIN_TO2) );
				$email->bcc( MAIL_BCC );
				$email->subject(  \Fuel\Core\View::forge('mail/batch_firstin_subject', $blog[0]) );
				$email->body(  \Fuel\Core\View::forge('mail/batch_firstin_body', $blog[0]) );
				$email->send();
            }
        //}
    }

}


?>
