<?php

abstract class job {
    abstract public function execute();

    protected function get_initialization() {
        return parse_ini_file(dirname(__FILE__) . '/../../application/configs/env.ini');
    }
}
