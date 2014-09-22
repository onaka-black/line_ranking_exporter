<?php

require_once dirname(__FILE__) . '/../exceptions/failed_create_file_exception.php';

class page_exporter {

    public function export($dir, $file_name, array $pages) {

        $this->check_and_create_dir($dir);
        $this->check_and_create_file($dir, $file_name);

        foreach ($pages as $page) {

            $contents = $page->get_contents();

            foreach ($contents as $content) {

                $current = file_get_contents($this->get_file_name($dir, $file_name));
                // 新しい人物をファイルに追加します
                $current .= $content->to_tsv_string();
                // 結果をファイルに書き出します
                file_put_contents($this->get_file_name($dir, $file_name), $current);
            }
        }

    }

    private function check_and_create_dir($dir) {
        if (file_exists($dir)) {
            return;
        } else {
            if (!mkdir($dir, 0777, true)) {
                throw new failed_create_file_exception("Failed create directory");
            }
        }
    }

    private function check_and_create_file($dir, $file_name) {
        $file_path = $this->get_file_name($dir, $file_name);
        if (!file_exists($file_path)) {
            touch($file_path);
            return;
        } else {
            if (unlink($file_path)) {
                throw new failed_create_file_exception("Failed remove file");
            }
        }
    }

    private function get_file_name ($dir, $file_name) {
        return $dir . $file_name;
    }

}
