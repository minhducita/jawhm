<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserIdentity
 *
 * @author Jack Nguyen
 */
class UserIdentity extends CUserIdentity {

    private $_id;

    public function authenticate() {
        //parent::authenticate();
        $record = Admin::model()->findByAttributes(array('username' => $this->username));
        //die($this->password . '=' . $record->password);
        if ($record === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if (!(trim($this->password) === trim($record->password)))
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else {
            $this->_id = $record->id;
            $this->setState('title', $record->username);
            //$this->username = $record->username;
            $this->errorCode = self::ERROR_NONE;
        }
        return $this->errorCode == self::ERROR_NONE;
    }

    public function getId() {
        return $this->_id;
    }

}
