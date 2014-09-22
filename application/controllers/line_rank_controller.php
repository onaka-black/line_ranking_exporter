<?php

require_once dirname(__FILE__) . '/../models/line_rank.php';
require_once dirname(__FILE__) .'/../models/page_exporter.php';

class line_rank_controller {

    /**
     * LINEのランキング情報を取得する
     */
    public function get($processed_date, $base_dir, $end_page_no) {
        $export_dir = $this->get_export_dir($base_dir, $processed_date);
        $export_file_name = $this->get_export_file_name($processed_date);

        $line_rank = new line_rank();
        $pages = $line_rank->get($processed_date, $base_dir, $end_page_no);

        $page_exporter = new page_exporter();
        $page_exporter->export($export_dir, $export_file_name, $pages);
    }

    private function get_export_dir($base_dir, $processed_date) {
        return $base_dir . date('Ymd', $processed_date) . "/";
    }

    private function get_export_file_name($processed_date) {
        return date('Ymd_His', $processed_date) . ".tsv";
    }
}
