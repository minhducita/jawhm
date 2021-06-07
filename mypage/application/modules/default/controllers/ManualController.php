<?php
require_once 'Zend/Json.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/MypageConst.php');

class ManualController extends Zend_Controller_Action {
    private $model;
    private $imgDir;

    /**
     *
     */
    public function init() {
        if(empty($_SERVER['HTTPS'])) {
            $base = 'http://';
        } else {
            $base = 'https://';
        }
        $base .= $_SERVER['HTTP_HOST'];
        $root_dir = dirname(dirname(__FILE__)) . '/';
        require_once ($root_dir . 'models/ManualModel.php');
        $this->model = new ManualModel ();
        initPage($this, '/application/modules/', 'client');
        $withoutList = array();
        without_loginchk($this, $withoutList, $base);
        $this->imgDir = dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/themes/images/manual/';
    }

    public function indexAction() {
        $this->view->json = 0;
        $this->view->title = 'マイページマニュアル';
    }

    public function topindexAction() {
        
    }
    
    public function topAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0450.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $img2 = file_get_contents($this->imgDir.'IMG_0449.png');
        if ($img2 !== false) {
            $img2 = base64_encode($img2);
        }
        
        $img3 = file_get_contents($this->imgDir.'file39.png');
        if ($img3 !== false) {
            $img3 = base64_encode($img3);
        }
                         
        $this->view->img1 = $img1;
        $this->view->img2 = $img2;
        $this->view->img3 = $img3;
        $this->view->json = 0;
    }
    
    public function topmodalAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0450.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $img2 = file_get_contents($this->imgDir.'IMG_0449.png');
        if ($img2 !== false) {
            $img2 = base64_encode($img2);
        }
        
        $img3 = file_get_contents($this->imgDir.'file39.png');
        if ($img3 !== false) {
            $img3 = base64_encode($img3);
        }
        
        $this->view->img1 = $img1;
        $this->view->img2 = $img2;
        $this->view->img3 = $img3;
        $this->view->json = 0;
    }
    
    public function stepchartAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0451.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $img2 = file_get_contents($this->imgDir.'IMG_0452.png');
        if ($img2 !== false) {
            $img2 = base64_encode($img2);
        }
        $img3 = file_get_contents($this->imgDir.'IMG_0453.png');
        if ($img3 !== false) {
            $img3 = base64_encode($img3);
        }
        
        $img4 = file_get_contents($this->imgDir.'IMG_0454.png');
        if ($img4 !== false) {
            $img4 = base64_encode($img4);
        }
        
        $this->view->img1 = $img1;
        $this->view->img2 = $img2;
        $this->view->img3 = $img3;
        $this->view->img4 = $img4;
        $this->view->json = 0;
    }
    
    public function planAction() {
        
    }
    
    public function stepchartmodalAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0451.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $img2 = file_get_contents($this->imgDir.'IMG_0452.png');
        if ($img2 !== false) {
            $img2 = base64_encode($img2);
        }
        $img3 = file_get_contents($this->imgDir.'IMG_0453.png');
        if ($img3 !== false) {
            $img3 = base64_encode($img3);
        }
        
        $img4 = file_get_contents($this->imgDir.'IMG_0454.png');
        if ($img4 !== false) {
            $img4 = base64_encode($img4);
        }
        
        $this->view->img1 = $img1;
        $this->view->img2 = $img2;
        $this->view->img3 = $img3;
        $this->view->img4 = $img4;
        $this->view->json = 0;
    }
    
    public function historyAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0455.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $this->view->img1 = $img1;
        $this->view->json = 0;
    }
    
    public function historymodalAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0455.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $this->view->img1 = $img1;
        $this->view->json = 0;
    }
    
    public function nextAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0456.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $this->view->img1 = $img1;
        $this->view->json = 0;
    }
    
    public function nextmodalAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0456.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $this->view->img1 = $img1;
        $this->view->json = 0;
    }
    
    public function applicationAction() {
        
    }
    
    public function applicationtopAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0457.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $img2 = file_get_contents($this->imgDir.'IMG_0458.png');
        if ($img2 !== false) {
            $img2 = base64_encode($img2);
        }
        
        $img3 = file_get_contents($this->imgDir.'IMG_0459.png');
        if ($img3 !== false) {
            $img3 = base64_encode($img3);
        }
        
        $this->view->img1 = $img1;
        $this->view->img2 = $img2;
        $this->view->img3 = $img3;
        $this->view->json = 0;
    }
    
    public function applicationtopmodalAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0457.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $img2 = file_get_contents($this->imgDir.'IMG_0458.png');
        if ($img2 !== false) {
            $img2 = base64_encode($img2);
        }
        
        $img3 = file_get_contents($this->imgDir.'IMG_0459.png');
        if ($img3 !== false) {
            $img3 = base64_encode($img3);
        }
        
        $this->view->img1 = $img1;
        $this->view->img2 = $img2;
        $this->view->img3 = $img3;
        $this->view->json = 0;
    }
    
    public function articleAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0460.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $this->view->img1 = $img1;
        $this->view->json = 0;
    }
    
    public function articlemodalAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0460.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $this->view->img1 = $img1;
        $this->view->json = 0;
    }
    
    public function estimateAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0461.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $img2 = file_get_contents($this->imgDir.'IMG_0463.png');
        if ($img2 !== false) {
            $img2 = base64_encode($img2);
        }
        
        $img3 = file_get_contents($this->imgDir.'IMG_0462.png');
        if ($img3 !== false) {
            $img3 = base64_encode($img3);
        }
        
        $img4 = file_get_contents($this->imgDir.'IMG_0464.png');
        if ($img4 !== false) {
            $img4 = base64_encode($img4);
        }
        
        $this->view->img1 = $img1;
        $this->view->img2 = $img2;
        $this->view->img3 = $img3;
        $this->view->img4 = $img4;
        $this->view->json = 0;
    }
    
    public function estimatemodalAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0461.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $img2 = file_get_contents($this->imgDir.'IMG_0463.png');
        if ($img2 !== false) {
            $img2 = base64_encode($img2);
        }
        
        $img3 = file_get_contents($this->imgDir.'IMG_0462.png');
        if ($img3 !== false) {
            $img3 = base64_encode($img3);
        }
        
        $img4 = file_get_contents($this->imgDir.'IMG_0464.png');
        if ($img4 !== false) {
            $img4 = base64_encode($img4);
        }
        
        $this->view->img1 = $img1;
        $this->view->img2 = $img2;
        $this->view->img3 = $img3;
        $this->view->img4 = $img4;
        $this->view->json = 0;
    }
    
    public function passportAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0466.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $img2 = file_get_contents($this->imgDir.'IMG_0467.png');
        if ($img2 !== false) {
            $img2 = base64_encode($img2);
        }
        
        $this->view->img1 = $img1;
        $this->view->img2 = $img2;
        $this->view->json = 0;
    }
    
    public function passportmodalAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0466.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $img2 = file_get_contents($this->imgDir.'IMG_0467.png');
        if ($img2 !== false) {
            $img2 = base64_encode($img2);
        }
        
        $this->view->img1 = $img1;
        $this->view->img2 = $img2;
        $this->view->json = 0;
    }
    
    public function preparationtopAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0477.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $this->view->img1 = $img1;
        $this->view->json = 0;
    }
    
    public function preparationtopmodalAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0477.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $this->view->img1 = $img1;
        $this->view->json = 0;
    }
    
    public function flightAction() {
        $img1 = file_get_contents($this->imgDir.'file40.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $img2 = file_get_contents($this->imgDir.'IMG_0478.png');
        if ($img2 !== false) {
            $img2 = base64_encode($img2);
        }
        
        $img3 = file_get_contents($this->imgDir.'IMG_0479.png');
        if ($img3 !== false) {
            $img3 = base64_encode($img3);
        }
        
        $img4 = file_get_contents($this->imgDir.'IMG_0480.png');
        if ($img4 !== false) {
            $img4 = base64_encode($img4);
        }
        
        $img5 = file_get_contents($this->imgDir.'IMG_0481.png');
        if ($img5 !== false) {
            $img5 = base64_encode($img5);
        }
        
        $img6 = file_get_contents($this->imgDir.'file41.png');
        if ($img6 !== false) {
            $img6 = base64_encode($img6);
        }
        
        $img7 = file_get_contents($this->imgDir.'IMG_0482.png');
        if ($img7 !== false) {
            $img7 = base64_encode($img7);
        }
        
        $img8 = file_get_contents($this->imgDir.'IMG_0483.png');
        if ($img8 !== false) {
            $img8 = base64_encode($img8);
        }
        
        $img9 = file_get_contents($this->imgDir.'IMG_0484.png');
        if ($img9 !== false) {
            $img9 = base64_encode($img9);
        }
        
        $this->view->img1 = $img1;
        $this->view->img2 = $img2;
        $this->view->img3 = $img3;
        $this->view->img4 = $img4;
        $this->view->img5 = $img5;
        $this->view->img6 = $img6;
        $this->view->img7 = $img7;
        $this->view->img8 = $img8;
        $this->view->img9 = $img9;
        $this->view->json = 0;
    }
    
    public function flightmodalAction() {
        $img1 = file_get_contents($this->imgDir.'file40.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $img2 = file_get_contents($this->imgDir.'IMG_0478.png');
        if ($img2 !== false) {
            $img2 = base64_encode($img2);
        }
        
        $img3 = file_get_contents($this->imgDir.'IMG_0479.png');
        if ($img3 !== false) {
            $img3 = base64_encode($img3);
        }
        
        $img4 = file_get_contents($this->imgDir.'IMG_0480.png');
        if ($img4 !== false) {
            $img4 = base64_encode($img4);
        }
        
        $img5 = file_get_contents($this->imgDir.'IMG_0481.png');
        if ($img5 !== false) {
            $img5 = base64_encode($img5);
        }
        
        $img6 = file_get_contents($this->imgDir.'file41.png');
        if ($img6 !== false) {
            $img6 = base64_encode($img6);
        }
        
        $img7 = file_get_contents($this->imgDir.'IMG_0482.png');
        if ($img7 !== false) {
            $img7 = base64_encode($img7);
        }
        
        $img8 = file_get_contents($this->imgDir.'IMG_0483.png');
        if ($img8 !== false) {
            $img8 = base64_encode($img8);
        }
        
        $img9 = file_get_contents($this->imgDir.'IMG_0484.png');
        if ($img9 !== false) {
            $img9 = base64_encode($img9);
        }
        
        $this->view->img1 = $img1;
        $this->view->img2 = $img2;
        $this->view->img3 = $img3;
        $this->view->img4 = $img4;
        $this->view->img5 = $img5;
        $this->view->img6 = $img6;
        $this->view->img7 = $img7;
        $this->view->img8 = $img8;
        $this->view->img9 = $img9;
        $this->view->json = 0;
    }
    
    public function insuranceAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0485.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $img2 = file_get_contents($this->imgDir.'IMG_0486.png');
        if ($img2 !== false) {
            $img2 = base64_encode($img2);
        }
        
        $img3 = file_get_contents($this->imgDir.'IMG_0487.png');
        if ($img3 !== false) {
            $img3 = base64_encode($img3);
        }
        
        $img4 = file_get_contents($this->imgDir.'IMG_0488.png');
        if ($img4 !== false) {
            $img4 = base64_encode($img4);
        }
        
        $img5 = file_get_contents($this->imgDir.'IMG_0489.png');
        if ($img5 !== false) {
            $img5 = base64_encode($img5);
        }
        
        $img6 = file_get_contents($this->imgDir.'IMG_0490.png');
        if ($img6 !== false) {
            $img6 = base64_encode($img6);
        }
        
        $this->view->img1 = $img1;
        $this->view->img2 = $img2;
        $this->view->img3 = $img3;
        $this->view->img4 = $img4;
        $this->view->img5 = $img5;
        $this->view->img6 = $img6;
        $this->view->json = 0;
    }
    
    public function insurancemodalAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0485.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $img2 = file_get_contents($this->imgDir.'IMG_0486.png');
        if ($img2 !== false) {
            $img2 = base64_encode($img2);
        }
        
        $img3 = file_get_contents($this->imgDir.'IMG_0487.png');
        if ($img3 !== false) {
            $img3 = base64_encode($img3);
        }
        
        $img4 = file_get_contents($this->imgDir.'IMG_0488.png');
        if ($img4 !== false) {
            $img4 = base64_encode($img4);
        }
        
        $img5 = file_get_contents($this->imgDir.'IMG_0489.png');
        if ($img5 !== false) {
            $img5 = base64_encode($img5);
        }
        
        $img6 = file_get_contents($this->imgDir.'IMG_0490.png');
        if ($img6 !== false) {
            $img6 = base64_encode($img6);
        }
        
        $this->view->img1 = $img1;
        $this->view->img2 = $img2;
        $this->view->img3 = $img3;
        $this->view->img4 = $img4;
        $this->view->img5 = $img5;
        $this->view->img6 = $img6;
        $this->view->json = 0;
    }
    
    public function visaAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0491.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $img2 = file_get_contents($this->imgDir.'IMG_0492.png');
        if ($img2 !== false) {
            $img2 = base64_encode($img2);
        }
        
        $img3 = file_get_contents($this->imgDir.'IMG_0493.png');
        if ($img3 !== false) {
            $img3 = base64_encode($img3);
        }
        
        $this->view->img1 = $img1;
        $this->view->img2 = $img2;
        $this->view->img3 = $img3;
        $this->view->json = 0;
    }
    
    public function visamodalAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0491.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $img2 = file_get_contents($this->imgDir.'IMG_0492.png');
        if ($img2 !== false) {
            $img2 = base64_encode($img2);
        }
        
        $img3 = file_get_contents($this->imgDir.'IMG_0493.png');
        if ($img3 !== false) {
            $img3 = base64_encode($img3);
        }
        
        $this->view->img1 = $img1;
        $this->view->img2 = $img2;
        $this->view->img3 = $img3;
        $this->view->json = 0;
    }
    
    public function scheduleAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0494.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $img2 = file_get_contents($this->imgDir.'IMG_0495.png');
        if ($img2 !== false) {
            $img2 = base64_encode($img2);
        }
        
        $img3 = file_get_contents($this->imgDir.'IMG_0496.png');
        if ($img3 !== false) {
            $img3 = base64_encode($img3);
        }
        
        $this->view->img1 = $img1;
        $this->view->img2 = $img2;
        $this->view->img3 = $img3;
        $this->view->json = 0;
    }
    
    public function schedulemodalAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0494.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $img2 = file_get_contents($this->imgDir.'IMG_0495.png');
        if ($img2 !== false) {
            $img2 = base64_encode($img2);
        }
        
        $img3 = file_get_contents($this->imgDir.'IMG_0496.png');
        if ($img3 !== false) {
            $img3 = base64_encode($img3);
        }
        
        $this->view->img1 = $img1;
        $this->view->img2 = $img2;
        $this->view->img3 = $img3;
        $this->view->json = 0;
    }
    
    public function schoolcontactAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0497.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $img2 = file_get_contents($this->imgDir.'IMG_0498.png');
        if ($img2 !== false) {
            $img2 = base64_encode($img2);
        }
        
        $img3 = file_get_contents($this->imgDir.'IMG_0499.png');
        if ($img3 !== false) {
            $img3 = base64_encode($img3);
        }
        
        $img4 = file_get_contents($this->imgDir.'IMG_0500.png');
        if ($img4 !== false) {
            $img4 = base64_encode($img4);
        }
        
        $this->view->img1 = $img1;
        $this->view->img2 = $img2;
        $this->view->img3 = $img3;
        $this->view->img4 = $img4;
        $this->view->json = 0;
    }
    
    public function schoolcontactmodalAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0497.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $img2 = file_get_contents($this->imgDir.'IMG_0498.png');
        if ($img2 !== false) {
            $img2 = base64_encode($img2);
        }
        
        $img3 = file_get_contents($this->imgDir.'IMG_0499.png');
        if ($img3 !== false) {
            $img3 = base64_encode($img3);
        }
        
        $img4 = file_get_contents($this->imgDir.'IMG_0500.png');
        if ($img4 !== false) {
            $img4 = base64_encode($img4);
        }
        
        $this->view->img1 = $img1;
        $this->view->img2 = $img2;
        $this->view->img3 = $img3;
        $this->view->img4 = $img4;
        $this->view->json = 0;
    }
    
    public function achievementAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0503.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $img2 = file_get_contents($this->imgDir.'IMG_0504.png');
        if ($img2 !== false) {
            $img2 = base64_encode($img2);
        }
        
        $this->view->img1 = $img1;
        $this->view->img2 = $img2;
        $this->view->json = 0;
    }
    
    public function achievementmodalAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0503.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $img2 = file_get_contents($this->imgDir.'IMG_0504.png');
        if ($img2 !== false) {
            $img2 = base64_encode($img2);
        }
        
        $this->view->img1 = $img1;
        $this->view->img2 = $img2;
        $this->view->json = 0;
    }
    
    public function counselingAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0505.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $img2 = file_get_contents($this->imgDir.'IMG_0506.png');
        if ($img2 !== false) {
            $img2 = base64_encode($img2);
        }
        
        $this->view->img1 = $img1;
        $this->view->img2 = $img2;
        $this->view->json = 0;
    }
    
    public function counselingmodalAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0505.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $img2 = file_get_contents($this->imgDir.'IMG_0506.png');
        if ($img2 !== false) {
            $img2 = base64_encode($img2);
        }
        
        $this->view->img1 = $img1;
        $this->view->img2 = $img2;
        $this->view->json = 0;
    }
    
    public function seminartopAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0508.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $this->view->img1 = $img1;
        $this->view->json = 0;
    }
    
    public function seminartopmodalAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0508.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $this->view->img1 = $img1;
        $this->view->json = 0;
    }
    
    public function bookconfirmAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0509.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $this->view->img1 = $img1;
        $this->view->json = 0;
    }
    
    public function bookconfirmmodalAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0509.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $this->view->img1 = $img1;
        $this->view->json = 0;
    }
    
    public function seminarhistoryAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0510.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $this->view->img1 = $img1;
        $this->view->json = 0;
    }
    
    public function seminarhistorymodalAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0510.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $this->view->img1 = $img1;
        $this->view->json = 0;
    }
    
    public function onlineAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0511.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $this->view->img1 = $img1;
        $this->view->json = 0;
    }
    
    public function onlinemodalAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0511.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $this->view->img1 = $img1;
        $this->view->json = 0;
    }
    
    public function memberAction() {
        
    }
    
    public function membertopAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0512.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $this->view->img1 = $img1;
        $this->view->json = 0;
    }
    
    public function membertopmodalAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0512.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $this->view->img1 = $img1;
        $this->view->json = 0;
    }
    
    public function passwordAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0513.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $this->view->img1 = $img1;
        $this->view->json = 0;
    }
    
    public function passwordmodalAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0513.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $this->view->img1 = $img1;
        $this->view->json = 0;
    }

    public function emailAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0514.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $img2 = file_get_contents($this->imgDir.'IMG_0515.png');
        if ($img2 !== false) {
            $img2 = base64_encode($img2);
        }
        
        $img3 = file_get_contents($this->imgDir.'IMG_0516.png');
        if ($img3 !== false) {
            $img3 = base64_encode($img3);
        }
        
        $img4 = file_get_contents($this->imgDir.'IMG_0517.png');
        if ($img4 !== false) {
            $img4 = base64_encode($img4);
        }
        
        $img5 = file_get_contents($this->imgDir.'IMG_0518.png');
        if ($img5 !== false) {
            $img5 = base64_encode($img5);
        }
        
        $this->view->img1 = $img1;
        $this->view->img2 = $img2;
        $this->view->img3 = $img3;
        $this->view->img4 = $img4;
        $this->view->img5 = $img5;
        $this->view->json = 0;
    }
    
    public function emailmodalAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0514.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $img2 = file_get_contents($this->imgDir.'IMG_0515.png');
        if ($img2 !== false) {
            $img2 = base64_encode($img2);
        }
        
        $img3 = file_get_contents($this->imgDir.'IMG_0516.png');
        if ($img3 !== false) {
            $img3 = base64_encode($img3);
        }
        
        $img4 = file_get_contents($this->imgDir.'IMG_0517.png');
        if ($img4 !== false) {
            $img4 = base64_encode($img4);
        }
        
        $img5 = file_get_contents($this->imgDir.'IMG_0518.png');
        if ($img5 !== false) {
            $img5 = base64_encode($img5);
        }
        
        $this->view->img1 = $img1;
        $this->view->img2 = $img2;
        $this->view->img3 = $img3;
        $this->view->img4 = $img4;
        $this->view->img5 = $img5;
        $this->view->json = 0;
    }
    
    public function addressAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0519.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $img2 = file_get_contents($this->imgDir.'IMG_0520.png');
        if ($img2 !== false) {
            $img2 = base64_encode($img2);
        }
        
        $img3 = file_get_contents($this->imgDir.'IMG_0521.png');
        if ($img3 !== false) {
            $img3 = base64_encode($img3);
        }
        
        $this->view->img1 = $img1;
        $this->view->img2 = $img2;
        $this->view->img3 = $img3;
        $this->view->json = 0;
    }
    
    public function addressmodalAction() {
        $img1 = file_get_contents($this->imgDir.'IMG_0519.png');
        if ($img1 !== false) {
            $img1 = base64_encode($img1);
        }
        
        $img2 = file_get_contents($this->imgDir.'IMG_0520.png');
        if ($img2 !== false) {
            $img2 = base64_encode($img2);
        }
        
        $img3 = file_get_contents($this->imgDir.'IMG_0521.png');
        if ($img3 !== false) {
            $img3 = base64_encode($img3);
        }
        
        $this->view->img1 = $img1;
        $this->view->img2 = $img2;
        $this->view->img3 = $img3;
        $this->view->json = 0;
    }
    
    public function extendAction() {
        
    }
    
    public function lostcardAction() {
        
    }

}