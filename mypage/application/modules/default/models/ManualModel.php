<?php
require_once ('tools/tools.php');
require_once ('tools/BaseModel.php');

class ManualModel {
    private $table;
    private $bm;

    public function __construct() {
        $this->bm = new BaseModel();
    }
}