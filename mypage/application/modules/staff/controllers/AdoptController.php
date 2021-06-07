<?php
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/MypageConst.php');

class Staff_AdoptController extends Zend_Controller_Action {
    public $model;

    /**
     *
     */
    public function init() {
        $const = new MypageConst();
        $this->pass = $const::$SQL_SERVER['PASSWORD'];
        $this->url = $const::$SQL_SERVER['URL'];

        if(empty($_SERVER['HTTPS'])) {
            $base = 'http://';
        } else {
            $base = 'https://';
        }
        $base .= $_SERVER['HTTP_HOST'];
        $root_dir = dirname(dirname(__FILE__)) . '/';
        require_once ($root_dir . 'models/IndexModel.php');
        $this->model = new IndexModel ();
        initPage($this, '/application/modules/', 'staff');
        $withoutList = array('login', 'auth', 'logout', 'noclient');
        $is_client = false;
        without_stafflogin($this, $withoutList, $base, $is_client);
        $withoutAuth = array();
        without_authrity($this, $withoutAuth, $base);

    }

    /**
     * index
     */
    public function insuranceuploadAction() {
        $this->view->title = '保険加入情報取り込み';

    }

    public function insuranceprocessAction() {
        set_time_limit(1800);
        $cut = 6;

        $staff = $_SESSION['staff_cd'];
        $uploadPath = dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/data/csv';
        $adapter = new Zend_File_Transfer_Adapter_Http ();
        $adapter->setDestination ( $uploadPath );

        if (!$adapter->receive ()) {
            $messages = $adapter->getMessages();
            echo implode( "\n", $messages );
        }

        $file = $adapter->getFileName();
        $data = file_get_contents($file);
        $data = mb_convert_encoding($data, 'UTF-8', 'shift-jis');
        $temp = tmpfile();
        $meta = stream_get_meta_data($temp);

        fwrite($temp, $data);
        rewind($temp);

        $file = new SplFileObject($meta['uri']);
        $file->setFlags(SplFileObject::READ_CSV);

        // get already exist policy number for update
        $table1 = 'T_CLIENT_INSURANCE';
        $select1 = 'policy_number, study_abroad_no, branch_no';
        $where1['delete_flag'] = array('column' => 'delete_flag',
                'value' => 0,
                'comp' => '=',
                'andor' => 'null');

        $insurance_data = select_sqlserver($table1, $select1, $where1, $this->url, $this->pass);

        // get already exist error insurance for inirialize
        $table2 = 'T_INSURANCE_ERROR';
        $select2 = 'policy_number';
        $where2['policy_number'] = array('column' => 'policy_number',
                'value' => 0,
                'comp' => 'ni',
                'andor' => 'null');

        $error_data = select_sqlserver($table2, $select2, $where2, $this->url, $this->pass);

        $i = 0;
        $cnt = 0;
        $row = 0;

        foreach($file as $line) {
            // set fixed column
            $provider_name = 'AIU';
            $provider_name_english = 'AIU';
            $is_error = false;

            // remove header information
            if ($i >= 4) {
                $agency_code = $line[0];
                $temp_base = explode('-', $line[0]);
                switch($temp_base[1]) {
                    case '186':		// Tokyo
                        $base_code = 'KT';
                        break;

                    case '187':		// Osaka
                        $base_code ='KO';
                        break;

                    case '188':		// Fukuoka
                        $base_code = 'KF';
                        break;

                    case '189':		// Nagoya
                        $base_code = 'KN';
                        break;

                    case '18A':		// Okinawa
                        $base_code = 'KK';
                        break;

                    default:
                        $base_code = 'KT';
                }

                $agency_name = $line[1];
                $policy_number = $line[2];
                $policy_number_old = $line[3];
                $proof = $line[4];
                $line_travel = $line[6];
                if ($line_travel === '海外旅行') {
                    $line_english = 'travel';
                } else if( $line_travel === '留学') {
                    $line_english = 'study';
                } else {
                    $line_english = null;
                }
                $insured_start = explode('/', $line[8]);
                $start_year = $insured_start[0];
                $start_month = sprintf('%02d', $insured_start[1]);
                $start_day = sprintf('%02d', $insured_start[2]);

                $insured_date_st = $start_year . '-' . $start_month . '-'. $start_day;

                $insured_end = explode('/', $line[8]);
                $end_year = $insured_end[0];
                $end_month = sprintf('%02d', $insured_end[1]);
                $end_day = sprintf('%02d', $insured_end[2]);

                $insured_date_ed = $end_year . '-' . $end_month . '-'. $end_day;

                $division = $line[10];
                if ($division === '新規') {
                    $division_english = 'new';
                } else if ($division === '継続') {
                    $division_english = 'extension';
                } else {
                    $division_english = 'new';
                }
                $deposit_amount = $line[14];
                $annual_basis = $line[16];
                $policy_owner = $line[17];

                $appdate = explode('/', $line[8]);
                $app_year = $appdate[0];
                $app_month = sprintf('%02d', $appdate[1]);
                $app_day = sprintf('%02d', $appdate[2]);

                $application_date = $app_year . '-' . $app_month . '-'. $app_day;

                $aprdate = explode('/', $line[8]);
                $apr_year = $aprdate[0];
                $apr_month = sprintf('%02d', $aprdate[1]);
                $apr_day = sprintf('%02d', $aprdate[2]);

                $approval_date = $apr_year . '-' . $apr_month . '-'. $apr_day;

                // set client_no
                $name = explode(' ', $policy_owner);
                $table3 = 'M_顧客基本情報';
                $select3 = 'お客様番号';
                $where3['last_name'] = array('column' => 'ラストネーム',
                        'value' => $name[0],
                        'comp' => '=',
                        'andor' => 'null');
                $where3['first_name'] = array('column' => 'ファーストネーム',
                        'value' => $name[1],
                        'comp' => '=',
                        'andor' => 'AND');
                $where3['aggregation_flag'] = array('column' => '検索対象外',
                        'value' => 'null',
                        'comp' => 'is',
                        'andor' => 'AND');

                $client_no = select_sqlserver($table3, $select3, $where3, $this->url, $this->pass);

                if (empty($client_no)) {
                    $error = '顧客情報がありません。<br />';
                    echo '証券番号: '.$policy_number.' '.$policy_owner.'様の'.$error;
                    $client = null;
                    $abroad = null;
                    $is_error = true;

                } else if (count($client_no) >= 2){
                    $error = 'お客様番号が複数登録されています。 重複しているお客様番号: ';
                    foreach($client_no as $array) {
                        $error .= $array[0] . ' ';
                    }
                    $error .= '<br />';
                    echo '証券番号: '.$policy_number.' '.$policy_owner.'様の' . $error;
                    $client = null;
                    $abroad = null;
                    $is_error = true;

                } else {
                    $client = $client_no[0][0];
                }

                if (!$is_error) {
                    $table4 = 'T_ENTRY';
                    $select4 = 'study_abroad_no';
                    $where4['client_no'] = array('column' => 'client_no',
                            'value' => $client,
                            'comp' => '=',
                            'andor' => 'null');
                    $where4['delete_flag'] = array('column' => 'delete_flag',
                            'value' => 0,
                            'comp' => '=',
                            'andor' => 'AND');

                    $abroad_no = select_sqlserver($table4, $select4, $where4, $this->url, $this->pass);
                    if (empty($abroad_no)) {
                        $error = '留学情報がありません。<br />';
                        echo '証券番号: '.$policy_number.' '.$policy_owner.'様の'.$error;
                        $abroad = null;
                        $is_error = true;

                    }
                }

                if (!$is_error) {
                    $abroad = $abroad_no[count($abroad_no)-1][0];

                    // get branch no
                    $table5 = 'T_CLIENT_INSURANCE';
                    $select5 = "MAX([branch_no]) as max_number";
                    $where5['client_no'] = array('column' => 'client_no',
                            'value' => $client_no[0][0],
                            'comp' => '=',
                            'andor' => 'null');

                    $branch = select_sqlserver($table5, $select5, $where5, $this->url, $this->pass);
                    if (empty($branch[0][0])) {
                        $branch_no = 1;
                    } else {
                        $branch_no = $branch[0][0] + 1 ;
                    }

                    $is_update = false;
                    $row_num = 0;
                    $n = 0;
                    foreach($insurance_data as $rows) {
                        if ($rows['policy_number'] === $policy_number) {
                            $is_update = true;
                            $row_num = $n;
                            break;
                        }
                        $n++;
                    }

                    if ($is_update) {
                        $update6 = array(
                                'base_code' => $base_code,
                                'agency_code' => $agency_code,
                                'agency_name' => $agency_name,
                                'provider_name' => $provider_name,
                                'provider_name_english' => $provider_name_english,
                                'policy_number' => $policy_number,
                                'policy_owner' => $policy_owner,
                                'proof' => $proof,
                                'line' => $line_travel,
                                'line_english' => $line_english,
                                'insured_date_st' => $insured_date_st . ' 00:00:00',
                                'insured_date_ed' => $insured_date_ed . ' 00:00:00',
                                'division' => $division,
                                'division_english' => $division_english,
                                'deposit_amount' => $deposit_amount,
                                'annual_basis' => $annual_basis,
                                'application_date' => $application_date . ' 00:00:00',
                                'approval_date' => $approval_date . ' 00:00:00',
                                'update_staff' => $staff,
                                'delete_flag' => 0,
                                'update_date' => date('Y-m-d H:i:s')
                        );
                        $where6['study_abroad_no'] = array('column' => 'study_abroad_no',
                                'value' => $abroad,
                                'comp' => '=',
                                'andor' => 'null');
                        $where6['branch_no'] = array('column' => 'branch_no',
                                'value' => $insurance_data[$row_num]['branch_no'],
                                'comp' => '=',
                                'andor' => 'AND');
                        $ret = update_sqlserver($table5, $update6, $where6, $this->url, $this->pass);
                    } else {
                        $insert = array('client_no' => $client,
                                'study_abroad_no' => $abroad,
                                'branch_no' =>$branch_no,
                                'base_code' => $base_code,
                                'agency_code' => $agency_code,
                                'agency_name' => $agency_name,
                                'provider_name' => $provider_name,
                                'provider_name_english' => $provider_name_english,
                                'policy_number' => $policy_number,
                                'policy_owner' => $policy_owner,
                                'proof' => $proof,
                                'line' => $line_travel,
                                'line_english' => $line_english,
                                'insured_date_st' => $insured_date_st . ' 00:00:00',
                                'insured_date_ed' => $insured_date_ed . ' 00:00:00',
                                'division' => $division,
                                'division_english' => $division_english,
                                'deposit_amount' => $deposit_amount,
                                'annual_basis' => $annual_basis,
                                'application_date' => $application_date . ' 00:00:00',
                                'approval_date' => $approval_date . ' 00:00:00',
                                'update_staff' => $staff,
                                'delete_flag' => 0,
                                'insert_date' => date('Y-m-d H:i:s'),
                                'update_date' => date('Y-m-d H:i:s')
                        );

                        $ret = insert_sqlserver($table5, $insert, $this->url, $this->pass);
                    }
                    $row++;
                } else {
                    $is_update = false;
                    $row_num = 0;
                    $m = 0;
                    foreach($error_data as $rows) {
                        if ($rows['policy_number'] === $policy_number) {
                            $is_update = true;
                            $row_num = $m;
                            break;
                        }
                        $m++;
                    }

                    $table7 = 'T_INSURANCE_ERROR';
                    if($is_update) {
                        $update7 = array(
                                'policy_owner' => $policy_owner,
                                'client_no' => $client,
                                'agency_code' => $agency_code,
                                'agency_name' => $agency_name,
                                'provider_name' => $provider_name,
                                'provider_name_english' => $provider_name_english,
                                'proof' => $proof,
                                'line' => $line_travel,
                                'line_english' => $line_english,
                                'insured_date_st' => $insured_date_st . ' 00:00:00',
                                'insured_date_ed' => $insured_date_ed . ' 00:00:00',
                                'division' => $division,
                                'division_english' => $division_english,
                                'deposit_amount' => $deposit_amount,
                                'annual_basis' => $annual_basis,
                                'application_date' => $application_date . ' 00:00:00',
                                'approval_date' => $approval_date . ' 00:00:00',
                                'error_message' => substr($error, 0, strlen($error) - $cut),
                                'update_staff' => $staff,
                                'insert_date' => date('Y-m-d H:i:s'),
                                'update_date' => date('Y-m-d H:i:s')
                        );

                        $where7['policy_number'] = array('column' => 'policy_number',
                                'value' => $policy_number,
                                'comp' => '=',
                                'andor' => 'null');

                        $ret = update_sqlserver($table7, $update7, $where7, $this->url, $this->pass);

                    } else {
                        $insert = array('policy_number' => $policy_number,
                                'policy_owner' => $policy_owner,
                                'client_no' => $client,
                                'agency_code' => $agency_code,
                                'agency_name' => $agency_name,
                                'provider_name' => $provider_name,
                                'provider_name_english' => $provider_name_english,
                                'proof' => $proof,
                                'line' => $line_travel,
                                'line_english' => $line_english,
                                'insured_date_st' => $insured_date_st . ' 00:00:00',
                                'insured_date_ed' => $insured_date_ed . ' 00:00:00',
                                'division' => $division,
                                'division_english' => $division_english,
                                'deposit_amount' => $deposit_amount,
                                'annual_basis' => $annual_basis,
                                'application_date' => $application_date . ' 00:00:00',
                                'approval_date' => $approval_date . ' 00:00:00',
                                'error_message' => substr($error, 0, strlen($error) - $cut),
                                'update_staff' => $staff,
                                'insert_date' => date('Y-m-d H:i:s'),
                                'update_date' => date('Y-m-d H:i:s')
                        );

                        $ret = insert_sqlserver($table7, $insert, $this->url, $this->pass);

                        $table8 = 'T_CLIENT_INSURANCE';
                        $where8['policy_number'] = array('column' => 'policy_number',
                                'value' => $policy_number,
                                'comp' => '=',
                                'andor' => 'null');
                        $ret2 = delete_sqlserver($table8, $where8, $this->url, $this->pass);
                    }
                    $cnt++;
                }

            }
            $i++;

        }
        fclose($temp);
        $file = null;

        $this->view->title = '保険加入情報取込み完了';
        $this->view->row = $row;
        $this->view->cnt = $cnt;
        $this->view->total = $i;
    }

    public function insuranceerrorlistAction() {
        $this->view->title = '保険情報取込みエラー';
    }

    public function listAction() {
        $params = $this->getRequest ()->getParams ();
        sortlist($params, $this, $this->url, $this->pass);
    }

    public function fixinsuranceAction() {
        set_time_limit(1800);
        $params = $this->getRequest ()->getParams ();
        $staff = $_SESSION['staff_cd'];

        $total = 0;
        $row = 0;
        $cnt = 0;
        $update_cnt = 0;
        $del = 0;
        $is_update = false;
        $is_delete = false;
        foreach ($params as $key => $value) {
            $is_empty_client = true;
            $is_empty_abroad = true;
            $is_delete = false;

            if (preg_match('/^delete/', $key)){
                if ($value === 'on') {
                    $temp_policy = explode('_', $key);
                    $policy_number = $temp_policy[1];
                    // just delete from error table
                    $table6 = 'T_INSURANCE_ERROR';
                    $where6['ID'] = array('column' => 'policy_number',
                            'value' => $policy_number,
                            'comp' => '=',
                            'andor' => 'null');
                    $ret = delete_sqlserver($table6, $where6, $this->url, $this->pass);

                    $is_delete = true;
                    $del++;
                }
            }

            if (preg_match('/^client_no/', $key) && !$is_delete){
                $temp_number = explode('_', $key);
                $client_policy_number = $temp_number[2];

                if (!empty($value)) {
                    $client_no = $value;
                    $is_update = true;
                    $is_correct_client = true;
                    $is_empty_client = false;
                } else {
                    $client_no = null;
                    $is_update = false;
                    $is_correct_client = false;
                }

            }

            if (preg_match('/^abroad_no/', $key) && !$is_delete){
                $temp_number = explode('_', $key);
                $abroad_policy_number = $temp_number[2];

                if ($client_policy_number === $abroad_policy_number) {
                    if (!empty($value)) {
                        $study_abroad_no = $value;
                        $is_correct_abroad = true;
                        $is_empty_abroad = false;
                    } else {
                        $study_abroad_no = null;
                        $is_update = false;
                        $is_correct_abroad = false;
                    }
                } else {
                    $study_abroad_no = null;
                    $is_update = false;
                    $is_correct_abroad = false;
                    $is_empty_abroad = false;
                    echo '証券番号: ' . $abroad_policy_number . 'の証券番号が一致しません。<br />';
                }

            }

            if (preg_match('/^error_comment/', $key) && !$is_delete){
                $temp_number = explode('_', $key);
                $comment_policy_number = $temp_number[2];
                if (!empty($value)) {
                    $error_comment = $value;
                    $is_update = true;
                } else {
                    $error_comment = null;
                    if (!is_null($client_no) && !is_null($study_abroad_no)) {
                        $is_update = false;
                    }
                }

                if ($is_correct_client && $is_correct_abroad) {
                    //check client_no & abroad_no
                    $table1 = 'T_ENTRY';
                    $select1 = 'study_abroad_no';
                    $where1['client_no'] = array('column' => 'client_no',
                            'value' => $client_no,
                            'comp' => '=',
                            'andor' => 'null');
                    $where1['delete_flag'] = array('column' => 'delete_flag',
                            'value' => 0,
                            'comp' => '=',
                            'andor' => 'AND');

                    $abroad_no = select_sqlserver($table1, $select1, $where1, $this->url, $this->pass);
                    if(count($abroad_no) >= 1) {
                        $check_abroad = $abroad_no[count($abroad_no)-1][0];
                    } else {
                        $check_abroad = null;
                    }

                    if ($study_abroad_no === $check_abroad) {
                        $is_correct_abroad = true;
                        $is_update = true;
                        $settlement = 1;

                        // get branch no
                        $table2 = 'T_CLIENT_INSURANCE';
                        $select2 = "MAX([branch_no]) as max_number";
                        $where2['study_abroad_no'] = array('column' => 'study_abroad_no',
                                'value' => $study_abroad_no,
                                'comp' => '=',
                                'andor' => 'null');

                        $branch = select_sqlserver($table2, $select2, $where2, $this->url, $this->pass);
                        if (empty($branch[0]['max_number'])) {
                            $branch_no = 1;
                        } else {
                            $branch_no = $branch[0]['max_number'] + 1 ;
                        }

                        // get insert information
                        $table3 = 'T_INSURANCE_ERROR';
                        $select3 = 'policy_owner, agency_code, agency_name, provider_name, provider_name_english, insurance_type, insurance_name,
                                policy_number_old, proof, line, line_english, insured_date_st, insured_date_ed, division, division_english,
                                deposit_amount, annual_basis, application_date, approval_date';
                        $where3['policy_number'] = array('column' => 'policy_number',
                                'value' => $client_policy_number,
                                'comp' => '=',
                                'andor' => 'null');

                        $item = select_sqlserver($table3, $select3, $where3, $this->url, $this->pass);
                        $temp_base = explode('-', $item[0]['agency_code']);
                        switch($temp_base) {
                            case '186':		// Tokyo
                                $base_code = 'KT';
                                break;

                            case '187':		// Osaka
                                $base_code ='KO';
                                break;

                            case '188':		// Fukuoka
                                $base_code = 'KF';
                                break;

                            case '189':		// Nagoya
                                $base_code = 'KN';
                                break;

                            case '18A':		// Okinawa
                                $base_code = 'KK';
                                break;

                            default:
                                $base_code = 'KT';
                        }

                        // insert correct insurance information
                        $table4 = 'T_CLIENT_INSURANCE';
                        $insert = array('client_no' => $client_no,
                                'study_abroad_no' => $study_abroad_no,
                                'branch_no' =>$branch_no,
                                'base_code' => $base_code,
                                'agency_code' => $item[0]['agency_code'],
                                'agency_name' => $item[0]['agency_name'],
                                'provider_name' => $item[0]['provider_name'],
                                'provider_name_english' => $item[0]['provider_name_english'],
                                'policy_number' => $client_policy_number,
                                'policy_owner' => $item[0]['policy_owner'],
                                'proof' => $item[0]['proof'],
                                'line' => $item[0]['line'],
                                'line_english' => $item[0]['line_english'],
                                'insured_date_st' => $item[0]['insured_date_st'],
                                'insured_date_ed' => $item[0]['insured_date_ed'],
                                'division' => $item[0]['division'],
                                'division_english' => $item[0]['division_english'],
                                'deposit_amount' => $item[0]['deposit_amount'],
                                'annual_basis' => $item[0]['annual_basis'],
                                'application_date' => $item[0]['application_date'],
                                'approval_date' => $item[0]['approval_date'],
                                'update_staff' => $staff,
                                'delete_flag' => 0,
                                'insert_date' => date('Y-m-d H:i:s'),
                                'update_date' => date('Y-m-d H:i:s')
                        );

                        $ret = insert_sqlserver($table4, $insert, $this->url, $this->pass);
                        $row++;
                    } else {
                        echo '証券番号: ' . $abroad_policy_number . 'の留学番号が保険契約の番号と一致しません。<br />';
                        $settlement = 0;
                        $cnt++;
                    }
                } else {
                    if (!$is_delete) {
                        $settlement = 0;
                        // if client_no and study_abroad_no des not input each other, error messege do not appear.
                        if ( (!$is_empty_client || !$is_empty_abroad)
                                && !(!$is_empty_client && !$is_empty_abroad) ) {
                            if ($is_empty_client) {
                                echo '証券番号: ' . $client_policy_number . 'のお客様番号が入力されていません。<br />';
                                $cnt++;
                            }

                            if($is_empty_abroad) {
                                echo '証券番号: ' . $abroad_policy_number . 'の留学番号が入力されていません。<br />';
                                $cnt++;
                            }
                        }
                    }
                }

                if ($is_update && $settlement == 1) {
                    // update T_INSURANCE_ERROR
                    $table5 = 'T_INSURANCE_ERROR';
                    $where5['ID'] = array('column' => 'policy_number',
                            'value' => $comment_policy_number,
                            'comp' => '=',
                            'andor' => 'null');
                    $ret = delete_sqlserver($table5, $where5, $this->url, $this->pass);
                    $update_cnt++;
                }
                $total++;

            }

        }

        $this->view->total = $total;
        $this->view->row = $row;
        $this->view->cnt = $cnt;
        $this->view->update_cnt = $update_cnt;
        $this->view->del = $del;
    }
}
?>
