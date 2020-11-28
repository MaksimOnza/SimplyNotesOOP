<?php
function run_action($path, $list_of_path): string
{
    $action = in_array($path, $list_of_path) ? 'actions/' . $path . '.php' : 'actions/error_404.php';
    return include $action;
}

function render($path, array $vars = []): string
{
    extract($vars);
    ob_start();
    require_once 'views/' . $path . '.php';
    $content = ob_get_contents();
    ob_clean();
    return $content;
}


if (!in_array($path, $list_of_exception)) {
    $content = \SimplyNotes\run_action($path, $list_of_path);
    $template = \SimplyNotes\render('base_template', ['content' => $content]);
    print $template;
} else {
    run_action($path, $list_of_path);
}