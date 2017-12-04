<?php

function renderTemplate($template, array $variables = [])
{
    $viewsDir = getFromConfig('viewsDir');
    $templateFile = "{$viewsDir}/{$template}.php";
    if(!file_exists($templateFile)){
        die("Template '{$template}' is not exists");
    }

    extract($variables);

    ob_start();
    require_once  $templateFile;
    $content = ob_get_clean();

    $layoutFile = "{$viewsDir}/layouts/main.php";
    if (!file_exists($layoutFile)){
        die("Layout 'layouts/main' is not exists");
    }

    ob_start();
    require_once $layoutFile;
    return ob_get_clean();
}