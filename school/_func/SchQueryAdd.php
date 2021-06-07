<?php

class SchQueryAdd
{

    public $dbObj;
    public $prefix = '';
    public $school_id = 0;
    private $num_voice = '1';

    public function __construct()
    {
        try {
            $ini = parse_ini_file('../../bin/pdo_mail_list.ini', FALSE);
            $db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
            $db->query('SET CHARACTER SET utf8');
            $this->dbObj = $db;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getImagesForSchool()
    {
        if ($this->school_id == 0) {
            return;
        }

        $data = [];
        try {
            $sql = 'SELECT image FROM ' . $this->prefix . 'school_slide WHERE school_id = "' . $this->school_id . '" ORDER BY sort_number';
            $result = $this->dbObj->query($sql);

            foreach ($result as $row) {
                if ($row['image'] != '') {
                    $data[] = $row['image'];
                }
            }

            $data = $this->getListImageByNum($data, 4);
        } catch (PDOException $e) {
            die($e->getMessage());
        }

        return $data;
    }

    public function getListImageByNum($data = array(), $num = 0)
    {
        return array_slice($data, 0, $num);
    }

    public function __photoDir($filename = '')
    {

        return $_SERVER['DOCUMENT_ROOT'] . '/school/images/slide/' . $filename;
    }

    public function __photoName($filename = '')
    {
        return '/school/images/slide/' . $filename;
    }

    public function getVoice()
    {
        if ($this->school_id == 0) {
            return;
        }


        $voices = [];
        try {
            $sql = 'SELECT id, icon, body FROM ' . $this->prefix . 'school_voice WHERE school_id = "' . $this->school_id . '" ORDER BY sort_number LIMIT 0,' . $this->num_voice;
            $idx = 0;
            $result = $this->dbObj->query($sql);
            foreach ($result as $row) {
                $voices[$idx]['id'] = $row['id'];
                $voices[$idx]['icon'] = $row['icon'];
                $voices[$idx]['body'] = $row['body'];
                $idx++;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }

        return $voices;
    }
}
