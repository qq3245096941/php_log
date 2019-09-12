<?php
define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT']);

class FileLog
{
    private $log_path;
    //是否开启log日志
    public $is_open = true;

    private $left_brackets = "[";
    private $right_brackets = "]";
    private $double_quotation = '"';

    public function __construct()
    {
        $this->log_path = fopen(ROOT_PATH . '/log.php', 'a+');
    }

    public function println(...$variable)
    {
        ob_start();

        //log文件是否存在
        if (!file_exists(ROOT_PATH . '/log.php')) {
            fwrite($this->log_path, $this->write_php());
        }

        $is_open = $this->is_open ? 'false' : 'true';

        foreach ($variable as $item) {
            $start_statement = "\n print_r(";
            $end_statment = "," . $is_open . ");";
            switch (gettype($item)) {
                case 'array':
                    var_dump($item);
                    $item = ob_get_clean();
                    break;
            }

            fwrite($this->log_path, $start_statement . $this->double_quotation . date('Y-m-d', time()) . "：" . $item . '\\n' . $this->double_quotation . $end_statment);
        }
    }

    /**
     * 写入<?php
     */
    public function write_php()
    {
        return "<?php";
    }
}



