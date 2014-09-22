<?php

require_once dirname(__FILE__) . '/jobs/line_rank_job.php';

define("SCTIPT_TYPE_EXPORT_LINE_RANK", "export_line_rank");

// スクリプト種別の取得（第一引数がスクリプト種別となる）
if ($argc <= 1) {
    echo "Error: Argument is not enough\r\n";
    return;
}
$script_type = $argv[1];

switch ($script_type) {
    case SCTIPT_TYPE_EXPORT_LINE_RANK:
        $script = new line_rank_job();
        $script->execute();
        break;
    default:
        echo "Error: Undefine script type\r\n";
        break;
}
