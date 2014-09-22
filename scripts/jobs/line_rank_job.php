<?php

require_once dirname(__FILE__) . '/job.php';
require_once dirname(__FILE__) . '/../../application/controllers/line_rank_controller.php';

class line_rank_job extends job {

    public  function execute() {
        $ini = $this->get_initialization();
        $base_dir = $ini['line_rank_export_dir'];
        $end_page_no = $ini['line_rank_end_page_no'];
        $processed_date = time();

        $line_rank_controller = new line_rank_controller();
        $line_rank_controller->get($processed_date, $base_dir, $end_page_no);
    }
}
?>
