<?php

class Controller
{

    function __construct()
    {

    }

    public function loadView($name = '', $arg = array())
    {
        $path = BASE_PATH . "/app/view/" . $name;
        $data = array();

        foreach ($arg as $key => $value) {
            $data[$key] = $value;
        }

        ob_start();
        include_once($path);
        $content = ob_get_contents();
        ob_end_clean();

        echo $content;
    }
}
