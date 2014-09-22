<?php

class not_found_exception extends Exception {
    public function __construct($message) {
        $this->message = $message;
    }
}