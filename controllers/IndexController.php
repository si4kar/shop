<?php

function actionIndex()
{
    return renderTemplate('index/index', ['name' => 'Sergii Sichkar']);
}