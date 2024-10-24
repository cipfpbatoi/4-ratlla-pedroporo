<?php

namespace Joc4enRatlla\Services;

class Service
{
    public static function loadView($view, $data = [])
    {
        $viewPath = str_replace('.', '/', $view);
        extract($data);

        include  $_SERVER['DOCUMENT_ROOT'] . "/../Views/$viewPath.view.php";
    }
    function dd(...$data)
    {
        echo "<pre>";
        foreach ($data as $d) {
            var_dump($d);
        }

        echo "</pre>";
        die();
    }
}
