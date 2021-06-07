<?php

class QaController extends Controller
{

    public $param = '';

    private function getCUrl($kwd)
    {
        $ch = curl_init();
        $post = array("keyword" => $kwd);
        curl_setopt($ch, CURLOPT_URL, "https://www.jawhm.or.jp/blog/api/qa_search.php");
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        $server_output = curl_exec($ch);
        curl_close($ch);
        return $server_output;
    }

    public function actionIndex()
    {
        $this->layout = 'qa_layout';

        $this->param = 'qa';
        // $this->layout = 'qa_layout';
        //JN:show breadcrumbs default
        $this->breadcrumbs = array('ワーキングホリデー協定国別・よくある質問'); //default

        if (!empty($_GET)) {

            $name_question = $_GET['name_question'];// bước :lấy value từ form search
            Yii::app()->session['input_keyword'] = $name_question;
            if ($name_question == null) {

                Yii::app()->session['name'] = "申し訳ございません。結果を見つけることが出来ませんでした。";

                $this->redirect('qa.html');// searchqa là action của Controller Qs
            } else {
                $name_question = trim($name_question);
                $kwd = $name_question;

                if (preg_match('/、/', $name_question)) {
                    $arr_key = explode('、', $name_question);
                } else if (preg_match('/　/', $name_question)) {
                    $arr_key = explode('　', $name_question);
                } else if (preg_match('/ /', $name_question)) {
                    $arr_key = explode(' ', $name_question);
                } else if (preg_match('/,/', $name_question)) {
                    $arr_key = explode(',', $name_question);
                }

                if (isset($arr_key) && is_array($arr_key)) {
                    $total = count($arr_key);
                    $condition = 'search=:search AND status=:status AND ';
                    foreach ($arr_key as $k => $v) {
                        $condition .= "title LIKE :key$k ";
                        if ($total > 1 && $k < ($total - 1))
                            $condition .= 'AND ';
                    }

                    $criteria = new CDbCriteria();
                    $criteria->condition = $condition;

                    $params = array(
                        ':search' => 1,
                        ':status' => 1
                    );
                    foreach ($arr_key as $k => $v) {
                        $params[":key$k"] = "%$v%";
                    }
                    $criteria->params = $params;
                } else {
                    $name_question = "%" . $name_question . "%";
                    $criteria = new CDbCriteria();
                    $criteria->condition = 'search=:search AND status=:status AND title LIKE :title';//Bước 4 :Khai báo những trường cần query
                    $criteria->params = array(
                        ':search' => 1,
                        ':status' => 1,
                        ':title'  => $name_question
                    );//Bước 5 : gán biến vào trường
                }
                // end @minhquyen

                $newquestion = Question::model()->findAll($criteria);//Bước 6 :bắt đầu query thôi

                /*** BEGIN QUERY BLOG by KeyWord @minhquyen** */
                $blogs = array();
                $data = $this->getCUrl($kwd);
                $blogs = json_decode($data);
                /***END QUERY BLOG */

                $search = '';

                if (empty($newquestion)) {


                    // Yii::app()->params['blogs'] = $blogs;
                    Yii::app()->session['name'] = "申し訳ございません。結果を見つけることが出来ませんでした。";
                    // $this->redirect('qa.html');

                    $criteria = new CDbCriteria();
                    $criteria->condition = 'status=:status';
                    $criteria->params = array(':status' => 1);
                    $criteria->order = 'id DESC';
                    $criteria->limit = '5';
                    $newquestion = Question::model()->findAll($criteria);
                    $this->param = 'qa';
                    $this->render('categoryqa', array(
                        'question' => $newquestion,
                        'blogs'    => $blogs,
                        'search'   => $search
                    ));

                } else {

                    $this->render('categoryqa', array(
                        'question' => $newquestion,
                        'blogs'    => $blogs,
                        'search'   => $search
                    ));

                }
            }
        } else {

            $criteria = new CDbCriteria();
            $criteria->condition = 'status=:status';
            $criteria->params = array(':status' => 1);
            $criteria->order = 'id DESC';
            $criteria->limit = '5';
            $newquestion = Question::model()->findAll($criteria);
            $this->param = 'qa';
            $this->render('categoryqa', array('question' => $newquestion));

        }
    }

    public function actionCategoryqa()
    {
        $this->layout = 'qa_layout';
        $this->render('categoryqa');
    }

    public function actionQa()
    {
        $this->layout = 'qa_layout';
        $this->render('qa');
    }

    public function actionContentcate()
    {
        $this->layout = 'qa_layout';
        $this->render('contentcate');
    }

    public function actionContentson()
    {
        $this->layout = 'qa_layout';
        $this->render('contentson');
    }

    // Controller all  14 country
    // 1 aus
    public function actionQa_aus()
    {

        $this->param = 'qa_aus';
        $this->layout = 'qa_layout';

        $image = "../../../../images/mflag01.gif";

        $country = "aus";
        $nameads = Countries::model()->find('abbr=:abbr', array(':abbr' => $country));

        $this->render('country', array(
            'image'   => $image,
            'country' => $country,
            'nameads' => $nameads
        ));
    }

    // 2 can
    public function actionQa_can()
    {
        $this->layout = 'qa_layout';
        $this->param = 'qa_can';
        $image = "../../../../images/mflag03.gif";
        $country = "can";
        $nameads = Countries::model()->find('abbr=:abbr', array(':abbr' => $country));

        $this->render('country', array(
            'image'   => $image,
            'country' => $country,
            'nameads' => $nameads
        ));
    }

    // 3 deu
    public function actionQa_deu()
    {
        $this->layout = 'qa_layout';
        $this->param = 'qa_deu';
        $image = "../../../../images/mflag06.gif";
        $country = "deu";

        $nameads = Countries::model()->find('abbr=:abbr', array(':abbr' => $country));
        $this->render('country', array(
            'image'   => $image,
            'country' => $country,
            'nameads' => $nameads
        ));
    }

    // 4 dnk
    public function actionQa_dnk()
    {
        $this->layout = 'qa_layout';
        $this->param = 'qa_dnk';
        $image = "../../../../images/mflag09.gif";
        $country = "dnk";
        $nameads = Countries::model()->find('abbr=:abbr', array(':abbr' => $country));
        $this->render('country', array(
            'image'   => $image,
            'country' => $country,
            'nameads' => $nameads
        ));
    }

    // 5 fra
    public function actionQa_fra()
    {

        $this->layout = 'qa_layout';
        $this->param = 'qa_fra';
        $image = "../../../../images/mflag05.gif";
        $country = "fra";
        $nameads = Countries::model()->find('abbr=:abbr', array(':abbr' => $country));
        $this->render('country', array(
            'image'   => $image,
            'country' => $country,
            'nameads' => $nameads
        ));
    }

    // 6 hkg
    public function actionQa_hkg()
    {
        $this->layout = 'qa_layout';
        $this->param = 'qa_hkg';
        $image = "../../../../images/mflag11.gif";
        $country = "hkg";
        $nameads = Countries::model()->find('abbr=:abbr', array(':abbr' => $country));
        $this->render('country', array(
            'image'   => $image,
            'country' => $country,
            'nameads' => $nameads
        ));
    }

    // 7 ire
    public function actionQa_ire()
    {
        $this->layout = 'qa_layout';
        $this->param = 'qa_ire';
        $image = "../../../../images/mflag08.gif";
        $country = "ire";
        $nameads = Countries::model()->find('abbr=:abbr', array(':abbr' => $country));
        $this->render('country', array(
            'image'   => $image,
            'country' => $country,
            'nameads' => $nameads
        ));
    }

    // 8 kor
    public function actionQa_kor()
    {
        $this->layout = 'qa_layout';
        $this->param = 'qa_kor';
        $image = "../../../../images/mflag04.gif";
        $country = "kor";
        $nameads = Countries::model()->find('abbr=:abbr', array(':abbr' => $country));
        $this->render('country', array(
            'image'   => $image,
            'country' => $country,
            'nameads' => $nameads
        ));
    }

    // 9 nor
    public function actionQa_nor()
    {
        $this->layout = 'qa_layout';
        $this->param = 'qa_nor';
        $image = "../../../../images/mflag12.gif";
        $country = "nor";
        $nameads = Countries::model()->find('abbr=:abbr', array(':abbr' => $country));
        $this->render('country', array(
            'image'   => $image,
            'country' => $country,
            'nameads' => $nameads
        ));
    }

    // 10 nz
    public function actionQa_nz()
    {
        $this->layout = 'qa_layout';
        $this->param = 'qa_nz';
        $image = "../../../../images/mflag02.gif";
        $country = "nz";
        $nameads = Countries::model()->find('abbr=:abbr', array(':abbr' => $country));
        $this->render('country', array(
            'image'   => $image,
            'country' => $country,
            'nameads' => $nameads
        ));
    }

    // 11 pol
    public function actionQa_pol()
    {
        $this->layout = 'qa_layout';
        $this->param = 'qa_pol';
        $image = "../../../../images/polflag.png";
        $country = "pol";
        $nameads = Countries::model()->find('abbr=:abbr', array(':abbr' => $country));
        $this->render('country', array(
            'image'   => $image,
            'country' => $country,
            'nameads' => $nameads
        ));
    }

    // 12 prt
    public function actionQa_prt()
    {
        $this->layout = 'qa_layout';
        $this->param = 'qa_prt';
        $image = "../../../../images/porflag.png";
        $country = "prt";
        $nameads = Countries::model()->find('abbr=:abbr', array(':abbr' => $country));
        $this->render('country', array(
            'image'   => $image,
            'country' => $country,
            'nameads' => $nameads
        ));
    }

    // 13 uk
    public function actionQa_uk()
    {
        $this->layout = 'qa_layout';
        $this->param = 'qa_uk';
        $image = "../../../../images/mflag07.gif";
        $country = "uk";
        $nameads = Countries::model()->find('abbr=:abbr', array(':abbr' => $country));
        $this->render('country', array(
            'image'   => $image,
            'country' => $country,
            'nameads' => $nameads
        ));
    }

    // 14 ynw
    public function actionQa_ywn()
    {
        $this->layout = 'qa_layout';
        $this->param = 'qa_ywn';
        $image = "../../../../images/mflag10.gif";
        $country = "ywn";
        $nameads = Countries::model()->find('abbr=:abbr', array(':abbr' => $country));
        $this->render('country', array(
            'image'   => $image,
            'country' => $country,
            'nameads' => $nameads
        ));
    }

    // 15 ynw
    public function actionQa_svk()
    {
        $this->layout = 'qa_layout';
        $this->param = 'qa_svk';
        $image = "../../../../images/mflag16.gif";
        $country = "svk";
        $nameads = Countries::model()->find('abbr=:abbr', array(':abbr' => $country));
        $this->render('country', array(
            'image'   => $image,
            'country' => $country,
            'nameads' => $nameads
        ));
    }

    // 16 ynw
    public function actionQa_aut()
    {
        $this->layout = 'qa_layout';
        $this->param = 'qa_aut';
        $image = "../../../../images/mflag15.gif";
        $country = "aut";
        $nameads = Countries::model()->find('abbr=:abbr', array(':abbr' => $country));
        $this->render('country', array(
            'image'   => $image,
            'country' => $country,
            'nameads' => $nameads
        ));
    }

    public function actionCategory($slug)
    {
        $val = Category::model()->find('slug=:slug', array(':slug' => $slug));

        $this->param = 'qa';
        if (empty($val)) {
            $this->redirect('../../qa.html');
        } else {
            $this->layout = 'qa_layout';

            $id = $val->id;
            return $this->render('contentcate', array(
                'id'   => $id,
                'slug' => $slug
            ));
        }
    }

    public function actionCategoryson($slug)
    {
        $category = Category::model()->find('slug=:slug', array(':slug' => $slug));
        $this->param = 'qa';
        if (empty($category)) {
            $this->redirect('../../qa.html');
        } else {
            $category_child = Category::model()->find('id=:id AND status=:status', array(":id" => $category["id"], ":status" => 1));
            $category_parent = Category::model()->find('id=:id AND status=:status', array(":id" => $category["parent"], ":status" => 1));
            $questions = $category_child->questionList();
            $this->layout = 'qa_layout';
            $data = array(
                'id'   => $category["parent"],
                'son'  => $category["id"],
                'slug' => $slug,
                'category_parent' => $category_parent,
                'category_child' => $category_child,
                'questions' => $questions
            );

            return $this->render('contentson', $data);
        }
    }

    public function actionSearchqa()
    {


        if (!empty($_GET)) {

            $name_question = $_GET['name_question'];// bước :lấy value từ from search
            if ($name_question == null) {

                Yii::app()->session['name'] = "申し訳ございません。結果を見つけることが出来ませんでした。";

                $this->redirect('searchqa');// searchqa là action của Controller Qs


            } else {


                $name_question = trim($name_question); // bước 2 :cắt khoảng trắng 2 đầu
                $name_question = '%' . $name_question . "%";// bước 3 :gắn % 2 đâu
                $criteria = new CDbCriteria();
                $criteria->condition = 'status=:status AND title LIKE :title';//Bước 4 :Khai báo những trường cần query
                $criteria->params = array(
                    ':status' => 1,
                    ':title'  => $name_question
                );//Bước 5 : gán biến vào trường
                $newquestion = Question::model()->findAll($criteria);//Bước 6 :bắt đầu query thôi

                if (empty($newquestion)) {
                    Yii::app()->session['name'] = "申し訳ございません。結果を見つけることが出来ませんでした。";
                    $this->redirect('searchqa');

                }


                $this->layout = 'qa_layout';
                $this->param = 'qa';
                $this->render('search', array('question' => $newquestion));


                //  $dem =1;

                //  foreach ($newquestion as $key => $qs)
                //  {
                //      echo $dem ++."______". $qs->title."</br>";

                //      $answers = $qs->answers;
                //      foreach ($answers as $key => $answers) {
                //         echo $answers['content']."</br>";
                //     }

                // }


            }


        } else {


            $criteria = new CDbCriteria();
            $criteria->condition = 'status=:status';
            $criteria->params = array(':status' => 1);
            $criteria->order = 'id DESC';
            $criteria->limit = '5';
            $newquestion = Question::model()->findAll($criteria);
            $this->layout = 'qa_layout';
            $this->param = 'qa';
            $this->render('qa/search', array('question' => $newquestion));


            //    $dem =1;

            //    foreach ($newquestion as $key => $qs)
            //    {
            //        echo $dem ++."______". $qs->title."</br>";

            //        $answers = $qs->answers;
            //        foreach ($answers as $key => $answers) {
            //         echo $answers['content']."</br>";
            //     }

            // }


        }


    }

    //JN
    function get_blog_image($content)
    {
        $site_name = '/blog/';

        $first_img = '';

        //ob_start();

        //ob_end_clean();
        $matches = [];
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content/**$post->post_content**/, $matches);

        $first_img = isset($matches[1][0]) ? $matches[1][0] : '';

        //JN:check
        //echo $first_img;
        //JN:end

        //if (empty($first_img)) {
        if ($first_img == '') {
            $school_no_img = 'wp-content/uploads/2014/12/no_image.jpg';
            //return $first_img = '/blog/wp-content/uploads/2014/12/no_image.jpg';
            /*twentytwelve\no_image.php
                  $school_no_img = '';

                  include(locate_template('no_image.php'));



                  if ($default == 0) {

                    if ($school_no_img == '') {

                      $school_no_img = $default_img;
                    }
                  }

                  if ($default == 1) {

                    $school_no_img = $default_img;
                  }



                  $first_img = $site_name . $school_no_img;
                  */
            $first_img = $site_name . $school_no_img;
        }
        //JN:code

        $second_img = preg_replace('/http:\/\/jawhm\.bluecloud\.tokyo/i', '', $first_img);
        $second_img = preg_replace('/http:\/\/jawhm\.bluecloudvn\.com/i', '', $second_img);
        $second_img = preg_replace('/http:\/\/www\.jawhm\.or\.jp/i', '', $second_img);


        //JN:end

        $second_img = str_replace('[domain]', $site_name, $second_img);

        $second_img = str_replace('/tokyoblog/', '/', $second_img);

        $second_img = str_replace('/osakablog/', '/', $second_img);

        $second_img = str_replace('/nagoyablog/', '/', $second_img);

        $second_img = str_replace('/fukuokablog/', '/', $second_img);

        $second_img = str_replace('/okinawablog/', '/', $second_img);

        $second_img = str_replace('/australia/', '/', $second_img);

        $second_img = str_replace('/canada/', '/', $second_img);

        $second_img = str_replace('/newzealand/', '/', $second_img);

        $second_img = str_replace('/europe/', '/', $second_img);

        $second_img = str_replace('/world/', '/', $second_img);

        $second_img = str_replace('//', '/', $second_img);


        $first_img = $second_img;

        //JN:check
        //echo $first_img;
        //JN:end

        return $first_img;
    }

    public function actionSitemap()
    {
        $this->param = 'sitemap';

        /*****************************************************************************
         *********### Create SITEMAP -- Minhquyen-JAWHMvn ###***********************************************
         *****************************************************************************/

        // INIT
        define("BASE_PATH", Yii::app()->basePath);
        define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT']);

        $sitemap_name = ROOT_PATH . "/qa/sitemap.xml";

        $url_not_change = array();

        $freq = "Monthly";

        $lastmod = "";


        $priority = "0.5";
        // END INIT

        // Set the output file name.
        define("OUTPUT_FILE", $sitemap_name);

        // Set the start URL. Here is https used, use http:// for non SSL websites.
        define("SITE", "https://jawhm.or.jp");

        // Define here the URLs to skip. All URLs that start with the defined URL
        // will be skipped too.
        // Example: "https://www.plop.at/print" will also skip
        //   https://www.plop.at/print/bootmanager.html
        $skip_url = $url_not_change;

        /*
        $skip_url = array (
                           "https://www.plop.at/print",
                           "https://www.plop.at/slide",
                          );

        */
        // General information for search engines how often they should crawl the page.
        define("FREQUENCY", $freq);


        // General information for search engines. You have to modify the code to set
        // various priority values for different pages. Currently, the default behavior
        // is that all pages have the same priority.
        define("PRIORITY", $priority);
        //echo Yii::app()->basePath; exit;
        //echo Yii::app()->basePath . "/views/qa/sitemap.xml" ;
        require_once(Yii::app()->basePath . "/components/sitemap_lib.php");

    }

}
