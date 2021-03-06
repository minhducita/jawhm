<?php

/*
 +-----------------------------------------------------------------------+
 | program/include/rcube_browser.php                                     |
 |                                                                       |
 | This file is part of the Roundcube Webmail client                     |
 | Copyright (C) 2007-2009, The Roundcube Dev Team                       |
 | Licensed under the GNU GPL                                            |
 |                                                                       |
 | PURPOSE:                                                              |
 |   Class representing the client browser's properties                  |
 |                                                                       |
 +-----------------------------------------------------------------------+
 | Author: Thomas Bruederli <roundcube@gmail.com>                        |
 +-----------------------------------------------------------------------+

 $Id: rcube_browser.php 4971 2011-07-27 06:37:17Z alec $

*/

/** 
 * rcube_browser
 * 
 * Provide details about the client's browser based on the User-Agent header
 *
 * @package Core
 */
class rcube_browser
{
    function __construct()
    {
        $HTTP_USER_AGENT = strtolower($_SERVER['HTTP_USER_AGENT']);

        $this->ver = 0;
        $this->win = strstr($HTTP_USER_AGENT, 'win');
        $this->mac = strstr($HTTP_USER_AGENT, 'mac');
        $this->linux = strstr($HTTP_USER_AGENT, 'linux');
        $this->unix  = strstr($HTTP_USER_AGENT, 'unix');

        $this->opera = strstr($HTTP_USER_AGENT, 'opera');
        $this->ns4 = strstr($HTTP_USER_AGENT, 'mozilla/4') && !stristr($HTTP_USER_AGENT, 'msie');
        $this->ns  = ($this->ns4 || strstr($HTTP_USER_AGENT, 'netscape'));
        $this->ie  = !$this->opera && stristr($HTTP_USER_AGENT, 'compatible; msie');
        $this->mz  = !$this->ie && strstr($HTTP_USER_AGENT, 'mozilla/5');
        $this->chrome = strstr($HTTP_USER_AGENT, 'chrome');
        $this->khtml = strstr($HTTP_USER_AGENT, 'khtml');
        $this->safari = !$this->chrome && ($this->khtml || strstr($HTTP_USER_AGENT, 'safari'));

        if ($this->ns || $this->chrome) {
            $test = preg_match('/(mozilla|chrome)\/([0-9.]+)/', $HTTP_USER_AGENT, $regs);
            $this->ver = $test ? (float)$regs[2] : 0;
        }
        else if ($this->mz) {
            $test = preg_match('/rv:([0-9.]+)/', $HTTP_USER_AGENT, $regs);
            $this->ver = $test ? (float)$regs[1] : 0;
        }
        else if ($this->ie || $this->opera) {
            $test = preg_match('/(msie|opera) ([0-9.]+)/', $HTTP_USER_AGENT, $regs);
            $this->ver = $test ? (float)$regs[2] : 0;
        }

        if (preg_match('/ ([a-z]{2})-([a-z]{2})/', $HTTP_USER_AGENT, $regs))
            $this->lang =  $regs[1];
        else
            $this->lang =  'en';

        $this->dom = ($this->mz || $this->safari || ($this->ie && $this->ver>=5) || ($this->opera && $this->ver>=7));
        $this->pngalpha = $this->mz || $this->safari || ($this->ie && $this->ver>=5.5) ||
            ($this->ie && $this->ver>=5 && $this->mac) || ($this->opera && $this->ver>=7) ? true : false;
        $this->imgdata = !$this->ie;
    }
}

