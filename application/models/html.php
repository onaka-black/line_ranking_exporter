<?php

require_once dirname(__FILE__) . '/../../libs/simple_html_dom/simple_html_dom.php';

abstract class html {

    protected $html;

    public function __construct($url) {
        $this->html = file_get_html($url);
    }
}
