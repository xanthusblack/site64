<?php

/**
 * Created by PhpStorm.
 * User: MRazz-DesktopUS
 * Date: 07-10-2015
 * Time: 00:42
 */
class Form
{
    public $html;
    public $html_end ;
    public function __construct(){
        $this->html = "<form ";
        $this->setMethod("post");
    }
    public function setMethod($method="post")
    {
        $this->html .= 'method="$method"';
    }
    public function setActionUrl($url)
    {
        $this->html .= 'action = "$url"';
    }
}