<?php

function actionIndex()
{
    return renderTemplate
    ('Index/index', ['name' => 'Sergii Sichkar']);
}