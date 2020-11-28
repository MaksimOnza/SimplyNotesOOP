<?php
class Controller{

    function render($path, array $vars = []): string
    {
        extract($vars);
        ob_start();
        require_once 'views/' . $path . '.php';
        $content = ob_get_contents();
        ob_clean();
        return $content;
    }

    function run_action($path, $list_of_path): string
    {
        $action = in_array($path, $list_of_path) ? 'actions/' . $path . '.php' : 'actions/error_404.php';
        return include $action;
    }

}