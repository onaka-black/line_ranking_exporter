<?php

class failed_create_file_exception extends Exception {

    public function __construct($message) {
        $this->message = $message;
    }
}