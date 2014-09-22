<?php

require_once dirname(__FILE__) . '/content.php';
require_once dirname(__FILE__) . '/html.php';

class line_rank_page extends html {

    const BASE_URL = "https://store.line.me/stickershop/showcase/top_creators/ja";

    private $outline;
    private $contents;
    private $page_no;

    public function __construct($page_no) {

        parent::__construct(self::BASE_URL . "?page=" . $page_no);

        if (empty($this->html)) {
            throw new not_found_exception("not found_page");
        }

        $this->outline = $this->html->find('li.mdMN02Li');
        $this->contents = [];
        $this->page_no = $page_no;

        if (empty($this->outline)) {
            return;
        }

        $this->parse_contents();
    }

    /**
     * ページ内のHTMLをパースして必要な情報を取得する
     */
    private function parse_contents() {

        foreach($this->outline as $content_no => $content) {

            $title = $content->find('div.mdMN02Desc', 0)->plaintext;
            $path = $content->find('a', 0)->href;
            $img = $content->find('div.mdMN02Img img', 0)->src;

            preg_match('/(stickershop\/product\/)(.*)(\/ja)/', $path,$match);
            $product_id = $match[2];

            $this->contents[] = new content($this->get_rank($content_no), $product_id, $title, $path, $img);
        }
    }

    /**
     * 順位の取得
     */
    private function get_rank($content_no) {
        return ($this->page_no - 1) * 20 + $content_no + 1;
    }

    /**
     * コンテンツ情報の取得
     */
    public function get_contents() {
        return $this->contents;
    }

}
