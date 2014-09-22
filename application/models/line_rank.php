<?php

require_once dirname(__FILE__) . '/line_rank_page.php';

class line_rank {

    public function get($processed_date, $base_dir, $end_page_no) {
        $page_no = 1;
        for ($page_no = 1 ; $page_no <= $end_page_no ; $page_no++) {
            try {
                $pages[] = new line_rank_page($page_no);
            } catch (Exception $e) {
                echo $e->getMessage();
                break;
            }
        }
        return $pages;
    } 
}

