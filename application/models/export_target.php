<?php

abstract class export_trget {

    const TSV_DELIMITER = "\t";
    const CSV_DELIMITER = ",";
    const LINE_FEED = "\r\n";


    public function to_tsv_string() {

        $item_count = count($this->get_export_items());
        $count = 1;
        $line_string = "";

        foreach ($this->get_export_items() as $key => $item) {
            $line_string .= $item;

            if ($count < $item_count) {
                $line_string .= self::TSV_DELIMITER;
            } else {
                $line_string .= self::LINE_FEED;
            }
            $count++;
        }

        return $line_string;
    }

    protected abstract function get_export_items();

}