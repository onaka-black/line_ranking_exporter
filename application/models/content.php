<?php

require_once dirname(__FILE__) . '/export_target.php';

class content extends export_trget{

    private $rank;
    private $product_id;
    private $title;
    private $path;
    private $img;

    public function __construct($rank, $product_id, $title, $path, $img) {
        $this->rank = $rank;
        $this->product_id = $product_id;
        $this->title = $title;
        $this->path = $path;
        $this->img = $img;
    }

    protected  function get_export_items() {
        return array(
                "rank" => $this->rank,
                "product_id" => $this->product_id,
                "title" => $this->title,
                "path" => $this->path,
                "img" => $this->img
                );
    }
}
