<?php 

    // error_handling.php
    $current_dir = getcwd();
    // var_dump(getcwd());
    
    $error_log_file = $current_dir . '/config/' . 'error_log.log';

    if (file_exists($error_log_file)) {
        // file_get_contents
        // $read_error_log = readfile($error_log_file);
        // $get_error_log = file_get_contents($error_log_file);
        // var_dump($read_error_log);
        // var_dump($get_error_log);
    }
    else {
        $content = "This is error log for php.";
        $error_log_file = fopen($current_dir . '/config/' . 'error_log.log', "wb");
        fwrite($error_log_file, $content . "\r\n");
        fclose($error_log_file);
    }

    function dump($e) {
        var_dump($e);
        die();
    }

    function error_catch($e) {
        global $current_dir;

        $err = file_get_contents($current_dir . '/config/' . 'error_log.log');
        $data = $err;
        $data .= "\r\n";
        $data .= $e;
        file_put_contents($current_dir . '/config/' . 'error_log.log', $data);
    }

    function error_show() {
        global $current_dir;

        $error_log_file = $current_dir . '/config/' . 'error_log.log';

        try {
            if (!is_readable($error_log_file)) {
                throw new Exception('File does not exist or is not readable');
            }

            $content = file_get_contents($error_log_file);

            // show the content on multi lines
            // print_r($content) . "<br>" . PHP_EOL;

            // lets make it prettier
            // show the content on new line each.
            // echo nl2br($content) . "<br>" . PHP_EOL;

            print_r($content);
            // print_r(nl2br($content));

        } catch (\Throwable $e) {
            echo $e->getMessage();
        }
    }

?>